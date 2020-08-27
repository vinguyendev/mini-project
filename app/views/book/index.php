<?php
include 'app/views/layout/header.php';
include 'app/views/layout/nav-menu.php';
?>

<div class="container">
    <span class="title">Quản lý sách</span>
    <div class="contain-book">
        <button type="button" class="btn btn-success btn-add">Thêm sách mới</button>
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
            <tr>
                <th scope="row">1</th>
                <td>Mỗi ngày dôi thêm một giờ</td>
                <td class="image-col">
                    <img src="https://static-shop.waka.vn/resize/340x497x1/image/img.product/0/0/0/12/6462_1.jpg" alt="">
                </td>
                <td>Lâm Tiểu Bạch</td>
                <td>Ngôn tình</td>
                <td style="text-align: center">
                    <button type="button" class="btn btn-outline-info">Xem</button>
                    <button type="button" class="btn btn-outline-secondary">Sửa</button>
                    <button type="button" class="btn btn-outline-danger">Xóa</button>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Mỗi ngày dôi thêm một giờ</td>
                <td class="image-col">
                    <img src="https://static-shop.waka.vn/resize/340x497x1/image/img.product/0/0/0/12/6462_1.jpg" alt="">
                </td>
                <td>Lâm Tiểu Bạch</td>
                <td>Ngôn tình</td>
                <td style="text-align: center">
                    <button type="button" class="btn btn-outline-info">Xem</button>
                    <button type="button" class="btn btn-outline-secondary">Sửa</button>
                    <button type="button" class="btn btn-outline-danger">Xóa</button>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Mỗi ngày dôi thêm một giờ</td>
                <td class="image-col">
                    <img src="https://static-shop.waka.vn/resize/340x497x1/image/img.product/0/0/0/12/6462_1.jpg" alt="">
                </td>
                <td>Lâm Tiểu Bạch</td>
                <td>Ngôn tình</td>
                <td style="text-align: center">
                    <button type="button" class="btn btn-outline-info">Xem</button>
                    <button type="button" class="btn btn-outline-secondary">Sửa</button>
                    <button type="button" class="btn btn-outline-danger">Xóa</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
include 'app/views/layout/footer.php'
?>
