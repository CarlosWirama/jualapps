<?php
/**
 * Created by PhpStorm.
 * User: astdev
 * Date: 22/12/2016
 * Time: 19.05
 */

namespace App\Repository;


use App\UserPackage;

class UserPackageRepository extends EloquentRepository
{

    private $userRepository;
    private $productPackageRepository;

    public function __construct(UserPackage $model , UserRepository $userRepository , ProductPackageRepository $productPackageRepository)
    {
        parent::__construct($model);
        $this->userRepository = $userRepository;
        $this->productPackageRepository = $productPackageRepository;
    }

    public function getAllWithPackage(){
        $userPackages = [];
        $tempUserPackages = $this->getAll();
        foreach ($tempUserPackages as $tempUserPackage){
            $userPackages[]= [
                'userPackage'=>$tempUserPackage,
                'user'=>$this->userRepository->getById($tempUserPackage->user_id),
                'package'=>$this->productPackageRepository->getWithProduct($tempUserPackage->product_package_id),
            ];
        }
        return $userPackages;
    }
    public function getWithPackage($id){
        $userPackages = [];
        $tempUserPackage = $this->getById($id);
        $userPackages[]= [
            'userPackage'=>$tempUserPackage,
            'user'=>$this->userRepository->getById($tempUserPackage->user_id),
            'package'=>$this->productPackageRepository->getWithProduct($tempUserPackage->product_package_id),
        ];

        return $userPackages;
    }



}