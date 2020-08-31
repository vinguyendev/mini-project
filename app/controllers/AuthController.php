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
        $password = md5($password);

        $result = $this->user->checkLogin($username, $password);
        $section = new Session();

        if ($result) {

            if ($remember) {
                setcookie('remember_token',$password, time()+3600*24*30);
                setcookie('username',$username,time()+3600*24*30);
            }

            $section->set("username",$username);
            $section->set("checkLogin","");
            header("Location: /book");
        } else {
            $section->set("checkLogin","loginFail");
            header('Location: /auth/login');
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
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember = $_POST['remember'];

        $section = new Session();

        $checkUsername = $this->user->checkUsername($username);
        if ($checkUsername) {
            $section->set("error","usernameError");
            header('Location: /auth/register');
        }
        else {
            $section->set("error","");
            $data = [
                'username'=>trim($username),
                'password'=>md5(trim($password)),
                'remember_token'=>$remember,
                'created_at'=>date('y-m-d h:i:s',time()),
                'updated_at'=>date('y-m-d h:i:s',time())
            ];


            $result = $this->user->insert($data);

            if ($result) {

                if ($remember) {
                    setcookie('remember_token',$password, time()+3600*24*30);
                    setcookie('username',$username,time()+3600*24*30);
                }

                $section->set("username",$username);
                $section->set("checkLogin","");
                header("Location: /book");
            } else {
                $section->set("checkLogin","loginFail");
                header('Location: /auth/login');
            }
        }

    }

}