<?php
/**
 * @var array $data
 */
?>
<?php
include 'app/views/layout/header.php'
?>

<?php

    $text_error = "";
    $error = !empty($data['error'])?$data['error']:'';
    if ($error == "fail") {
        $text_error = "Tên tài khoản đã tồn tại";
    }
    if ($error == "username") {
        $text_error = "Username không đúng định dạng";
    }
    if ($error == "password") {
        $text_error = "Mật khẩu không đúng định dạng";
    }
    if ($error === "re_password") {
        $text_error = "Mật khẩu không đúng định dạng";
    }

    $success = !empty($data['success'])?$data['success']:'';

?>

<div class="main-container">
    <div class="contain-form">
        <span class="title-page">Đăng ký</span>
        <form action="/auth/store"
              method="post"
              onsubmit="return validate()"
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
                <span class="alert-success">Đăng ký thành công</span>
                <?php
            }
            ?>
            <br>

            <div class="form-group">
                <label for="username">Tên tài khoản</label>
                <input
                        type="text"
                        class="form-control"
                        name="username"
                        id="username"
                        value="Vinguyen123"
                        placeholder="Nhập tên tài khoản"
                >
                <span id="check-username" class="error"></span>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input
                        type="password"
                        class="form-control"
                        id="password"
                        name="password"
                        value="Videv@123"
                        placeholder="Nhập mật khẩu"
                >
                <span id="check-password" class="error"></span>
            </div>
            <div class="form-group">
                <label for="re-password">Xác nhận mật khẩu</label>
                <input
                        type="password"
                        class="form-control"
                        id="re-password"
                        name="re-password"
                        value="Videv@123"
                        placeholder="Nhập lại mật khẩu"
                >
                <span id="re-check-password" class="error"></span>
            </div>
            <div class="col-md-4 ">
                <a href="/auth/login">Đăng nhập</a>
            </div>
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../public/js/app.js"></script>
    <script>
        function validate() {
            let username = $('#username').val();
            let password = $('#password').val();
            let remember = $('#remember').val();
            let rePassword = $('#re-password').val();

            if (password !== rePassword) {
                $('#re-check-password').html("Mật khẩu nhập lại không khớp");
                return false;
            }
            return validateUsername(username) && validatePassword(password);
        }
    </script>

<?php
include 'app/views/layout/footer.php'
?>