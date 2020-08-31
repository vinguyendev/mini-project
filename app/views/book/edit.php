<?php
/**
 * @var array $data
 */
?>


<?php
include 'app/views/layout/header.php';
include 'app/views/layout/nav-menu.php';

$book = $data['book'];
$categories = $data['categories'];
$error = !empty($data['error'])?$data['error']:'';
$text_error = "";
switch ($error) {
    case "fail":
        $text_error = "Cập nhật thất bại";
        break;
    default:
        break;
}

?>

<div class="container">
    <span class="title">Cập nhật sách</span>
    <br>
    <div class="contain-create-book">
        <?php
        if (!empty($text_error)) {
            ?>
            <br><br>
            <span class="alert-warning">* <?php echo $text_error?></span>
            <br><br>
            <?php
        }
        ?>
        <form action="/book/update/<?php echo $book->id?>"
              method="post" enctype="multipart/form-data"
              onsubmit="return checkValidate()"
        >
            <div class="form-group">
                <label for="name">Tên sách</label>
                <input type="text"
                       name="name"
                       id="name"
                       class="form-control"
                       value="<?php echo $book->name?>"
                       placeholder="Nhập tên sách"
                >
                <span id="book-name" class="error"></span>
            </div>
            <div class="form-group">
                <label for="author">Tác giả</label>
                <input type="text"
                       name="author"
                       id="author"
                       class="form-control"
                       value="<?php echo $book->author?>"
                       placeholder="Nhập tên tác giả"
                >
                <span id="book-author" class="error"></span>
            </div>
            <div class="form-group">
                <label for="content">Mô tả</label>
                <textarea rows="3"
                          id="content"
                          class="form-control"
                          name="content"
                          placeholder="Nhập mô tả về sách"
                ><?php echo $book->content?></textarea>
                <span id="book-content" class="error"></span>
            </div>

            <div class="form-group">
                <label for="category">Thể loại</label>
                <select class="form-control"
                        name="category"
                        id="category"
                >
                    <option value="0">Chọn thể loại</option>
                    <?php
                        foreach ($categories as $category) {
                            if($book->category_id == $category->id) {
                                ?>
                                <option value="<?php echo $category->id?>" selected><?php echo $category->name?></option>
                                <?php
                            }
                            else {
                                ?>
                                <option value="<?php echo $category->id?>"><?php echo $category->name?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
                <span id="book-category" class="error"></span>
            </div>
            <input type="file" class="image-input" name="image" onchange="onChangeImage()" id="image" accept="image/*">
            <span class="name-image"><?php echo $book->image?></span>
            <span id="book-image" class="error"></span>
            <br><br>
            <div class="form-group contain-btn">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
            <br>
            <a href="/book">
                <button type="button" class="btn btn-primary btn-add">
                    Quay lại trang chủ
                </button>
            </a>
            <br><br>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/public/js/app.js"></script>

<script>
    function checkValidate() {
        let name = $("#name").val();
        let author = $("#author").val();
        let content = $("#content").val();
        let category = $("#category").val();

        let checkName = validateNameBook(name);
        let checkAuthor = validateAuthorBook(author);
        let checkContent = validateContentBook(content);
        let checkCategory = validateCategoryBook(category);
        return checkName && checkAuthor && checkContent && checkCategory;
    }
</script>

<?php
include 'app/views/layout/footer.php'
?>

