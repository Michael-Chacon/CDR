<?php
require_once 'models/asignaciones.php';
require_once 'models/horario.php';
require_once 'models/documentos.php';
require_once 'models/docente.php';
require_once 'models/tablero.php';
require_once 'models/credencial.php';
require_once 'models/mail.php';

class TeacherController
{
    public function homeDocente()
    {
        # listar los grados a cargo del docente
        $id_docente = $_SESSION['teacher']->id;
        $grados = new Asignaciones();
        $grados->setIdDocente($id_docente);
        $mis_grados = $grados->docenteGrados();
        # Tablero de tareas
        $tablero = new Tablero();
        $actividades_docentes = $tablero->getAllActivitiesTeachersLimit();
        $total_actividades = $tablero->totalActividades("tableroactividadesdocentes");
        # horario
        $dia = new Horario();
        $dia->setId($id_docente);
        $dia_lunes = $dia->horarioLunes();
        $dia_martes = $dia->horarioMartes();
        $dia_miercoles = $dia->horarioMiercoles();
        $dia_jueves = $dia->horarioJueves();
        $dia_viernes = $dia->horarioViernes();

        #grado donde es el director
        $dir = new Docente();
        $dir->setId($id_docente);
        $mi_grado = $dir->seleccionarGradoDirector();
        if ($mi_grado->rowCount() == 0) {
            $nombre_grado = 'Sin asignar';
            $clase = '';
            $id_grado = '';
        } else {
            $grado = $mi_grado->fetchObject();
            $nombre_grado = $grado->nombre_g . '°';
            $clase = 'stretched-link';
            $id_grado = $grado->id;
        }
        require_once 'views/docente/home.php';
    }

    public function documentos()
    {
        $listado = new Documentos();
        if (isset($_SESSION['student'])) {
            $documentos = $listado->listarStudents();
        } elseif (isset($_SESSION['teacher'])) {
            $documentos = $listado->listarTeacher();
        }
        require_once 'views/docente/documentos.php';
    }

    # Llamar a los datos del docente
    public function misDatos()
    {
        $datos = new Docente();
        $datos->setId($_SESSION['teacher']->id);
        $docente = $datos->obtenerPerfil();
        require_once 'views/docente/misDatos.php';
    }

    # Metodo para enviar al model docente los datos los datos que le estan permitido actualizar.
    public function actualizarDatosDeDocente()
    {
        $telefono = trim(Utils::clearStrings($_POST['telefono_d']));
        $direccion = trim(Utils::clearStrings($_POST['direccion_d']));
        $correo = trim(Utils::clearStrings($_POST['correo_d']));
        $actualizar = new Docente();
        $actualizar->setTelefono($telefono);
        $actualizar->setDireccion($direccion);
        $actualizar->setCorreo($correo);
        $resultado = $actualizar->actualizarDocente();
        # generar alerta
        Utils::alertas($resultado, 'Datos actualizados con éxito', 'Algo salió mal al intentar acualizar los datos.');
        header('Location: ' . base_url . 'Teacher/misDatos');
    }
    # Actulizar contraseña
    public function actualizarContraseña(){
        $nombre = $_POST['nombres'];
        $email = $_POST['correo'];
        if (!empty($email)) {
            # Notificar por correo
            $correo = new Correos();
            $correo->setCorreoDestinatario($email);
            $correo->setNombreDestinatario($nombre);
            $correo->setAsuntoCorreo('Su contraseña ha sido actualizada.');
            $correo->correoIndividual();
        }

        $id_docente = $_SESSION['teacher']->id;
        $contraseña = $_POST['contraseña'];
        $credenciales = new Credencial();
        $credenciales->setRol('id_docente');
        $credenciales->setId($id_docente);
        $credenciales->setPassword($contraseña);
        $resultado = $credenciales->updatePassword();
        Utils::alertas($resultado, 'La contraseña fue actualizada con éxito', 'Algo salió mal, intentalo de nuevo');
        header('Location: '. base_url . 'Teacher/misDatos');

    }
}
