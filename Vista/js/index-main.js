function validar(){
    if(!validar_usuario() || !validar_contras()){
        return  validar_usuario(), validar_contras();
    }
    return true;
}


function validar_usuario(){
    var usuario = document.formulario.usuario.value;
    var error = document.getElementById('error_usuario');
    var validar = /^[a-z-A-Z-0-9]{1,12}/

    if(usuario === ""){
        error.textContent = 'Ingrese el usuario';
        return false;
    }
    if(usuario.length < 6){
        error.textContent = 'El usuario minimo es de 6 caracteres';
        return false;
    }
    if(!validar.test(usuario)){
        error.textContent = 'El usuario solo puede contener numeros y letras';
        return false;
    }
}

function validar_contras(){
    var contras = document.formulario.contras.value;
    var error = document.getElementById('error_password');
    var validar = /^[0-9]{1,12}/

    if(contras === ""){
        error.textContent = 'Ingrese la contraseña';
        return false;
    }
    if(contras.length < 6){
        error.textContent = 'La contraseña minimo debe ser de 6 caracteres';
        return false;
    }
    if(!validar.test(contras)){
        error.textContent = 'La contraseña debe contener solo numeros';
        return false;
    }
}
