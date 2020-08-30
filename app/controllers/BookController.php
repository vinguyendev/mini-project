<?php

include_once 'app/helpers/slug.php';
include_once 'app/models/Category.php';


class BookController extends BaseController {

    private $book;
    private $categories;

    public function __construct()
    {
        $this->book = $this->model('Book');
        $this->categories = new Category();
    }

    public function index()
    {
        $data = $this->book->getAll();

        $this->view('book/index', $data);
    }

    public function create()
    {
        $categories = $this->categories->getAll();

        $data = [
            'categories'=>$categories
        ];

        $this->view('book/create',$data);
    }

    public function edit($id)
    {
        $book = $this->book->findById($id);
        $categories = $this->categories->getAll();
        $data = [
            'book'=>$book,
            'categories'=>$categories
        ];

        $this->view('book/edit', $data);
    }

    public function update($id)
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
            'updated_at'=>date('y-m-d h:i:s',time())
        ];

        $result = $this->book->update($data, $id);
        if ($result) {
            echo '<script language="javascript">alert("Cập nhật sách thành công!");</script>';
        } else {
            echo '<script language="javascript">alert("Cập nhật sách không thành công!");</script>';
        }

        header("Location: /book");

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

        header("Location: /book");

    }

    public function show($id)
    {
        $data = $this->book->findById($id);

        $this->view('book/show',$data);
    }


    public function delete($id)
    {
        $result = $this->book->delete($id);

        if ($result) {
            echo '<script language="javascript">alert("Đã xóa sách thành công!");</script>';
        }
        else {
            echo '<script language="javascript">alert("Có lỗi xảy ra!");</script>';
        }
        header("Location: /book");
    }

}