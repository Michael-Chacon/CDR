<?php
require_once 'models/asignaciones.php';
require_once 'models/horario.php';
require_once 'models/documentos.php';
require_once 'models/docente.php';

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

        #grado don de es el director
        $dir = new Docente();
        $dir->setId($id_docente);
        $mi_grado = $dir->seleccionarGradoDirector();
        if ($mi_grado->rowCount() == 0) {
            $nombre_grado = 'Sin asignar';
            $clase = '';
            $id_grado = '';
        } else {
            $grado = $mi_grado->fetchObject();
            $nombre_grado = $grado->nombre_g . '°';
            $clase = 'stretched-link';
            $id_grado = $grado->id;
        }
        require_once 'views/docente/home.php';
    }

    public function documentos()
    {
        $listado = new Documentos();
        $documentos = $listado->listar();
        require_once 'views/docente/documentos.php';
    }
}
