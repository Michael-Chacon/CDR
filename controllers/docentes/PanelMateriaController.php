<?php
require_once 'models/fallas.php';
require_once 'models/periodos.php';
require_once 'models/grados.php';
require_once 'models/documentos.php';
require_once 'models/actividades.php';
require_once 'models/materias.php';

class panelMateriaController
{
    public function homeMateria()
    {
        $grado = Utils::decryption($_GET['degree']);
        $materia = Utils::decryption($_GET['ide']);
        $nombre_ma = $_GET['name'];
        $nombre_gra = $_GET['nombreg'];
        # obtener los documentos de la clase, si los hay
        $documentos = new Documentos();
        $documentos->setId($materia);
        $listado_documentos = $documentos->listClassDocuments();
        # obtener el listado de actividades de la clase
        $actividades = new Actividades();
        $actividades->setMateria($materia);
        $listado_actividades = $actividades->listClassActivitys();
        # listado de los estudiante que estan matriuculados en la materia
        $estudiante = new Grados();
        $estudiante->setGrado($grado);
        $listado_estudiantes = $estudiante->EstudiantesGrado();
        $colocar_falla = $estudiante->EstudiantesGrado();
        # Informacion importante de la materia
        $info = new Materias();
        $info->setMateria($materia);
        $datos_materia = $info->subjectInformation();
        $estado = $info->seeAsignacionMateria($materia);
        require_once 'views/docente/panelMateria.php';
    }

    # guardar los documentos de talleres en una determinada materia
    public function GuardarDocumentosDClase()
    {
        if (isset($_POST) && !empty($_POST)) {
            $materia = $_POST['id_materia'];
            $titulo = strip_tags(trim($_POST['titulo']));
            $fecha = trim($_POST['fecha_entrega']);
            $formato = trim($_POST['formato']);
            $descripcion = trim($_POST['descripcion']);

            $file = $_FILES['documento'];
            $nombre = $file['name'];
            $name = date('Ymdhis') . $nombre;
            if (!is_dir('documentos/materias/')) {
                mkdir('documentos/materias/', 0777, true);
            }
            move_uploaded_file($file['tmp_name'], 'documentos/materias/' . $name);
            $registrar = new Documentos();
            $registrar->setId($materia);
            $validar_total_archivos = $registrar->validarNumeroDArchivos();
            if ($validar_total_archivos) {
                $validar_nombre = Utils::validarExisenciaDocumentos('documentosclase', 'titulo', $titulo, 'id_materia_d', $materia);
                if ($validar_nombre) {
                    $validar_documento = Utils::validarExisenciaDocumentos('documentosclase', 'documento', $name, 'id_materia_d', $materia);
                    if ($validar_documento) {
                        $registrar->setId($materia);
                        $registrar->setTitulo($titulo);
                        $registrar->setFecha($fecha);
                        $registrar->setFormato($formato);
                        $registrar->setNombre($name);
                        $registrar->setDescripcion($descripcion);
                        $respuestaS = $registrar->saveClassDocument();
                        Utils::validarReturn($respuestaS, 'GuardarDocumentosDClase');
                    } else {
                        $documentoRepetido = false;
                        Utils::validarReturn($documentoRepetido, 'documentoRepetido');
                    }
                } else {
                    $tituloRepetido = false;
                    Utils::validarReturn($tituloRepetido, 'tituloRepetido');
                }
            } else {
                Utils::validarReturn($validar_total_archivos, 'validarNumeroDArchivos');
            }
            // here
        }
        header("Location: " . base_url . 'panelMateria/homeMateria&degree=' . Utils::encryption($_POST['degree']) . '&ide=' . Utils::encryption($_POST['id_materia']) . '&name=' . $_POST['name'] . '&nombreg=' . $_POST['nombreg']);
    }

    # eliminar documentod de la materia
    public function eliminarDocumentoDClase()
    {
        $id = $_GET['id_docu'];
        $nombre = $_GET['nameDocu'];
        echo unlink('documentos/materias/' . $nombre);
        $borrador = new Documentos();
        $borrador->setId($id);
        $respuestaD = $borrador->deleteClassDocument();
        Utils::validarReturn($respuestaD, 'eliminarDocumentoDClase');
        header("Location: " . base_url . 'panelMateria/homeMateria&degree=' . Utils::encryption($_GET['degree']) . '&ide=' . Utils::encryption($_GET['ide']) . '&name=' . $_GET['name'] . '&nombreg=' . $_GET['nombreg']);
    }

    # guardar actividades de  x materia

    public function GuardarActividadesDClase()
    {
        if (isset($_POST) && !empty($_POST)) {
            $materia = $_POST['id_materia'];
            $titulo = $_POST['tituloA'];
            $fecha = $_POST['fechaA'];
            $descripcion = $_POST['descripcionA'];

            $validar_titulo = Utils::validarExisenciaDocumentos('actividadesmateria', 'titulo_actividad', $titulo, 'id_materia_a', $materia);
            if ($validar_titulo) {
                $agenda = new Actividades();
                $agenda->setMateria($materia);
                $agenda->setTitulo($titulo);
                $agenda->setFecha($fecha);
                $agenda->setDescripcion($descripcion);
                $respuestaA = $agenda->saveClassActivity();
                Utils::validarReturn($respuestaA, 'GuardarActividadesDClase');
            } else {
                $estadoA = false;
                Utils::validarReturn($estadoA, 'estadoA');
            }
        }
        header("Location: " . base_url . 'panelMateria/homeMateria&degree=' . Utils::encryption($_POST['degree']) . '&ide=' . Utils::encryption($_POST['id_materia']) . '&name=' . $_POST['name'] . '&nombreg=' . $_POST['nombreg']);
    }
    public function eliminarActividad()
    {
        $id = $_GET['id'];
        $borrador = new Actividades();
        $borrador->setId($id);
        $resultado = $borrador->deleteActivity();
        Utils::validarReturn($resultado, 'eliminarActividad');
        header("Location: " . base_url . 'panelMateria/homeMateria&degree=' . Utils::encryption($_GET['degree']) . '&ide=' . Utils::encryption($_GET['ide']) . '&name=' . $_GET['name'] . '&nombreg=' . $_GET['nombreg']);
    }

    # registrar la inasistencia
    public function registrarFallas()
    {
        $id_alumnos = $_POST['ids'];
        $hoy = date("Y-m-d");
        $materia = $_POST['id_materia'];
        $periodo_actual = Utils::validarPeriodoAcademico($hoy);

        $asistencia = new Fallas();
        $asistencia->setEstudiante($id_alumnos);
        $asistencia->setFecha($hoy);
        $asistencia->setMateria($materia);
        $asistencia->setPeriodo($periodo_actual);
        $resultado = $asistencia->registerFails();

        Utils::validarReturn($resultado, 'registrarFallas');
        header("Location: " . base_url . 'panelMateria/homeMateria&degree=' . Utils::encryption($_POST['degree']) . '&ide=' . Utils::encryption($_POST['id_materia']) . '&name=' . $_POST['name'] . '&nombreg=' . $_POST['nombreg']);
    }

} # fin de la clase
