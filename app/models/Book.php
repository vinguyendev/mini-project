<?php

class Book extends Model {

    private $table = 'books';

    public function getModel()
    {
        return $this->table;
    }

    public function insert($data)
    {
        $this->db->query("INSERT INTO books(name, content, author, image, category_id, created_at, updated_at) 
                        VALUES (:name, :content, :author, :image, :category_id, :created_at, :updated_at)");
        $this->db->bind(":name",$data["name"]);
        $this->db->bind(":content",$data["content"]);
        $this->db->bind(":author",$data["author"]);
        $this->db->bind(":image",$data["image"]);
        $this->db->bind(":category_id",$data["category_id"]);
        $this->db->bind(":created_at",$data["created_at"]);
        $this->db->bind(":updated_at",$data["updated_at"]);
        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM books WHERE id = :id");

        $this->db->bind('id',$id);

        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    public function update($data, $id)
    {
        $this->db->query("UPDATE books SET name = :name, content = :content, author = :author, image = :image, category_id = :category_id WHERE id=:id");

        $this->db->bind("name",$data["name"]);
        $this->db->bind("content",$data["content"]);
        $this->db->bind("author",$data["author"]);
        $this->db->bind("image",$data["image"]);
        $this->db->bind("category_id",$data["category_id"]);
        $this->db->bind("id",$id);

        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    public function findById($id)
    {
        $this->db->query("SELECT * FROM books WHERE id = :id");
        $this->db->bind("id",$id);

        return $this->db->single();
    }

}