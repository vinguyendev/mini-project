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

?>

<div class="container">
    <span class="title">Thêm sách mới</span>
    <br>
    <div class="contain-create-book">
        <form action="/book/store"
              method="post"
              enctype="multipart/form-data"

        >
            <div class="form-group">
                <label for="name">Tên sách</label>
                <input type="text"
                       name="name"
                       id="name"
                       class="form-control"
                       placeholder="Nhập tên sách"
                       value="Trí tuệ cộng tác"
                >
            </div>
            <div class="form-group">
                <label for="author">Tác giả</label>
                <input type="text"
                       name="author"
                       id="author"
                       class="form-control"
                       placeholder="Nhập tên tác giả"
                       value="Dr. Rusly Abdullah PHD"
                >
            </div>
            <div class="form-group">
                <label for="content">Mô tả</label>
                <textarea rows="3"
                          id="content"
                          class="form-control"
                          name="content"
                          placeholder="Nhập mô tả về sách"
                >Trí tuệ cộng tác sẽ đưa bạn từ quá khứ đến với tương lai, đó là một con đường dài, cần có người chung vai giúp sức. Việc chúng ta khác nhau không có nghĩa là phải có một người trong chúng ta là người sai. Điều đó đơn giản là không chỉ có một cách để đúng
                </textarea>
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
            </div>

            <input type="file" name="image">
            <br><br>
            <div class="form-group contain-btn">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </div>
            <br><br><br>
        </form>
    </div>
</div>


<?php
include 'app/views/layout/footer.php'
?>

