<?php


namespace App\Repositories;


use App\Room;

class RoomsRepository extends Repository
{
    public function __construct(Room $room)
    {
        $this->model = $room;
    }
}
