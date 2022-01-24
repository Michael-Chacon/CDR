<?php
require_once 'models/asignaciones.php';
require_once 'models/horario.php';

class TeacherController
{
    public function homeDocente()
    {
        $id_docente = $_SESSION['teacher']->id;
        $grados = new Asignaciones();
        $grados->setIdDocente($id_docente);
        $mis_grados = $grados->docenteGrados();
        # horario 
        $dia = new Horario();
        $dia->setId($id_docente);
        $dia_lunes = $dia->horarioLunes();
        $dia_martes = $dia->horarioMartes();
        $dia_miercoles = $dia->horarioMiercoles();
        $dia_jueves = $dia->horarioJueves();
        $dia_viernes = $dia->horarioViernes();
        require_once 'views/docente/home.php';
    }
}
