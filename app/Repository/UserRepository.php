<?php

namespace App\Repository;


use App\User;

class UserRepository extends EloquentRepository
{

    private $model;
    public function __construct(User $model)
    {
        parent::__construct($model);
    }


}