<?php
namespace app\controllers;

use app\services\PrizesService;

class TestController
{

    public PrizesService $prizesService;

    public function __construct()
    {
        $this->prizesService = new PrizesService();
    }

    public function index($id = 99)
    {
        $prizes = $this->prizesService->getRandomPrize();
        var_dump($prizes); die;
        echo $id;
    }

}