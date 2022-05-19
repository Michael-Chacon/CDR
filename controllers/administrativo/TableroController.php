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
        print_r($resultado);

    }
}
