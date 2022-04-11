<?php
require_once 'models/materias.php';
require_once 'models/grados.php';
require_once 'models/horario.php';
require_once 'models/docente.php';
require_once 'models/area.php';

class MateriasController
{
    public function vista()
    {
        $grado = Utils::decryption($_GET['id_grado']);
        # obtener todas las materias de un grado
        $materias = new Materias();
        $materias->setIdGradoM($grado);
        $datos = $materias->allMaterias();
        $matter = $materias->allMaterias();
        $listado_materias = $materias->getAllBaseSubjectes();
        # obtener los estudiantes y el grado actual
        $estudiantes = new Grados();
        $estudiantes->setGrado($grado);
        $estudi = $estudiantes->EstudiantesGrado();
        $actual = $estudiantes->gradoActual($grado);
        # listar lis horarios de todos los dias de la semana
        $dia = new Horario();
        $lista_lunes = $dia->listarLunes($grado);
        $lista_martes = $dia->listarMartes($grado);
        $lista_miercoles = $dia->listarMiercoles($grado);
        $lista_jueves = $dia->listarJueves($grado);
        $lista_viernes = $dia->listarViernes($grado);

        # listado de docentes Y seleccionar el docente que esta asignado como director en este grado
        $listado_docentes = new Docente();
        $listado_docentes->setGrupo($grado);
        $dir = $listado_docentes->seleccionarDirector();
        $docentes = $listado_docentes->docenteDirector('no');
        # seleccionar todas las aulas
        $aulas = new Grados();
        $listado_aulas = $aulas->selectAllClassroomNotAssigned();
        $aula_grado = $aulas->selectClassroomOfDeegre($grado);

        require_once 'views/administrativo/materia/materias.php';
    }

    public function guardarMateria()
    {
        if (isset($_POST)) {
            $materia_area_icono = $_POST['materia_area_icono'];
            $partes = explode('/', $materia_area_icono);
            $materia = $partes[0];
            $area = $partes[1];
            $icono = $partes[2];
            $indicador = trim($_POST['indicadores']);
            $grado = Utils::decryption($_POST['id_grado']);

            $guardar = new Materias();
            $guardar->setIdGradoM($grado);
            $guardar->setMateria($materia);
            $guardar->setIndicadores($indicador);
            $guardar->setIcono($icono);
            $guardar->setArea($area);
            $resultado = $guardar->RegistrarMateria();

            if ($resultado) {
                $_SESSION['guardar_materia'] = 'Materia registrada con exito!!!';
            } else {
                $_SESSION['guardar_materia'] = 'Error al registrar la materia';
            }
            header('Location:' . base_url . 'Materias/vista&id_grado=' . Utils::encryption($grado));
        }
    }

} # fin de la clase
