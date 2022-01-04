function confirmar() {
    const respuesta = confirm("¿Estás seguro de eliminarlo?");
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