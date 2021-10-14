//******************************************************************************
//******************************************************************************
function getRequest(link, func) {
    var http = new XMLHttpRequest();
    http.open('GET', link);
    http.onreadystatechange = function() {
        if (http.readyState == 4 && http.status == 200) {
            func(http.responseText);
        }
    }
    http.send(null);
}

function postRequest(link, data, func = null, func2 = null) {
    var http = new XMLHttpRequest();
    http.open('POST', link, true);
    http.onreadystatechange = function() {
        if (http.readyState == 4 && http.status == 200) {
            func(http.responseText);
        }
    }
    if (func2 != null) {
        http.upload.onprogress = function() {
            func2(event);
        }
    }
    http.send(data);
}
//******************************************************************************
//******************************************************************************
function stringLimitLength(str, limit) {
    if (str.length <= limit)
        return str;
    return str.substring(0, limit) + "...";
}

function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
        vars[key] = value;
    });
    return vars;
}

function getById(id) {
    return document.getElementById(id);
}

function getByName(name) {
    return document.getElementsByName(name);
}

function signup() {
    var fd = new FormData();
    fd.append('fullname', document.getElementsByName('fullname')[0].value);
    fd.append('email', document.getElementsByName('email')[0].value);
    fd.append('username', document.getElementsByName('username')[0].value);
    fd.append('password', document.getElementsByName('password')[0].value);
    fd.append('password2', document.getElementsByName('password2')[0].value);

    postRequest('?action=signup', fd, function(resp) {
        console.log(resp);
        switch (resp) {
            case "Error: username_exist":
                alert("Username is exist. Please try another!");
                break;
            case "Error: email_exist":
                alert("Email is exist. Please try another!");
                break;
            case "Error: password_short":
                alert("Password is too short. The minimum length is 8!");
                break;
            case "Error: password_mismatch":
                alert("Repeat password is not match. Please try again!");
                break;
            case "Error: fullname_empty":
                alert("Full name is empty!");
                break;
            case "Error: username_empty":
                alert("Username is empty!");
                break;
            case "SignupOK":
                location.href = "./.";
            default:
                break;
        }
    });
}

function loadInfo() {
    getRequest('?action=load_info', function(resp) {
        var data = JSON.parse(resp);
        getById("info_email").value = data['email'];
        getById("info_username").value = data['username'];
        getById("info_fullname").value = data['fullname'];
    });
}

function updateInfo(obj) {
    var fd = new FormData();
    fd.append('fullname', getById('info_fullname').value);
    fd.append('email', getById('info_email').value);
    postRequest('?action=update_info', fd, function(resp) {
        switch (resp) {
            case "UpdateInfoOK":
                alert("Cập nhật thành công!");
                obj.previousElementSibling.click();
                window.location.reload(true);
                break;
            case "EmptyFullname":
                alert("Họ tên không được để trống!");
                break;
            case "ExistEmail":
                alert("Email đã có người sử dụng!");
                break;
        }
    });
}

function updatePassword(obj) {
    var data = new FormData();
    data.append('oldpass', getById('old_pass').value);
    data.append('newpass', getById('new_pass').value);
    data.append('newpass2', getById('new_pass2').value);
    postRequest('?action=change_pass', data, (resp) => {
        switch (resp) {
            case "ChangePassOK":
                alert("Đổi mật khẩu thành công!");
                getById('old_pass').value = '';
                getById('new_pass').value = '';
                getById('new_pass2').value = '';
                obj.previousElementSibling.click();
                break;
            case "OldPassWrong":
                alert("Mật khẩu cũ không đúng!");
                break;
            case "ShortPassword":
                alert("Độ dài mật khẩu tối thiểu 8 ký tự");
                break;
            case "PasswordMismatch":
                alert("Mật khẩu mới nhập không khớp!");
                break;
        }
    });
}

function setDeleteItemId(id) {
    document.getElementById('deleteItemId').innerHTML = id;
}

function deleteItem(id) {
    var fd = new FormData();
    fd.append('item_id', id);

    postRequest('?action=delete_author', fd, function(resp) {
        if (resp == "DeleteItemOK") {
            alert("Xóa thành công!!!");
            window.location.reload(true);
        } else {
            alert("Xóa thất bại. Hãy thử lại sau!!!");
            window.location.reload(true);
        }
    })
}

function getAuthorDetail($id) {
    var fd = new FormData();
    fd.append("author_id", $id);

    postRequest("?action=get_author_act", fd, function(resp) {
        var data = JSON.parse(resp);
        getById("update_id").value = data["id"];
        getById("username_update").innerHTML = data["username"];
        getById("update_display_name").value = data["display_name"];
        getById("update_phone").value = data["phone"];
    });
}

function setItemId(id, username) {
    document.getElementById('author_id').value = id;
    document.getElementById('get_name').value = username;
}
// Category
function setDeleteCategoryId(id) {
    document.getElementById('deleteCategoryId').innerHTML = id;
}

function removeCategory(cate_id) {
    var fd = new FormData();
    fd.append('c_id', cate_id);

    postRequest('?action=delete_category', fd, function(resp) {
        if (resp == "DeleteCategoryOK") {
            alert("Xóa thành công!!!");
            window.location.reload(true);
        } else {
            alert("Xóa thất bại. Hãy thử lại sau!!!");
            window.location.reload(true);
        }
    })
}

function getCategoryDetail($id) {
    var fd = new FormData();
    fd.append("c_id", $id);

    postRequest("?action=get_category_act", fd, function(resp) {
        var data = JSON.parse(resp);
        getById("id_update").value = data["id"];
        getById("name_update").value = data["name"];
    });
}

// Comment
function setDeleteCommentId(id) {
    document.getElementById('deleteCommentId').innerHTML = id;
}

function removeComment(cmt_id) {
    var fd = new FormData();
    fd.append('cmt_id', cmt_id);
    console.log(cmt_id);

    postRequest('?action=delete_comment', fd, function(resp) {
        console.log(resp);
        if (resp == "DeleteCommentOK") {
            alert("Xóa thành công!!!");
            window.location.reload(true);
        } else {
            alert("Xóa thất bại. Hãy thử lại sau!!!");
            window.location.reload(true);
        }
    })
}

// News
function setDeleteNewsId(id) {
    document.getElementById('deleteNewsId').innerHTML = id;
}

function removeNews(news_id) {
    var fd = new FormData();
    fd.append('news_id', news_id);

    postRequest('?action=delete_news_act', fd, function(resp) {
        console.log(resp);
        if (resp == "DeleteNewsOK") {
            alert("Xóa thành công!!!");
            window.location.reload(true);
        } else {
            alert("Xóa thất bại. Hãy thử lại sau!!!");
            window.location.reload(true);
        }
    })
}

function setNewsUpdate(id) {
    var fd = new FormData();
    fd.append("news_id", $id);

    postRequest("?action=get_news_act", fd, function(resp) {
        var data = JSON.parse(resp);
        getById("id_update").value = data["id"];
        getById("title_update").value = data["title"];
        getById("id_category_update").value = data["id_category"];
        getById("id_author_update").value = data["id_author"];
        getById("readUrl_update").value = data["banner_image"];
        getById("summernote_update").value = data["content"];
    });
}