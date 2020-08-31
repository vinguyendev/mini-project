<?php

include_once './app/lib/Session.php';

class AuthController extends BaseController {

    private $user;
    public $error;

    public function __construct()
    {
        $this->user = $this->model('User');
        if (isset($_COOKIE['username']) && $_COOKIE['remember_token']) {
            $username = $_COOKIE['username'];
            $password = $_COOKIE['remember_token'];
            $result = $this->user->checkLogin($username,$password);

            if ($result) {
                $section = new Session();
                $section->set("username",$username);
                header("Location: /book");
            }
            else {
                header('Location: /auth/login');
            }
        }

    }

    public function login()
    {
        $error = '';
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
        }
        $data = [
            'error'=>$error
        ];

        $this->view('auth/login', $data);
    }

    public function register()
    {
        $error = '';
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
        }
        $success = '';
        if (isset($_GET['success'])) {
            $success = $_GET['success'];
        }
        $data = [
            'error'=>$error,
            'success'=>$success
        ];

        $this->view('auth/register',$data);
    }

    public function checkLogin()
    {
        $username = isset($_POST['username'])?$_POST['username']:"";
        $password = isset($_POST['password'])?$_POST['password']:"";
        $remember = isset($_POST['remember'])?$_POST['remember']:"";
        $password = md5($password);

        $result = $this->user->checkLogin($username, $password);
        $section = new Session();

        if (!is_string($username) || !ctype_alnum($username) || strlen($username<6) || !ctype_alpha($username[0])) {
            header('Location: /auth/login&error=username');
        }

        if (!is_string($password || !ctype_alnum($password) || strlen($password < 6))) {
            header('Location: /auth/login&error=password');
        }

        if ($result) {
            if ($remember) {
                setcookie('remember_token',$password, time()+3600*24*30);
                setcookie('username',$username,time()+3600*24*30);
            }
            $section->set("username",$username);
            header("Location: /book");
        } else {
            header('Location: /auth/login&error=fail');
        }

    }

    public function logout()
    {
        session_destroy();
        setcookie('username','',time()-100);
        setcookie('remember_token','',time()-100);
        header('Location: /auth/login');
    }

    public function store()
    {
        $username = isset($_POST['username'])?$_POST['username']:"";
        $password = isset($_POST['password'])?$_POST['password']:"";
        $re_password = isset($_POST['$re_password'])?$_POST['$re_password']:"";

        if (!is_string($username) || !ctype_alnum($username) || strlen($username<6) || !ctype_alpha($username[0])) {
            header('Location: /auth/register&error=username');
        }

        if (!is_string($password || !ctype_alnum($password) || strlen($password < 6))) {
            header('Location: /auth/register&error=password');
        }

        if ($re_password !== $password) {
            header('Location: /auth/register&error=re_password');
        }

        $checkUsername = $this->user->checkUsername($username);
        if ($checkUsername) {
            header('Location: /auth/register&error=fail');
        }
        else {
            $data = [
                'username'=>trim($username),
                'password'=>md5(trim($password)),
                'remember_token'=>md5(trim($password)),
                'created_at'=>date('y-m-d h:i:s',time()),
                'updated_at'=>date('y-m-d h:i:s',time())
            ];

            $result = $this->user->insert($data);

            if ($result) {
                header("Location: /auth/register&success=1");
            } else {
                header('Location: /auth/register');
            }
        }

    }

}