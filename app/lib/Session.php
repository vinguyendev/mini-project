<?php

class Session {

    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    function set($key, $val) {
        $_SESSION[$key] = $val;
    }

    public static function get($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return false;
    }

    public static function destroy()
    {
        session_destroy();
        header("Location: /admin/login.html");
    }

    public static function checkSession() {
        if (!self::get("login")) {
            self::destroy();
        }
    }

    function isLogin()
    {
        $username = self::get("username");

        if (!$username==false) {
            $sql = "SELECT * FROM users WHERE username = :username";

            $db = new Database();

            $db->query($sql);
            $db->bind(":username",$username);
            $db->execute();

            if ($db->rowCount()>0) {
                return true;
            }
            else {
                header("Location: /auth/login");
            }
        }

        header("Location: /auth/login");

    }

}