<?php

class AuthController extends BaseController {

    private $user;

    public function __construct()
    {
        $this->user = $this->model('User');
    }

    public function login()
    {
//        $data = $this->user->getAll();

        $data = [
            'username'=>"ViNguyen",
            'password'=>"123456"
        ];

        $result = $this->user->create($data);

        var_dump($result);
        die();

        $this->view('auth/login',$data);
    }

    public function register()
    {
        $this->view('auth/register');
    }

}