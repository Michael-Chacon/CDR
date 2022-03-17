<?php
require_once 'models/materias.php';
require_once 'models/grados.php';
require_once 'models/horario.php';
require_once 'models/docente.php';

class MateriasController
{
    public function vista()
    {
        $grado = $_GET['id_grado'];
        # obtener todas las materias de un grado
        $materias = new Materias();
        $materias->setIdGradoM($grado);
        $datos = $materias->allMaterias();
        $matter = $materias->allMaterias();
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

        #listado de docentes Y seleccionar el docente que esta asignado como director en este grado
        $listado_docentes = new Docente();
        $listado_docentes->setGrupo($grado);
        $dir = $listado_docentes->seleccionarDirector();
        $docentes = $listado_docentes->allDocentes();
        # seleccionar todas las aulas
        $aulas = new Grados();
        $listado_aulas = $aulas->selectAllClassroomNotAssigned();
        $aula_grado = $aulas->selectClassroomOfDeegre($grado);

        require_once 'views/administrativo/materia/materias.php';
    }

    public function guardarMateria()
    {
        if (isset($_POST)) {
            $materia_inoco = $_POST['materia_icono'];
            $partes = explode('/', $materia_inoco);
            $materia = $partes[0];
            $icono = $partes[1];
            $indicador = trim($_POST['indicadores']);
            $grado = $_POST['id_grado'];

            $guardar = new Materias();
            $guardar->setIdGradoM($grado);
            $guardar->setMateria($materia);
            $guardar->setIndicadores($indicador);
            $guardar->setIcono($icono);
            $resultado = $guardar->RegistrarMateria();

            if ($resultado) {
                $_SESSION['guardar_materia'] = 'Materia registrada con exito!!!';
            } else {
                $_SESSION['guardar_materia'] = 'Error al registrar la materia';
            }
            header('Location:' . base_url . 'Materias/vista&id_grado=' . $grado);
        }
    }

} # fin de la clase
