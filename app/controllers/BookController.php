<?php

class BookController extends BaseController {

    private $book;

    public function __construct()
    {
//        $this->book = $this->model('Book');
    }

    public function index()
    {
//        $data = $this->book->getBooks();

        $this->view('book/index');
    }

    public function create()
    {
        $this->view('book/create');
    }

    public function edit()
    {
        $this->view('book/edit');
    }

}