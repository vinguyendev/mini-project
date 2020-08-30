<?php

class Category extends Model {
    private $table = 'categories';

    public function getModel()
    {
        return $this->table;
    }

    public function findById($id)
    {
        $this->db->query("SELECT * FROM categories WHERE id=:id");
        $this->db->bind("id",$id);

        return $this->db->single();
    }

}