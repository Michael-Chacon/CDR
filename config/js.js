function confirmar() {
    const respuesta = confirm("¿Estás seguro de eliminarlo?");
    if (respuesta == true) {
        return true;
    } else {
        return false;
    }
}