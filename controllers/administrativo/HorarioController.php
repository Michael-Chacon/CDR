<?php
require_once 'models/administrativo/horario.php';

class HorarioController
{
    public function registrarHorario()
    {
        if (!empty($_POST)) {
            $materia = $_POST['id_materia'];
            $dia = $_POST['dia'];
            $inicio = $_POST['inicio'];
            $fin = $_POST['fin'];
            $horario = new Horario();
            $horario->setMateria($materia);
            $horario->setDia($dia);
            $horario->setInicio($inicio);
            $horario->setFin($fin);
            $resultado = $horario->guardarHorario();
            Utils::validarReturn($resultado, 'registrarHorario');
        }
        header("Location: " . base_url . 'Materias/vista&id_grado=' . $_POST['id_grado']);
    }

    # eliminar el hotario de una materia en un dia especifico
    public function eliminarHora()
    {
        $dia = $_GET['dia'];
        $id = $_GET['id_horario'];
        $grado = $_GET['grado'];

        $delete = new Horario();
        $delete->setId($id);
        $delete->setDia($dia);
        $resultado = $delete->deleteDay();
        Utils::validarReturn($resultado, 'eliminarHora');

        header("Location: ".base_url. 'Materias/vista&id_grado='. $grado);
    }
} # fin de la clase
