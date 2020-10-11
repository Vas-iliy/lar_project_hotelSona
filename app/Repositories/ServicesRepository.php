<?php


namespace App\Repositories;


use App\Service;

class ServicesRepository extends Repository
{
    public function __construct(Service $service)
    {
        $this->model = $service;
    }
}
