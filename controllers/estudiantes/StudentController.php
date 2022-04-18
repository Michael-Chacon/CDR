<?php
require_once 'models/materias.php';
require_once 'models/horario.php';
class StudentController
{
    public function homeEstudiante()
    {
        $listado_materias = new Materias();
        $listado_materias->setId($_SESSION['student']->id);
        $materias = $listado_materias->subjectStudent();

        # Horario de clase
        $dia = new Horario();
        $grado = $_SESSION['student']->id_gradoE;
        $lista_lunes = $dia->listarLunes($grado);
        $lista_martes = $dia->listarMartes($grado);
        $lista_miercoles = $dia->listarMiercoles($grado);
        $lista_jueves = $dia->listarJueves($grado);
        $lista_viernes = $dia->listarViernes($grado);
        require_once 'views/estudiante/home.php';
    }

    # Notas del estudiante en una materia
    public function noteStudent()
    {
        echo $materia = Utils::decryption($_GET['ids']);
    }
} # fin de la clase
