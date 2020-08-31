function validateUsername(username) {
    let check = true;
    let illegalChars = /\W/;
    let text = "";
    if (username.length < 6) {
        check = false;
        text = "Tên tài khoản phải nhiều hơn 6 ký tự"
    }
    else if (illegalChars.test(username)) {
        check = false;
        text = "Tên tài khoản không chứa kí tự đặc biệt"
    }
    if (check) {
        text = "";
    }
    $('#check-username').html(text);
    return check;
}

function validatePassword(password) {
    let check = true;
    let lowerCaseLetters = /[a-z]/g;
    let upperCaseLetters = /[A-Z]/g;
    let numbers = /[0-9]/g;
    let text = "";
    if (password.length < 8) {
        check = false;
        text = "Mật khẩu phải từ 8 ký tự";
    } else if (!password.match(lowerCaseLetters)) {
        check = false;
        text = "Mật khẩu phải chứa ký tự in thường";
    } else if (!password.match(upperCaseLetters)) {
        check = false;
        text = "Mật khẩu phải chứa ký tự in hoa";
    } else if (!password.match(numbers)) {
        check = false;
        text = "Mật khẩu phải có số";
    }
    if (check) {
        text = "";
    }
    $('#check-password').html(text);
    return check;
}

function onDelete(id,name) {
    $("#name-book").html(name);
    $(".btn-confirm").data("id",id);
}

function confirmDelete() {
    let id = $(".btn-confirm").data('id');
    location.href = "/book/delete/"+id;
}