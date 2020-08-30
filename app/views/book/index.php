<?php
/**
 * @var array $data
 */
?>

<?php
include 'app/views/layout/header.php';
include 'app/views/layout/nav-menu.php';
?>

<div class="container">
    <span class="title">Quản lý sách</span>
    <div class="contain-book">
        <button type="button" class="btn btn-success btn-add">
            <a href="/book/create">Thêm sách mới</a>
        </button>
        <table class="table table-striped table-book">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Thể loại</th>
                <th scope="col" style="text-align: center" >Hành động</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($data as $index => $book) {
                ?>

                <tr>
                    <th scope="row"><?php echo $index + 1?></th>
                    <td><?php echo $book->name?></td>
                    <td class="image-col">
                        <img src="public/images/<?php echo $book->image?>" alt="">
                    </td>
                    <td><?php echo $book->author?></td>
                    <td>Ngôn tình</td>
                    <td style="text-align: center">
                        <button type="button" class="btn btn-outline-info btn-action">
                            <a href="/book/show/<?php echo $book->id?>">Xem</a>
                        </button>
                        <button type="button" class="btn btn-outline-secondary">Sửa</button>
                        <button type="button" class="btn btn-outline-danger">Xóa</button>
                    </td>
                </tr>

                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include 'app/views/layout/footer.php'
?>
