<?php
/**
 * Created by PhpStorm.
 * User: astdev
 * Date: 22/12/2016
 * Time: 19.28
 */

namespace App\Repository;


use App\UserDetail;

class UserDetailRepository extends EloquentRepository
{

    public function __construct(UserDetail $model)
    {
        parent::__construct($model);
    }

    public function getByUserId($id){
        $userDetail = UserDetail::where('user_id', $id)->get();
        return $userDetail;
    }

}