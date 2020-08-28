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

        $result = $this->user->checkLogin($username, $password);

        if ($result) {
            $_SESSION['checkLogin'] = "";
            header("Location: /book");
        } else {
            $_SESSION['checkLogin'] = "loginFail";
            header('Location: /auth/login');
        }

    }

    public function logout()
    {
        session_destroy();
        header('Location: /auth/login');
    }

}