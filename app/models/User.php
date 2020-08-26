<?php

require_once 'Model.php';

class User extends Model {

    private $table = "users";

    public function getModel()
    {
        return $this->table;
    }

}