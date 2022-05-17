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
        if (!isset($_GET['id_grado'])) {
            Utils::Error404();
        } elseif (empty(Utils::decryption($_GET['id_grado']))) {
            Utils::Error404();
        } else {
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

    /*
    Metodo para resolver el siguiente problema: en un caso especifico la materia aparece como si estuviese asignada a un docente, esto no es verdad, la razón es porque en el pasado la materia le sí fue asignada a un docente, pero el docente fue eliminado de la plataforma y la materia quedo con el estado "asignada", este metodo le da la opcion al usuario administrativo para acutaliza el  estado para que la materia esté disponible para ser asignada a otro docente
     */
    public function actualizarAsignacionDeMateria()
    {
        $materia = $_POST['id_materia'];
        $asignacion = new Materias();
        $asignacion->setId($materia);
        $respuesta = $asignacion->updateAsignaiconMateria();

        Utils::alertas($respuesta, 'Muy bien, la materia ya está disponible para ser asignada a un docente.', 'Algo salió mal al intentar cambiar es estado de asignación de la materia, inténtelo de nuevo.');

        header("Location: " . base_url . 'panelMateria/homeMateria&degree=' . Utils::encryption($_POST['degree']) . '&ide=' . Utils::encryption($_POST['id_materia']) . '&name=' . $_POST['name'] . '&nombreg=' . $_POST['nombreg']);
    }

    # Eliminar materia
    public function eliminarMateria()
    {
        $materia = $_GET['materia'];
        echo $_GET['degree'];
        $borrador = new Materias();
        $borrador->setMateria($materia);
        $resultado = $borrador->deleteSubject();
        Utils::alertas($resultado, 'La materia se eliminó con éxito', 'Algo salió mal al intentar eliminar la materia');
        header('Location:' . base_url . 'Materias/vista&id_grado=' . Utils::encryption($_GET['degree']));
    }

} # fin de la clase
