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
        $books = $this->book->getAll();
        $error = '';
        $success = '';
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
        };
        if (isset($_GET['success'])) {
            $success = $_GET['success'];
        };
        $categories = [];

        $arrCate = $this->categories->getAll();
        foreach ($arrCate as $cate) {
            $categories[$cate->id] = $cate->name;
        }

        $data = [
            'error'=>$error,
            'success'=>$success,
            'books'=>$books,
            'categories'=>$categories
        ];

        $this->view('book/index', $data);
    }

    public function create()
    {
        $categories = $this->categories->getAll();
        $error = '';
        $success = '';
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
        };
        if (isset($_GET['success'])) {
            $success = $_GET['success'];
        }

        $data = [
            'categories'=>$categories,
            'error'=>$error,
            'success'=>$success
        ];

        $this->view('book/create',$data);
    }

    public function edit($id)
    {
        $book = $this->book->findById($id);
        $categories = $this->categories->getAll();
        $error = '';
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
        };
        $data = [
            'book'=>$book,
            'categories'=>$categories,
            'error'=>$error
        ];

        $this->view('book/edit', $data);
    }

    public function update($id)
    {
        $name = isset($_POST['name'])?$_POST['name']:"";
        $author = isset($_POST['author'])?$_POST['author']:"";
        $content = isset($_POST['author'])?$_POST['author']:"";
        $category = isset($_POST['category'])?$_POST['category']:"";
        $image = changeToSlug($name).'.png';
        $file = $_FILES['image']["tmp_name"];

        if (!is_string($name) || !strlen($name)>0) {
            header('Location: /book/edit&error=name');
        }

        if (!is_string($author) || !strlen($author)>0) {
            header('Location: /book/edit&error=author');
        }

        if (!is_string($content) || !strlen($content)>0) {
            header('Location: /book/edit/&error=author');
        }

        if ($category <= 0) {
            header('Location: /book/edit&error=category');
        }

        if (!empty($file)) {
            $data = [
                'name'=>trim($name),
                'author'=>trim($author),
                'content'=>trim($content),
                'category_id'=>$category,
                'image'=>$image,
                'updated_at'=>date('y-m-d h:i:s',time())
            ];

            $file_tmp = $_FILES['image']['tmp_name'];
            $target_dir = 'public/images/';
            $target_file = $target_dir.basename($data['image']);
            if (move_uploaded_file($file_tmp, $target_file)) {
                if (!empty($data['name'])) {
                    if($this->book->update($data, $id)){
                        header("Location: /book&success=update");
                    }
                    else {
                        header("Location: /book/edit/".$id."&error=fail");
                    }
                }
            }
            else{
                header("Location: /book/edit/".$id."&error=fail");
            }

        }
        else {
            $name_old = $this->book->findById($id)->name;
            $image = changeToSlug($name_old).'.png';

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
                header("Location: /book&success=update");
            } else {
                header("Location: /book/edit&error=fail");
            }
        }

    }

    public function store()
    {
        $name = isset($_POST['name'])?$_POST['name']:"";
        $author = isset($_POST['author'])?$_POST['author']:"";
        $content = isset($_POST['author'])?$_POST['author']:"";
        $category = isset($_POST['category'])?$_POST['category']:"";
        $image = changeToSlug($name).'.png';
        $file = $_FILES['image'];

        if (!is_string($name) || !strlen($name)>0) {
            header('Location: /book/create&error=name');
        }

        if (!is_string($author) || !strlen($author)>0) {
            header('Location: /book/create&error=author');
        }

        if (!is_string($content) || !strlen($content)>0) {
            header('Location: /book/create&error=author');
        }

        if ($category <= 0) {
            header('Location: /book/create&error=category');
        }

        if (isset($file)) {
            header('Location: /book/create&error=image');
        }

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
                    header("Location: /book&success=create");
                }
                else {
                    header("Location: /book/create&error=fail");
                }
            }
        }
        else{
            header("Location: /book/create&error=fail");
        }

    }

    public function show($id)
    {
        $data = $this->book->findById($id);
        $data->category = $this->categories->findById($data->category_id)->name;

        $this->view('book/show',$data);
    }


    public function delete($id)
    {
        $result = $this->book->delete($id);

        if ($result) {
            header("Location: /book&success=delete");
        }
        else {
            header("Location: /book&error=fail");
        }
    }

}