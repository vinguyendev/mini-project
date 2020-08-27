<?php

class AuthController extends BaseController {

    private $user;
    public $error;

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

    public function checkLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember = $_POST['remember'];
//        $_SESSION['checkLogin'] = "";
//        header('Location: /auth/login');
//        if (empty($username) || empty($password)) {
//            $_SESSION['checkLogin'] = "loginFail";
//             header('Location: /auth/login');
//        }
//        else {
//            header("Location: /book");
//        }
    }

}