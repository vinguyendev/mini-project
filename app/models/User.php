<?php

require_once 'Model.php';

class User extends Model {

    private $table = "users";

    public function getModel()
    {
        return $this->table;
    }

    public function checkLogin($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";

        $this->db->query($sql);
        $this->db->bind(":username", $username);
        $this->db->bind(":password", $password);
        $this->db->execute();

        if ($this->db->rowCount() > 0) {
            return true;
        }
        return false;
    }
}