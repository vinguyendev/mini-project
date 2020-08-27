<?php
include 'app/views/layout/header.php'
?>

    <div class="main-container">
        <div class="contain-form">
            <span class="title-page">Đăng ký</span>
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Tên tài khoản</label>
                    <input
                            type="text"
                            class="form-control"
                            name="username"
                            id="username"
                            placeholder="Nhập tên tài khoản"
                    >
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input
                            type="password"
                            class="form-control"
                            id="password"
                            name="password"
                            placeholder="Nhập mật khẩu"
                    >
                </div>
                <div class="form-group">
                    <label for="re-password">Xác nhận mật khẩu</label>
                    <input
                            type="password"
                            class="form-control"
                            id="re-password"
                            name="re-password"
                            placeholder="Nhập lại mật khẩu"
                    >
                </div>
                <div class="form-group form-check remember-password row">
                    <div class="col-md-8">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">Nhớ mật khẩu</label>
                    </div>
                    <div class="col-md-4 ">
                        <a href="/auth/login">Đăng nhập</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Đăng ký</button>
            </form>
        </div>
    </div>

<?php
include 'app/views/layout/footer.php'
?>