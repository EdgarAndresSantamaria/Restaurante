function validaEmail(campo) {
     var valor = campo.value;
    if(!(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/.test(valor)) ) {
        alert("El email introducido no es válido.");
        document.getElementById("email").focus();
        return false;
    }
    else{
        return true;
    }
}
function validaPass1(campo) {
    var valor = campo.value;
    if(!(/(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,10})$/.test(valor)) ) {
        alert("Entre 8 y 10 caracteres, por lo menos un digito y un alfanumérico, y no puede contener caracteres espaciales.");
        document.getElementById("password1").focus();
        return false;
    }
    else{
        return true;
    }
}