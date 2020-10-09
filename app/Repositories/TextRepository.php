<?php


namespace App\Repositories;

use App\Text;

class TextRepository extends Repository
{
    public function __construct(Text $text)
    {
        $this->model = $text;
    }
}
