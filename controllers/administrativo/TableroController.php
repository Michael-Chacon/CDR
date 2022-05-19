<?php
require_once 'models/tablero.php';

class TableroController
{
    public function tablero()
    {
        require_once 'views/administrativo/tablero/tablero.php';
    }

    # Guardar actividad
    public function guardarActividad()
    {
        $titulo = $_POST['titulo'];
        $fecha = $_POST['fecha'];
        $descripcion = $_POST['descripcion'];
        $color = $_POST['color'];
        $save = new Tablero();
        $save->setTitulo($titulo);
        $save->setFecha($fecha);
        $save->setDescripcion($descripcion);
        $save->setColor($color);
        $resultado = $save->saveActivity();
        Utils::alertas($resultado, 'La actividad se ha registrado en el tablero exitosamente', 'Algo salió mal al intentar registrar la actividad, inténtelo de nuevo.');
        header('Location:' . base_url . 'Tablero/tablero');

    }
}
