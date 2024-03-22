window.addEventListener("load", function () {
    document.getElementById("aceptar").disabled = true;
    document.getElementById("fecha").valueAsDate = new Date();
});


function validarEmail() {
    email = document.getElementById('correo');
    expresion = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
    if (!expresion.test(email.value)) {
        return false;
    } else {
        return true;
    }
}
function validarPass() {
    pass1 = document.getElementById('pass1');
    pass2 = document.getElementById('pass2');

    if (pass1.value != pass2.value) {
        return false;
    } else {
        return true;
    }
}
function validarCampos() {
    var nombre = document.getElementById('nombre').value;
    var apellido1 = document.getElementById('apellido1');
    var correo = document.getElementById('correo').value;
    var usuario = document.getElementById('usuario').value;
    var password = document.getElementById('password').value;
   
    if (nombre.length == 0 || apellido1.value === '' || apellido2.value === '' || correo.length == 0 || telefono.length == 0 ||
        fecha.length == 0 || usuario.length == 0 || password.length == 0 ) {
        return false;
    } else {
        return true;
    }
}

function comprobar() {

    if (!validarCampos()) {
        document.getElementById("error").innerHTML = '<p>se deben completar todos los campos<p>';
    }
    else if (!validarPass()) {
        document.getElementById("error").innerHTML = '<p>las contraseñas no coinciden<p>';
    }
    else if (!validarTelefono()) {
        document.getElementById("error").innerHTML = '<p>no es un telefono valido<p>';
    }
    else if (!validarEmail()) {
        document.getElementById("error").innerHTML = '<p>no es un email valido<p>';
    }
}