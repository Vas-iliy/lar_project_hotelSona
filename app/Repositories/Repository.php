<?php


namespace App\Repositories;


class Repository
{
    protected $model;

    public function get($select, $take = false,  $where = false, $pag = false) {
        $builder = $this->model->select($select);

        if ($where && is_array($where)) {
            $builder->where($where[0], $where[1]);
        }

        if ($take) {
            $builder->take($take);
        }

        if ($pag) {
            $builder->paginate(6);
        }

        return $builder->get();
    }

    public function one($where) {
        $builder = $this->model->where($where[0], $where[1])->first();

        return $builder;
    }

}
