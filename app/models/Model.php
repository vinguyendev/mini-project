<?php

abstract class Model {

    private $db;
    protected $model;

    public function __construct()
    {
        $this->db = new Database();
        $this->setModel();
    }

    public function setModel()
    {
        $this->model = $this->getModel();
    }

    abstract public function getModel();

    public function getAll()
    {
        $sql = "SELECT * FROM ".$this->model;

        $this->db->query($sql);

        return $this->db->resultSet();
    }

    public function create($attr)
    {
        $var = "";
        $val = "";

        foreach ($attr as $key => $value) {
            $var = $var.$key.", ";
//            $val = $val.":".$key.", ";
            $val = $val.$value.", ";
        }

        $sql = "INSERT INTO ".$this->model." ( ".$var." ) VALUES ( ".$val." ) ";

        return $sql;
    }

}