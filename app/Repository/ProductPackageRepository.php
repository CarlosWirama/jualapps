<?php
/**
 * Created by PhpStorm.
 * User: astdev
 * Date: 22/12/2016
 * Time: 14.44
 */

namespace App\Repository;


use App\ProductPackage;

class ProductPackageRepository extends EloquentRepository
{

    private $productRepository;



    public function __construct(ProductPackage $model, ProductRepository $productRepository)
    {
        parent::__construct($model);
        $this->productRepository = $productRepository;
    }

    public function getAllWithProduct(){
        $packages = [];
        $tempPackages = $this->getAll();
        foreach ($tempPackages as $tempPackage){
            $packages[]=[
                'package'=>$tempPackage,
                'product'=>$this->productRepository->getById($tempPackage->product_id),
            ];
        }

        return $packages;
    }

    public function getWithProduct($id){
        $packages = [];
            $tempPackage = $this->getById($id);
            $packages[]=[
                'package'=>$tempPackage,
                'product'=>$this->productRepository->getById($tempPackage->product_id),
            ];
        return $packages;
    }


}