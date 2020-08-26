<?php

class Book extends Model {

    private $table = 'books';

    public function getModel()
    {
        return $this->table;
    }
}