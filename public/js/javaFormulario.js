function validarTexto(input) {
    if (input.classList.contains("cuatro")) {
        if (input.value.length == 4 && isNaN(parseInt(input.value))) {
            input.classList.add("is-valid");
        } else {
            input.classList.add("is-invalid");
        }
    } else {
        if (isNaN(input.value)) {
            input.classList.add("is-valid") ;
        } else {
            input.classList.add("is-invalid");
        }
    }
    var nuevoElemento = document.createElement("div");
    nuevoElemento.className = "valido";
    if (input.classList.contains("is-valid")) {
        nuevoElemento.innerHTML = "Introduce un formato valido";
    } else if (input.classList.contains("is-invalid")) {
        nuevoElemento.innerHTML = "Introduce un formato valido";
        flag=1;
        numero--;
    }
    input.parentNode.appendChild(nuevoElemento);
} 


function validarCorreo(input, otroInput) {
    var correoRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (correoRegex.test(input.value)) {
        input.classList.add("is-valid");
    } else {
        input.classList.add("is-invalid");
        numero--;
    }

    var nuevoElemento = document.createElement("div");
    nuevoElemento.className = "valido";
    if (input.classList.contains("is-valid")) {
        nuevoElemento.innerHTML = "Correo electrónico válido";
    } else if (input.classList.contains("is-invalid")) {
        nuevoElemento.innerHTML = "Correo electrónico no valido";
    }
    input.parentNode.appendChild(nuevoElemento);
    if (otroInput) {
        if (input.value === otroInput.value) {
            input.classList.add("is-valid");
            otroInput.classList.add("is-valid");
        } else {
            input.classList.add("is-invalid");
            otroInput.classList.add("is-invalid");
            numero--;
        }
    }


}

function validarContraseña(input){
    var requisitos = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;

    if (requisitos.test(input.value)) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
    } else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        
    }



    var nuevoElemento = document.createElement("div");
    nuevoElemento.className = "valido";
    if (input.classList.contains("is-valid")) {
        nuevoElemento.innerHTML = "valido";
    } else if (input.classList.contains("is-invalid")) {
        nuevoElemento.innerHTML = "Introduce un formato valido(minusculas,mayusculas...)";
        flag=1;
        numero--;
    }
    input.parentNode.appendChild(nuevoElemento);
}

function Validarformulario() {
    numero = 6;
    var elementos = document.getElementsByClassName("valido");

    if (elementos.length > 0) {
        for (var i = elementos.length - 1; i >= 0; i--) {
            var elemento = elementos[i];
            elemento.parentNode.removeChild(elemento);
        }
    }
    var datos = document.getElementsByTagName("input");
    for (var i = 0; i < datos.length; i++) {
        
        datos[i].classList.remove("is-invalid");
        datos[i].classList.remove("is-valid");
        if (datos[i].classList.contains('obligatorio')  && datos[i].value == null) {
            datos[i].classList.add("is-invalid");
        } else {
            if (datos[i].classList.contains("texto")) {
                validarTexto(datos[i])
            }
            if (datos[i].classList.contains("correo")) {
                var otroInput = document.getElementById('correo1');
                validarCorreo(datos[i], otroInput);
            }
            if (datos[i].classList.contains("contrasena")) {
                validarContraseña(datos[i]);
            }
        }
    }
    var contrasena = document.getElementById('contrasena').value;
    var confirmacionContrasena = document.getElementById('confirmarContrasena').value;

    if (contrasena !== confirmacionContrasena) {
        numero--;
        document.getElementById('confirmarContrasena').classList.add("is-invalid");
    }

    return numero === 6;

}