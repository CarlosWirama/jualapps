<?php

namespace App\Http\Controllers\API;

use App\Repository\UserDetailRepository;
use App\Repository\UserPackageRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repository\UserRepository;

class UserController extends Controller
{

    private $userRepository;
    private $userPackageRepository;
    private $userDetailRepository;

    public function __construct(
        UserRepository $userRepository,
        UserPackageRepository $userPackageRepository,
        UserDetailRepository $userDetailRepository)
    {
        $this->userRepository = $userRepository;
        $this->userPackageRepository = $userPackageRepository;
        $this->userDetailRepository = $userDetailRepository;
    }


    public function allUser(){
        return json_encode($this->userRepository->getAll());
    }

    public function userById($id){
        return json_encode($this->userRepository->getById($id));
    }

    public function usersWithPackages(){
        return json_encode($this->userPackageRepository->getAllWithPackage());
    }

    public function userWithPackages($id){
        return json_encode($this->userPackageRepository->getWithPackage($id));
    }

    // ini buat ambil gabungan user sama detail
    public function usersDetail(){
        $userDetails =[];
        $users = $this->userRepository->getAll();
        foreach ($users as $user){
            $userDetails[] = [
                'user'=>$user,
                'detail'=>$this->userDetailRepository->getByUserId($user->user_id),
            ];
        }
        return json_encode($userDetails);
    }

    public function userDetail($id){
        $userDetails =[];
        $user = $this->userRepository->getById($id);
        $userDetails[] = [
            'user'=>$user,
            'detail'=>$this->userDetailRepository->getByUserId($user->user_id),
        ];

        return json_encode($userDetails);
    }

    // kl ini cuma buat detailnya aja
    public function Details(){
        return json_encode($this->userDetailRepository->getAll());
    }

    public function Detail($id){
        return json_encode($this->userDetailRepository->getById($id));
    }







}
