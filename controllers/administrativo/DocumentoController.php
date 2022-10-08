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
        $descripcion = trim(Utils::clearStrings($_POST['descripcion']));
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
        $usuario = $_GET['user'];
        switch ($usuario) {
            case 'estudiante':
                $tabla = 'documentosestudiantes';
                $verificacion = 'documentosdocentes';
                break;
            case 'docente':
                $tabla = 'documentosdocentes';
                $verificacion = 'documentosestudiantes';
                break;
            default:
                Utils::Error404();
                break;
        }
        $id = $_GET['id'];
        $nombre = $_GET['nombre'];
        $documento = new Documentos();
        # Verficar si es un documento compartido entre docentes y estudiantes
        $total = $documento->EliminarDocumentoCompartido($verificacion, $nombre);
        if ($total->rowCount() == 0) {
            # si el documento no existe en la tabla contraria se eliminara del servidor
            unlink('documentos/' . $nombre);
        }
        $documento->setId($id);
        $respuesta = $documento->delete($tabla);
        Utils::alertas($respuesta, 'Documento eliminado con éxito.', 'Algo salió mal al eliminar el documento, inténtelo de nuevo.');
        header('Location: ' . base_url . 'Documento/vista_documentos');
    }

} # fin de la clase
