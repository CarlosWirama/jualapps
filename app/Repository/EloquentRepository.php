<?php
namespace App\Repository;
use Illuminate\Database\Eloquent\Model;


abstract class EloquentRepository
{

    private $model;

    public function __construct($model= null)
    {
        $this->model = $model;
    }


    public function getAll(){
        return $this->model->all();
    }

    public function getById($id){
        return $this->model->find($id);
    }


}