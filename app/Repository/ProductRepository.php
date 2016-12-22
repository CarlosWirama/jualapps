<?php
/**
 * Created by PhpStorm.
 * User: astdev
 * Date: 22/12/2016
 * Time: 14.41
 */

namespace App\Repository;


use App\Product;

class ProductRepository extends EloquentRepository
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }


}