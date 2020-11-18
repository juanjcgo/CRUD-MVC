function validar(){
    if(!validar_id() || !validar_nombre() || !validar_precio() || !validar_cate() || !validar_img()){
        return validar_id(),validar_nombre(),validar_precio(),validar_cate(),validar_img();
    }
    return true;
}


function validar_id(){
    
    var id = document.formulario.id.value;
    var error = document.getElementById('error_id');
    var validar = /^[0-9]{1,10}/

    if(id === ""){
        error.textContent = 'Ingrese el codigo del producto';
        return false;
    }
    /* debo crear la funcionalidad */
  /*   if(!id){
        error.textContent = 'El codigo ya existe';
        return false;
    } */
    if(!validar.test(id)){
        error.textContent = 'El codigo debe contener solo numeros';
        return false;
    }
}
function validar_nombre(){
    var nombre = document.formulario.nombre.value;
    var error = document.getElementById('error_nombre');
    var validar = /^[a-z-A-Z]{1,12}/

    if(nombre === ""){
        error.textContent = 'Ingrese el nombre para el producto';
        return false;
    }
    if(nombre.length > 12){
        error.textContent = 'El nombre debe contener menos de 12 caracteres';
        return false;
    }
    if(!validar.test(nombre)){
        error.textContent = 'El nombre debe contener solo letras';
        return false;
    }
    
}
function validar_precio(){
    var precio = document.formulario.precio.value;
    var error = document.getElementById('error_precio');
    var validar = /^[0-9]{1,12}/

    if(precio === ""){
        error.textContent = 'Ingrese el precio del producto';
        return false;
    }
    if(!validar.test(precio)){
        error.textContent = 'El precio solo debe contener numeros';
        return false;
    }
    
}
function validar_cate(){
    var cat_id = document.formulario.cat_id.value;
    var error = document.getElementById('error_cate');

    if(cat_id === ""){
        error.textContent = 'Ingrese una categoria';
        return false;
    }
    
}

function validar_img(){
    var img = document.formulario.img.value;
    var error = document.getElementById('error_img');

    if(img == ""){
        error.textContent = 'Agrege una imagen';
        return false;
    }
    
}