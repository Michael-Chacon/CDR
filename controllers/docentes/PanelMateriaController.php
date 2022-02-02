<?php
require_once 'models/fallas.php';
require_once 'models/periodos.php';
require_once 'models/grados.php';
require_once 'models/documentos.php';
require_once 'models/actividades.php';

class panelMateriaController
{
    public function homeMateria()
    {
        $grado = $_GET['degree'];
        $materia = $_GET['ide'];
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
        require_once 'views/docente/panelMateria.php';
    }

    # guardar los documentos de talleres en una determinada materia
    public function GuardarDocumentosDClase()
    {
        if (isset($_POST) && !empty($_POST)) {
            $materia = $_POST['id_materia'];
            $titulo = trim($_POST['titulo']);
            $fecha = trim($_POST['fecha_entrega']);
            $formato = trim($_POST['formato']);
            $descripcion = trim($_POST['descripcion']);

            $file = $_FILES['documento'];
            $name = $file['name'];
            if (!is_dir('documentos/materias/')) {
                mkdir('documentos/materias/', 0777, true);
            }
            move_uploaded_file($file['tmp_name'], 'documentos/materias/' . $name);

            $validar_nombre = Utils::validarExisenciaDocumentos('documentosclase', 'titulo', $titulo, 'id_materia_d', $materia);
            if ($validar_nombre) {
                $validar_documento = Utils::validarExisenciaDocumentos('documentosclase', 'documento', $name, 'id_materia_d', $materia);
                if ($validar_documento) {
                    $registrar = new Documentos();
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
        }
        header("Location: " . base_url . 'panelMateria/homeMateria&degree=' . $_POST['degree'] . '&ide=' . $_POST['id_materia'] . '&name=' . $_POST['name'] . '&nombreg=' . $_POST['nombreg']);
    }

    # eliminar documentod de la materia
    public function eliminarDocumentoDClase()
    {
        $id = $_GET['id_docu'];
        $borrador = new Documentos();
        $borrador->setId($id);
        $respuestaD = $borrador->deleteClassDocument();
        Utils::validarReturn($respuestaD, 'eliminarDocumentoDClase');
        header("Location: " . base_url . 'panelMateria/homeMateria&degree=' . $_GET['degree'] . '&ide=' . $_GET['ide'] . '&name=' . $_GET['name'] . '&nombreg=' . $_GET['nombreg']);
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
        header("Location: " . base_url . 'panelMateria/homeMateria&degree=' . $_POST['degree'] . '&ide=' . $_POST['id_materia'] . '&name=' . $_POST['name'] . '&nombreg=' . $_POST['nombreg']);
    }

    public function registrarFallas()
    {
        $id_alumnos = $_POST['ids'];
        $hoy = date("Y-m-d");
        $materia = $_POST['id_materia'];

        $veliadar_periodo = new Periodos();
        $uno = $veliadar_periodo->periodoUno();
        $periodo1 = Utils::formatearFecha($uno->fecha_inicio, $uno->fecha_fin);

        $dos = $veliadar_periodo->periodoDos();
        $periodo2 = Utils::formatearFecha($dos->fecha_inicio, $dos->fecha_fin);

        $tres = $veliadar_periodo->periodoTres();
        $periodo3 = Utils::formatearFecha($tres->fecha_inicio, $tres->fecha_fin);

        $cuatro = $veliadar_periodo->periodoCuatro();
        $periodo4 = Utils::formatearFecha($cuatro->fecha_inicio, $cuatro->fecha_fin);

        if ($hoy >= $periodo1[0] && $hoy <= $periodo1[1]) {
            $periodo = $uno->id;
        } elseif ($hoy >= $periodo2[0] && $hoy <= $periodo2[1]) {
            $periodo = $dos->id;
        } elseif ($hoy >= $periodo3[0] && $hoy <= $periodo3[1]) {
            $periodo = $tres->id;
        } elseif ($hoy >= $periodo4[0] && $hoy <= $periodo4[1]) {
            $periodo = $cuatro->id;
        }

        $asistencia = new Fallas();
        $asistencia->setEstudiante($id_alumnos);
        $asistencia->setFecha($hoy);
        $asistencia->setMateria($materia);
        $asistencia->setPeriodo($periodo);
        $resultado = $asistencia->registerFails();
        Utils::validarReturn($resultado, 'registrarFallas');
        header("Location: " . base_url . 'panelMateria/homeMateria&degree=' . $_POST['degree'] . '&ide=' . $_POST['id_materia'] . '&name=' . $_POST['name'] . '&nombreg=' . $_POST['nombreg']);
    }

} # fin de la clase
