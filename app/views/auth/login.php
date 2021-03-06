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
    $error = $data['error'];
    if ($error == "fail") {
        $text_error = "Tên tài khoản hoặc mật khẩu không đúng";
    }
    if ($error == "username") {
        $text_error = "Username không đúng định dạng";
    }
    if ($error == "password") {
        $text_error = "Mật khẩu không đúng định dạng";
    }

?>

<div class="main-container">
    <div class="contain-form">
        <span class="title-page">Đăng nhập</span>
        <form action="/auth/checkLogin" method="post" onsubmit="return validate()" >
            <?php
            if (!empty($text_error)) {
                ?>
                <span class="alert-warning">* <?php echo $text_error?></span>
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
                        value="vinguyen"
                        placeholder="Enter Username"
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
                        placeholder="Enter Password"
                >
                <span id="check-password" class="error"></span>
            </div>
            <div class="form-group form-check remember-password row">
                <div class="col-md-8">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Nhớ mật khẩu</label>
                </div>
                <div class="col-md-4 ">
                    <a href="/auth/register">Đăng ký</a>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Đăng nhập</button>
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
        return validateUsername(username) && validatePassword(password);
    }
</script>

<?php
    include 'app/views/layout/footer.php'
?>