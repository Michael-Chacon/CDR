<?php
require_once 'models/horario.php';

class HorarioController
{
    public function registrarHorario()
    {
        if (!empty($_POST)) {
            $materia = trim($_POST['id_materia']);
            $dia = trim($_POST['dia']);
            $inicio = trim($_POST['inicio']);
            $fin = trim($_POST['fin']);
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

        header("Location: " . base_url . 'Materias/vista&id_grado=' . $grado);
    }
} # fin de la clase
