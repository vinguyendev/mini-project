<?php
/**
 * @var array $data
 */
?>

<?php
include 'app/views/layout/header.php';
include 'app/views/layout/nav-menu.php';
?>

<?php

$categories = $data['categories'];
$text_error = "";
$error = !empty($data['error'])?$data['error']:'';
switch ($error){
    case "name":
        $text_error = "Tên không đúng định dạng";
        break;
    case "author":
        $text_error = "Tên tác giả không đúng định dạng";
        break;
    case "content":
        $text_error = "Giới thiệu sách không được để trống";
        break;
    case "category":
        $text_error = "Phải chọn thể loại";
        break;
    case "image":
        $text_error = "Bạn chưa upload ảnh";
        break;
    case "fail":
        $text_error = "Thêm sách thất bại";
        break;
    default:
        break;
}

$success = !empty($data['success'])?$data['success']:"";

?>

<div class="container">
    <span class="title">Thêm sách mới</span>
    <br>
    <div class="contain-create-book">
        <form action="/book/store"
              method="post"
              enctype="multipart/form-data"
              onsubmit="return checkValidate()"
        >
            <?php
            if (!empty($text_error)) {
                ?>
                <span class="alert-warning">* <?php echo $text_error?></span>
                <?php
            }
            ?>
            <?php
            if (!empty($success)) {
                ?>
                <span class="alert-success">Thêm sách thành công</span>
                <?php
            }
            ?>
            <br>
            <br>

            <div class="form-group">
                <label for="name">Tên sách</label>
                <input type="text"
                       name="name"
                       id="name"
                       class="form-control"
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
                ></textarea>
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
                            ?>
                            <option value="<?php echo $category->id?>"><?php echo $category->name?></option>
                            <?php
                        }
                    ?>
                </select>
                <span id="book-category" class="error"></span>
            </div>

            <input type="file" name="image" id="image" accept="image/*">
            <span id="book-image" class="error"></span>
            <br><br>
            <br><br>
            <div class="form-group contain-btn">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
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
        let image = $('#image').val();

        let checkName = validateNameBook(name);
        let checkAuthor = validateAuthorBook(author);
        let checkContent = validateContentBook(content);
        let checkCategory = validateCategoryBook(category);
        let checkImage = validateImageBook(image);
        return checkName && checkAuthor && checkContent && checkCategory && checkImage;
    }
</script>

<?php
include 'app/views/layout/footer.php'
?>

