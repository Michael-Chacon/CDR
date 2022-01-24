<?php
require_once 'models/grados.php';
require_once 'models/documentos.php';

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
        # listado de los estudiante que estan matriuculados en la materia
        $estudiante = new Grados();
        $estudiante->setGrado($grado);
        $listado_estudiantes = $estudiante->EstudiantesGrado();
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

            $validar_nombre = Utils::validarExisenciaDocumentos('documentosclase', 'titulo', $titulo, $materia);
            if ($validar_nombre) {
                $validar_documento = Utils::validarExisenciaDocumentos('documentosclase', 'documento', $name, $materia);
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

    # eliminar documentod de la clase
    public function eliminarDocumentoDClase()
    {
        $id = $_GET['id_docu'];
        $borrador = new Documentos();
        $borrador->setId($id);
        $respuestaD = $borrador->deleteClassDocument();
        Utils::validarReturn($respuestaD, 'eliminarDocumentoDClase');
        header("Location: " . base_url . 'panelMateria/homeMateria&degree=' . $_GET['degree'] . '&ide=' . $_GET['ide'] . '&name=' . $_GET['name'] . '&nombreg=' . $_GET['nombreg']);
    }

} # fin de la clase
