
function check_search() {
    $('#errortitle').html('');
    var title = document.forms[2].title.value;
    if (title == "")
    {
        $('#errortitle').html('Enter the tittle');
        return false;
    }
    return true;
}

function check_login() {

    //client side (JS) validation. This happens before submitting.
    $('#errorname').html('');
    $('#errorpassword').html('');
    var user_name = document.forms[0].users_email.value;
    var user_password = document.forms[0].users_pass.value;
    if (user_name == "" )  {
        $('#errorname').html('Enter the user name');
        return false;
    }
    if(user_password == ""){
        $('#errorpassword').html('Enter the password');
        return false;
    }

    //do some more checks here..
    //return true if all checks have passed, false otherwise.

    //the return value of this function is checked before submit. The form is submitted only when this function returns a true.
    return true;
}

function check_upload() {
    $('#errortitle').html('');
    $('#errorcategory').html('');
    $('#errorimage').html('');
    var title = document.forms[0].title.value;
    var category = document.forms[0].category_name.value;
    var image = document.forms[0].photo.value;
    if (title == "" ) {
$('#errortitle').html('Enter the title');
        return false;
    }
if(category == "" ){
    $('#errorcategory').html('Enter the category name');
    return false;
}
if(image == ""){
    $('#errorimage').html('Upload the photo');
    return false;
}
    return true;
}

function check_update() {
    $('#errortitle').html('');
    $('#errorcategory').html('');
    var title = document.forms[0].title.value;
    var category = document.forms[0].category.value;
    if (title == "") {
        $('#errortitle').html('Enter the name');
        return false;
    }
    if( category == ""){
        $('#errorcategory').html('Enter the category name');
        return false;
    }
        
    return true;

}


