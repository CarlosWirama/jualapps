<?php

namespace App\Http\Controllers\API;

use App\Repository\ProductPackageRepository;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    private $productRepository;
    private $productPackageRepository;

    public function __construct(ProductRepository $productRepository, ProductPackageRepository $productPackageRepository)
    {
        $this->productRepository = $productRepository;
        $this->productPackageRepository = $productPackageRepository;
    }


    public function products(){
        return json_encode($this->productRepository->getAll());
    }

    public function product($id){
        return json_encode($this->productRepository->getById($id));
    }

    public function productPackages(){

        return json_encode($this->productPackageRepository->getAllWithProduct());
    }

    public function productPackage($id){
        return json_encode($this->productPackageRepository->getWithProduct($id));
    }
}
