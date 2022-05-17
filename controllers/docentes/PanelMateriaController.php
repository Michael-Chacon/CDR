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
        if (!isset($_GET['degree']) || !isset($_GET['ide']) || !isset($_GET['name']) || !isset($_GET['nombreg'])) {
            Utils::Error404();
        } elseif (empty(Utils::decryption($_GET['degree'])) || empty(Utils::decryption($_GET['ide'])) || empty($_GET['name']) || empty($_GET['nombreg'])) {
            Utils::Error404();
        } else {
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
            // $listado_estudiantes = $estudiante->EstudiantesGrado();
            // $colocar_falla = $estudiante->EstudiantesGrado();
            # Informacion importante de la materia
            $info = new Materias();
            $info->setMateria($materia);
            $info->setIdGradoM($grado);
            $listado_estudiantes = $info->estudianteMateriaGrado();
            $colocar_falla = $info->estudianteMateriaGrado();
            $datos_materia = $info->subjectInformation();
            $estado = $info->seeAsignacionMateria($materia);
            require_once 'views/docente/panelMateria.php';
        }
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
                        Utils::alertas($respuestaS, 'Documento registrado con éxito.', 'Error al intentar registrar el documento, inténtelo de nuevo.');
                    } else {
                        $documentoRepetido = false;
                        Utils::alertas($documentoRepetido, '', 'El nombre del documento ya está registrado en esta materia, cámbialo.');
                    }
                } else {
                    $tituloRepetido = false;
                    Utils::alertas($tituloRepetido, '', 'El título de este documento ya está registrado en esta materia, cámbialo.');
                }
            } else {
                Utils::alertas($validar_total_archivos, '', 'No es posible subir este archivo, recuerda que el número de archivos por materia no debe ser mayor de 10, elimina un archivo para poder subir este.');
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
        Utils::alertas($respuestaD, 'Documento eliminado con éxito.', 'Error al intentar borrar el documento, inténtelo de nuevo.');
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
                Utils::alertas($respuestaA, 'Actividad registrada con éxito.', 'Error al intentar registrar la actividad, inténtelo de nuevo.');
            } else {
                $estadoA = false;
                Utils::alertas($estadoA, '', 'El título de esta actividad ya está registrado en esta materia, cámbialo.');
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
        Utils::alertas($resultado, 'Activada eliminada con éxito.', 'Algo salió mal al intentar eliminar la actividad, inténtelo de nuevo.');
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
        # Generar alerta
        Utils::alertas($resultado, 'Asistencia registrada con éxito.', 'Algo salió mal al intentar registrar la asistencia, inténtalo de nuevo.');
        header("Location: " . base_url . 'panelMateria/homeMateria&degree=' . Utils::encryption($_POST['degree']) . '&ide=' . Utils::encryption($_POST['id_materia']) . '&name=' . $_POST['name'] . '&nombreg=' . $_POST['nombreg']);
    }

} # fin de la clase
