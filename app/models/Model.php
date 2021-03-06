<?php

abstract class Model {

    protected $db;
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
        $sql = "SELECT * FROM ".$this->model." ORDER BY created_at DESC";

        $this->db->query($sql);

        return $this->db->resultSet();
    }

}