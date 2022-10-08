<?php
require_once 'models/materias.php';
require_once 'models/horario.php';
require_once 'models/padres.php';
require_once 'models/estudiante.php';
require_once 'models/observador.php';
require_once 'models/tablero.php';
require_once 'models/credencial.php';
require_once 'models/mail.php';
class StudentController
{
    public function homeEstudiante()
    {
        $listado_materias = new Materias();
        $listado_materias->setId($_SESSION['student']['id_estudiante']);
        $materias = $listado_materias->subjectStudent();

        # Tablero de actividades
        $tablero = new Tablero();
        $actividades_estudiantes = $tablero->getAllActivitiesStudendsLimit();
        $total_actividades = $tablero->totalActividades("tableroactividadesestudiantes");
        # Horario de clase
        $dia = new Horario();
        $grado = $_SESSION['student']['id_gradoE'];
        $lista_lunes = $dia->listarLunes($grado);
        $lista_martes = $dia->listarMartes($grado);
        $lista_miercoles = $dia->listarMiercoles($grado);
        $lista_jueves = $dia->listarJueves($grado);
        $lista_viernes = $dia->listarViernes($grado);
        require_once 'views/estudiante/home.php';
    }

    # Datos del  estudiante
    public function datosEstudiante()
    {
        $papas = new Padres();
        $papas->setId($_SESSION['student']['id_familia_e']);
        $padres = $papas->padres();
        require_once 'views/estudiante/misDatos.php';
    }

    # Actualizar los datos de los estudiantes
    public function actualizarDatosEstudiante()
    {
        $telefono = trim(Utils::clearStrings($_POST['telefono_e']));
        $direccion = trim(Utils::clearStrings($_POST['direccion_e']));
        $correo = trim(Utils::clearStrings($_POST['correo_e']));
        $actualizar = new Estudiante();
        $actualizar->setTelefono($telefono);
        $actualizar->setDireccion($direccion);
        $actualizar->setCorreo($correo);
        $resultado = $actualizar->actualizarEstudiante();
        # Generar alerta
        Utils::alertas($resultado, 'Los datos del estudiante han sido actualizados con éxito, Cuando inicie sesión de nuevo podrá ver los cambios.', 'Algo salió mal al intentar actualizar los datos del estudiante');
        header('Location: ' . base_url . 'Student/datosEstudiante');
    }

    # Actualizar los datos de los padres
    public function actualizarDatosPadres()
    {
        $telefono_m = trim(Utils::clearStrings($_POST['telefono_m']));
        $telefono_p = trim(Utils::clearStrings($_POST['telefono_p']));
        $direccion = trim(Utils::clearStrings($_POST['direccion_pm']));
        $correo = trim(Utils::clearStrings($_POST['correo_pm']));
        $actualizar = new Padres();
        $actualizar->setTelefonoM($telefono_m);
        $actualizar->setTelefonoP($telefono_p);
        $actualizar->setDireccion($direccion);
        $actualizar->setCorreo($correo);
        $resultado = $actualizar->actualizarPadres();
        Utils::alertas($resultado, 'Los datos de los padres han sido actualizados con éxito, Cuando inicie sesión de nuevo podrá ver los cambios.', 'Algo salió mal al intentar actualizar los datos de los padres');
        header('Location: ' . base_url . 'Student/datosEstudiante');
    }

    # Observaciones del estudiante
    public function observador()
    {
        $observador = new Observador();
        $observador->setEstudiante($_SESSION['student']['id_estudiante']);
        $observaciones = $observador->getObservation();
        require_once 'views/estudiante/observador.php';
    }

    # Actulizar contraseña
    public function actualizarContraseña(){

        $nombre = $_POST['nombres'];
        $email = $_POST['correo'];
        if (!empty($email)) {
            $correo = new Correos();
            $correo->setCorreoDestinatario($email);
            $correo->setNombreDestinatario($nombre);
            $correo->setAsuntoCorreo('Su contraseña ha sido actualizada.');
            $correo->correoIndividual();
        }
        $id_estudiante = $_SESSION['student']['id_estudiante'];
        $contraseña = $_POST['contraseña'];
        $credenciales = new Credencial();
        $credenciales->setRol('id_estudiante');
        $credenciales->setId($id_estudiante);
        $credenciales->setPassword($contraseña);
        $resultado = $credenciales->updatePassword();
        Utils::alertas($resultado, 'La contraseña fue actualizada con éxito', 'Algo salió mal, intentalo de nuevo');
        header('Location: '. base_url . 'Student/datosEstudiante');

    }

} # fin de la clase
