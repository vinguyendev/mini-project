<?php

class Core {

    protected $controller = 'Book';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {

        $url = $this->getUrl();

        if (empty($url)) {
            header("Location: /book");
        }

//        if ($url[0] != 'auth' && $url[0] !='login' ) {
//            include 'app/lib/Session.php';
//            $session = new Session();
//            $session->isLogin();
//        }

        if (file_exists('app/controllers/' . ucwords($url[0]) . 'Controller.php')) {
            $this->controller = ucwords( $url[0] );
            unset($url[0]);
        }


        $this->controller = $this->controller.'Controller';
        require_once 'app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        if (isset($url[1])) {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];


        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function  getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }

}