<?php

use app\entities\Prizes;
use PHPUnit\Framework\TestCase;

class PrizesServiceTest extends TestCase
{

    const VALUES = [
        [
            'id' => 1,
            'name' => 'Test 1',
            'description' => 'Test 1',
            'quantity' => 50,
            'probability' => 10,
        ],
        [
            'id' => 2,
            'name' => 'Test 4',
            'description' => 'Test 4',
            'quantity' => 50,
            'probability' => 90,
        ],
    ];


    public function testRandomPrize()
    {
        $mock = $this->createMock(\app\repositories\PrizeRepositoryInterface::class);
        $mock->method('getAllPrizes')
            ->willReturn($this->getTestPrizes());


        $service = new \app\services\PrizesService($mock);

        $result = [];
        for ($i = 0; $i < 10000; $i++)
        {
            $res = $service->getRandomPrize();
            if( isset( $result[$res->getId()] ) )
            {
                $result[$res->getId()] += 1;
                continue;
            }
            else
            {
                $result[$res->getId()] = 1;
                continue;
            }
        }


        $this->assertTrue( $result[2] > 8700 );
        $this->assertTrue( $result[2] > 800 );
        $this->assertEquals( $result[1] + $result[2], 10000 );


        return true;
    }

    public function getTestPrizes(): ?array
    {

        $prizes = [];
        foreach (self::VALUES as $value)
        {
            $prize = new Prizes();
            $prize->setId($value['id']);
            $prize->setName($value['name']);
            $prize->setDescription($value['description']);
            $prize->setQuantity($value['quantity']);
            $prize->setProbability($value['probability']);

            $prizes[] = $prize;
        }
        return $prizes;
    }

}