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

?>

<div class="container">
    <span class="title">Cập nhật sách</span>
    <br>
    <div class="contain-create-book">
        <form action="/book/update/<?php echo $book->id?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Tên sách</label>
                <input type="text"
                       name="name"
                       id="name"
                       class="form-control"
                       value="<?php echo $book->name?>"
                       placeholder="Nhập tên sách"
                >
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
            </div>
            <div class="form-group">
                <label for="content">Mô tả</label>
                <textarea rows="3"
                          id="content"
                          class="form-control"
                          name="content"
                          placeholder="Nhập mô tả về sách"
                ><?php echo $book->content?></textarea>
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
            </div>

            <div class="form-group">
                <label>Hình ảnh</label>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input">
                    <label class="custom-file-label">Choose file...</label>
                </div>
            </div>
            <br><br>
            <div class="form-group contain-btn">
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
            <br><br><br>
        </form>
    </div>
</div>


<?php
include 'app/views/layout/footer.php'
?>

