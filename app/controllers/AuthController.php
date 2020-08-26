<?php

class AuthController extends BaseController {

    private $user;

    public function __construct()
    {
        $this->user = $this->model('User');
    }

    public function login()
    {
        $this->view('auth/login');
    }

    public function register()
    {
        $this->view('auth/register');
    }

}