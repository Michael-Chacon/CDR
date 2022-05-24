<?php
require_once 'models/documentos.php';
class DocumentoController
{
    public function vista_documentos()
    {
        $listado = new Documentos();
        $documentos_teacher = $listado->listarTeacher();
        $documentos_students = $listado->listarStudents();
        require_once 'views/administrativo/documentos/home.php';
    }

    # guardar el documento
    public function guardar()
    {
        $destinatario = $_POST['destinatario'];
        $descripcion = trim($_POST['descripcion']);
        $file = $_FILES['documento'];
        $name = $file['name'];
        if (!is_dir('documentos/')) {
            mkdir('documentos/', 0777, true);
        }
        move_uploaded_file($file['tmp_name'], 'documentos/' . $name);
        $cargar = new Documentos();
        $cargar->setNombre($name);
        $cargar->setDescripcion($descripcion);
        switch ($destinatario) {
            case 'estudiante':
                $resultado = $cargar->saveStudents();
                break;
            case 'docente':
                $resultado = $cargar->saveTeachers();
                break;
            case 'estudianteDocente':
                $resultado = $cargar->saveStudents();
                $resultado = $cargar->saveTeachers();
                break;
            default:
                // code...
                break;
        }
        Utils::alertas($resultado, 'Documento guardado con éxito.', 'Algo salió mal al subir el documento, inténtelo de nuevo.');
        header('Location: ' . base_url . 'Documento/vista_documentos');
    }

    public function eliminar()
    {
        $id = $_GET['id'];
        $nombre = $_GET['nombre'];
        unlink('documentos/' . $nombre);
        $documento = new Documentos();
        $documento->setId($id);
        $respuesta = $documento->delete();
        Utils::alertas($respuesta, 'Documento eliminado con éxito.', 'Algo salió mal al eliminar el documento, inténtelo de nuevo.');
        header('Location: ' . base_url . 'Documento/vista_documentos');
    }

} # fin de la clase
