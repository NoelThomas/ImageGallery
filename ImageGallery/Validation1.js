
function check_search() {
//    $('#errortitle').html('');

//    var title = document.forms[1].title.value;
//    
//    if (title == "")
//    {
//        $('#errortitle').html('Enter the tittle');
//        return false;
//    }
    document.getElementById('subfooter').style.display = 'block';
    return true;
}

function check_login() {

    //client side (JS) validation. This happens before submitting.
    $('#errorname').html('');
    $('#errorpassword').html('');

    var user_name = document.forms[0].users_email.value;
    var user_password = document.forms[0].users_pass.value;

    if (user_name == "") {
        $('#errorname').html('Enter the user name');
        return false;
    }

    if (user_password == "") {
        $('#errorpassword').html('Enter the password');
        return false;
    }

    //return true if all checks have passed, false otherwise.
    return true;
}

function check_upload() {

    $('#errortitle').html('');
    $('#errorcategory').html('');
    $('#errorimage').html('');

    var title = document.forms[0].title.value;
    var select = document.forms[0].select.value;
    var image = document.forms[0].photo.value;
    var extension = image.substring(image.lastIndexOf('.') + 1);

    if (title == "") {
        $('#errortitle').html('Enter the title');
        return false;
    }

    if (select == "All Categories") {
        $('#errorcategory').html('Enter the category name');
        return false;
    }

    if (extension == "gif" || extension == "GIF" || extension == "JPEG" || extension == "jpeg" || extension == "jpg" || extension == "JPG")
    {
        return true;
    }
    else
    {
        $('#errorimage').html('Not an image');
        return false;
    }

    return true;
}

function check_update() {
    $('#errortitle').html('');
    $('#errorcategory').html('');

    var title = document.forms[0].title.value;
    var category = document.forms[0].select.value;

    if (title == "") {
        $('#errortitle').html('Enter the name');
        return false;

    }

    if (category == "All Categories") {
        $('#errorcategory').html('Select the category name');
        return false;
    }

    return true;

}


