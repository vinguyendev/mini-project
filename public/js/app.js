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

function validateNameBook(name) {
    let check = true;
    let illegalChars = /\s\s/;
    let text = '';
    if (!name.length>0) {
        check = false;
        text = "Tên sách không được bỏ trống";
    }
    if (name.length !== name.trim().length) {
        check = false;
        text = "Tên sách không đúng định dạng";
    }
    if (illegalChars.test(name)) {
        check = false;
        text = "Tên sách không đúng định dạng";
    }
    $('#book-name').html(text);
    return check;
}

function validateAuthorBook(author) {
    let check = true;
    let illegalChars = /\s\s/;
    let text = '';
    if (!author.length>0) {
        check = false;
        text = "Tên tác giả không được bỏ trống";
    }
    if (author.length !== author.trim().length) {
        check = false;
        text = "Tên tác giả không đúng định dạng";
    }
    if (illegalChars.test(author)) {
        check = false;
        text = "Tên tác giả không đúng định dạng";
    }
    $('#book-author').html(text);
    return check;
}

function validateContentBook(content) {
    let check = true;
    let text = '';
    if (!content.length>0) {
        check = false;
        text = "Tên tác giả không được bỏ trống";
    }
    if (content.length !== content.trim().length) {
        check = false;
        text = "Tên tác giả không đúng định dạng";
    }
    $('#book-content').html(text);
    return check;
}

function validateCategoryBook(category) {
    let check = true;
    let text = "";
    if (category <=0 ) {
        check = false
        text = "Vui lòng chọn thể loại"
    }
    $('#book-category').html(text);
    return check;
}

function validateImageBook(image) {
    let check = true;
    let text = "";
    if (!image) {
        check = false;
        text = "Vui lòng upload ảnh";
    }
    $("#book-image").html(text);
    return check;
}

function onChangeImage() {
    $('.name-image').css("display","none");
    $(".image-input").css("width","auto");
    console.log('123');
}