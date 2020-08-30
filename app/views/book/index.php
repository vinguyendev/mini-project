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
        <a href="/book/create">
            <button type="button" class="btn btn-success btn-add">
                Thêm sách mới
            </button>
        </a>
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
                    <td>
                        <a href="/book/show/<?php echo $book->id?>">
                            <?php echo $book->name?>
                        </a>
                    </td>
                    <td class="image-col">
                        <img src="public/images/<?php echo $book->image?>" alt="">
                    </td>
                    <td><?php echo $book->author?></td>
                    <td>Ngôn tình</td>
                    <td style="text-align: center">
                        <a href="/book/show/<?php echo $book->id?>">
                            <button type="button" class="btn btn-outline-info btn-action">
                                Xem
                            </button>
                        </a>
                        <button type="button" class="btn btn-outline-secondary">Sửa</button>
                        <button type="button"
                                class="btn btn-outline-danger btnDelete"
                                onclick="onDelete(<?php echo $book->id?>,'<?php echo $book->name?>')"
                        >
                            Xóa
                        </button>
                    </td>
                </tr>

                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<div class="container">
    <div class="modal fade" id="modalDelete" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header model-delete">
                    <h4 class="modal-title">Bạn có chắc chắn xóa <span id="name-book"></span>?</h4>
                </div>
                <div class="modal-body model-delete-btn">
                    <button type="button" class="btn btn-success btn-confirm" data-id="0" onclick="confirmDelete()">Xác nhận</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $(".btnDelete").click(function(){
            $("#modalDelete").modal();
        });
    });
</script>

<?php
include 'app/views/layout/footer.php'
?>
