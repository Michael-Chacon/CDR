function confirmar() {
    const respuesta = confirm("¿Estás seguro de eliminarlo?");
    if (respuesta == true) {
        return true;
    } else {
        return false;
    }
}

function eliminarGrado() {
    const respuesta = confirm("¿Estás seguro de eliminarlo? Si eliminas el grado, se eliminarán todos los estudiantes matriculados en él.");
    if (respuesta == true) {
        return true;
    } else {
        return false;
    }
}

function actualizar() {
    const respuesta2 = confirm("¿Estás seguro de actualizar la información?");
    if (respuesta2 == true) {
        return true;
    } else {
        return false;
    }
}