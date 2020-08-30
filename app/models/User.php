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

    public function insert($data)
    {
        $this->db->query("INSERT INTO users(username,password,remember_token,created_at, updated_at)
                            VALUES (:username, :password, :remember_token, :created_at, :updated_at)");

        $this->db->bind(":username",$data["username"]);
        $this->db->bind(":password",$data["password"]);
        $this->db->bind(":remember_token",$data["remember_token"]);
        $this->db->bind(":created_at",$data["created_at"]);
        $this->db->bind(":updated_at",$data["updated_at"]);
        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

}