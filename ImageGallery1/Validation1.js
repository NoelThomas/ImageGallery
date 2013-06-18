function checkForm(){

    //client side (JS) validation. This happens before submitting.
    var username = document.forms[1].users_email.value;
    if (username.length >15 ){
        alert("Name is too long");
        return false;
    }
    //do some more checks here..
    //return true if all checks have passed, false otherwise.

    //the return value of this function is checked before submit. The form is submitted only when this function returns a true.
    return true;
}
    


