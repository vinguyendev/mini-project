<?php

class BookController extends BaseController {

    private $book;

    public function __construct()
    {
        $this->book = $this->model('Book');
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

    public function edit($book_id)
    {
        $this->view('book/edit');
    }

    public function store()
    {
        $name = $_POST['name'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $image = 'image.png';

        $data = [
            'name'=>$name,
            'author'=>$author,
            'content'=>$content,
            'category_id'=>$category,
            'image'=>$image,
            'created_at'=>date('y-m-d h:i:s',time()),
            'updated_at'=>date('y-m-d h:i:s',time())
        ];

        $result = $this->book->insert($data);

        if ($result) {
            header("Location: /book");
        }
    }

}