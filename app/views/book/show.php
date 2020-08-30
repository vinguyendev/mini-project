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
    <span class="title">Chi tiết sách</span>
    <div class="contain-detail">
        <div class="detail-left">
            <img src="/public/images/<?php echo $data->image?>" alt="">
        </div>
        <div class="detail-right">
            <h3 class="book-name">
                <?php echo $data->name?>
            </h3>
            <p class="book-author">
                Tác giả: <?php echo $data->author?>
            </p>
            <p class="book-category">
                Thể loại: <?php echo $data->category_id?>
            </p>
            <p class="book-content">
                Giới thiệu: <?php echo $data->content?>
            </p>
        </div>
    </div>
</div>

<?php
include 'app/views/layout/footer.php'
?>

