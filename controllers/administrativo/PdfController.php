<?php
require_once 'models/fallas.php';
require_once 'models/notas.php';
require_once 'models/estudiante.php';
require_once 'models/docente.php';
class PdfController
{
    # generar el pdf con los estudiantes que petenecen a un a grado
    public function pdf()
    {
        require_once 'views/pdf/estudiantesGrado.php';
    }

    # Generar pdf con el listado de fallas de un estudiante
    public function listadoFallas()
    {
        $estudiante = $_GET['student'];
        $id_materia = $_GET['id_subject'];
        $materia = $_GET['subject'];
        $grado = $_GET['degree'];
        $nombre = $_GET['name'];

        $fallas = new Fallas();
        $fallas->setEstudiante($estudiante);
        $fallas->setMateria($id_materia);
        $listado_fallas = $fallas->dateFailsAStudent();
        require_once 'views/pdf/reporteFallas.php';

    }

    # Generar el pdf con las notas definitvas de todos los estudiantes de x materia
    public function listadoNotasEstudiantesXMateria()
    {
        $nombre_materia = $_GET['materia'];
        $nombre_grado = $_GET['nombreg'];
        $grado = $_GET['degree'];
        $materia = $_GET['subject'];
        $notas = new Notas();
        $notas->setId($grado);
        $notas->setMateria($materia);
        $listado_notas = $notas->listadoNotasDefinitvasXMateria();
        require_once 'views/pdf/notasXMateria.php';
    }

    # Generar pdf con la informacion de los estudiantes y sus padres de familia
    public function infoEstudiantes()
    {
        $estudiante = $_GET['student'];
        $grado = $_GET['degree'];
        $padres = $_GET['fathers'];

        $datos = new Estudiante();
        $datos->setId($estudiante);
        $datos->setGradoE($grado);
        $datos->setPadres($padres);
        $dato = $datos->datosEstudiante();

        require_once 'views/pdf/infoEstudiantes.php';
    }

    # Genera informe con los datos de un docente
    public function infoDocente(){
        $id_docente = $_GET['id'];
        $datos = new Docente();
        $datos->setId($id_docente);
        $docente = $datos->obtenerPerfil();
        require_once 'views/pdf/infoDocentes.php';
    }

    # Generar listado en pdf con datos de todos los docente
    public function listadoDocente()
    {
        $docentes = new Docente();
        $listado_docentes  = $docentes->allDocentes();
        require_once 'views/pdf/listadoDocentes.php';
    }

}
