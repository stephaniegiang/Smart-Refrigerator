function validate(){
    var pass1 = document.forms["register-form"]["password"].value;
    var pass2 = document.forms["register-form"]["confirm-password"].value;
    if (pass1!=pass2){
        alert("Passwords Do not match");
        document.forms["register-form"]["password"].style.borderColor = "#E34234";
        document.forms["register-form"]["confirm-password"].style.borderColor = "#E34234";
        return false;
    }
    alert("ok its at least reading this");
    return true;
}