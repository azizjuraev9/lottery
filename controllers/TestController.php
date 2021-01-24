<?php
namespace app\controllers;

use app\repositories\PrizesRepository;
use app\services\PrizesService;

class TestController
{

    public PrizesService $prizesService;

    public function __construct()
    {
        $repo = new PrizesRepository();
        $this->prizesService = new PrizesService($repo);
    }

    public function index($id = 99)
    {
        $prizes = $this->prizesService->getRandomPrize();
        var_dump($prizes); die;
        echo $id;
    }

}