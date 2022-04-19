<?php
require_once 'models/login.php';
require_once 'models/datos.php';
class LoginController
{
    public function login()
    {
        require_once 'views/login/login.php';
    }

    public function homeAdministrativo()
    {
        Utils::is_user();
        require_once 'views/administrativo/home.php';
    }

    public function homeEstudiante()
    {
        require_once 'views/estudiante/home.php';
    }

    #validar usuario
    public function validar()
    {
        if (isset($_POST['usuario']) && isset($_POST['password'])) {
            $user = $_POST['usuario'];
            $pass = $_POST['password'];
            #validar las credenciales del usuario
            $datos = new Login();
            $datos->setUsuario($user);
            $datos->setPassword($pass);
            $respuesta = $datos->validar_user();

            if ($respuesta == 'No existe el usuario' || $respuesta == 'Contraseña incorrecta' || $respuesta == 'Usuario inactivo') {
                $_SESSION['error_login'] = $respuesta;
                header('Location: ' . base_url);
            }
            $rol = $respuesta->rol;
            $informacion = new Filtro();
            switch ($respuesta->rol) {
                #usuario Administrador
                case 'administrativo':
                    $id_user = $respuesta->id_administrativo;
                    $informacion->setIdUsuario($id_user);
                    $info = $informacion->obtenerDatos($rol);
                    $_SESSION['user'] = $info;
                    header('Location: ' . base_url . 'Login/homeAdministrativo');
                    break;
                #usuario Docente
                case 'docente':
                    $id_user = $respuesta->id_docente;
                    $informacion->setIdUsuario($id_user);
                    $info = $informacion->obtenerDatos($rol);
                    $_SESSION['teacher'] = $info;
                    header('Location: ' . base_url . 'Teacher/homeDocente');
                    break;
                #usuario Estudiante
                case 'estudiante':
                    $id_user = $respuesta->id_estudiante;
                    $informacion->setIdUsuario($id_user);
                    $info = $informacion->obtenerDatos($rol);
                    $estudiante = array_merge((array) $respuesta, (array) $info);
                    $_SESSION['student'] = $estudiante;
                    header('Location: ' . base_url . 'Student/homeEstudiante');
                    break;
                default:
                    break;
            }
        }
    }

    #cerrar sesion
    public function logout()
    {
        if (isset($_SESSION['user']) || isset($_SESSION['teacher']) || isset($_SESSION['student'])) {
            unset($_SESSION['user']);
            unset($_SESSION['teacher']);
            unset($_SESSION['student']);
        }
        header('Location:' . base_url);
    }

} #fin de la clase
