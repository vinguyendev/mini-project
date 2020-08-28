<?php

include_once 'app/helpers/slug.php';


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
        $image = changeToSlug($name).'.png';

        $data = [
            'name'=>trim($name),
            'author'=>trim($author),
            'content'=>trim($content),
            'category_id'=>$category,
            'image'=>$image,
            'created_at'=>date('y-m-d h:i:s',time()),
            'updated_at'=>date('y-m-d h:i:s',time())
        ];

        $file_tmp = $_FILES['image']['tmp_name'];
        $target_dir = 'public/images/';
        $target_file = $target_dir.basename($data['image']);

        if (move_uploaded_file($file_tmp, $target_file)) {
            if (!empty($data['name'])) {
                if($this->book->insert($data)){
                    echo '<script language="javascript">alert("Đã thêm sách thành công!");</script>';
                }
                else {
                    echo '<script language="javascript">alert("Fail!");</script>';
                }
            }
        }
        else{
            echo '<script language="javascript">alert("Upload thất bại!");</script>';
        }

    }

}