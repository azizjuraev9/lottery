<?php


namespace app\repositories;


use app\entities\Prizes;

class TestPrizesRepository implements PrizeRepositoryInterface
{

    const VALUES = [
        [
            'id' => 1,
            'name' => 'Test 1',
            'description' => 'Test 1',
            'quantity' => 50,
            'probability' => 20,
        ],
        [
            'id' => 2,
            'name' => 'Test 2',
            'description' => 'Test 2',
            'quantity' => 50,
            'probability' => 5,
        ],
        [
            'id' => 3,
            'name' => 'Test 3',
            'description' => 'Test 3',
            'quantity' => 50,
            'probability' => 30,
        ],
        [
            'id' => 4,
            'name' => 'Test 4',
            'description' => 'Test 4',
            'quantity' => 50,
            'probability' => 45,
        ],
    ];

    /**
     * @return Prizes[]|null
     */
    public function getAllPrizes(): ?array
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