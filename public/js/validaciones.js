function validarMail(){
    var email=document.getElementById('input-email').value;
    var exp=/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if(exp.test(email)){
        document.getElementById('input-email').classList.add("is-valid");
        document.getElementById('input-email').classList.remove("is-invalid");
        return true;
    }else{
        document.getElementById('input-email').classList.add("is-invalid");
        document.getElementById('input-email').classList.remove("is-valid");
        return false;
    }


}

function validarPass(){
    var password=(document.getElementById('input-password').value);
    if(password!=""){
        document.getElementById('input-password').classList.add("is-valid");
        document.getElementById('input-password').classList.remove("is-invalid");
        return true;
    }else{
        document.getElementById('input-password').classList.add("is-invalid");
        document.getElementById('input-password').classList.remove("is-valid");
        return false;
    }
}

function validar(event) {
    event.preventDefault();

    var emailValido = validarMail();
    var passValida = validarPass();

    if (emailValido && passValida) {
        document.getElementById('loginForm').submit();
    }
}