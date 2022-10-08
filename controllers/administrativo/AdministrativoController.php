<?php
require_once 'models/administrativo.php';
require_once 'models/credencial.php';
require_once 'controllers/LoginController.php';
require_once 'models/auditoria.php';
require_once 'models/mail.php';

class AdministrativoController
{
    public function vista_administrativo()
    {
        $listado_administrativos = new Administrativo();
        $listado = $listado_administrativos->listarAdministrativos();
        require_once 'views/administrativo/administrativo/administrativo.php';
    }

    public function registrarAdministrativo()
    {

        if (isset($_POST) && !empty($_POST)) {

            $nombre = trim(Utils::clearStrings($_POST['nombres']));
            $apellidos = trim(Utils::clearStrings($_POST['apellidos']));
            $nacimiento = trim($_POST['nacimiento']);
            $genero = trim($_POST['sexo']);
            $cargo = trim($_POST['cargo']);
            $tipo = trim($_POST['tipo']);
            $numeroId = trim($_POST['numero']);
            $lugar = trim(Utils::clearStrings($_POST['expedicion']));
            $fecha_expedicion = trim($_POST['fecha']);
            $direccion = trim(Utils::clearStrings($_POST['direccion']));
            $telefono = trim($_POST['telefono']);
            $correo = trim($_POST['correo']);
            $religion = trim(Utils::clearStrings($_POST['religion']));
            $incapacidad = trim(Utils::clearStrings($_POST['incapacidad']));
            $grupo = trim(Utils::clearStrings($_POST['grupo']));
            $rh = trim(Utils::clearStrings($_POST['rh']));
            $fecha_posesion = trim($_POST['fecha_posesion']);
            $numero_acta_posesion = trim($_POST['acta_posesion']);
            $numero_resolucion_posesion = trim($_POST['resolucion_posesion']);
            $pregrado = trim($_POST['pregrado']);
            $nombre_pregrado = trim(Utils::clearStrings($_POST['nombre_pregrado']));
            $posgrado = trim($_POST['posgrado']);
            $nombre_posgrado = trim(Utils::clearStrings($_POST['nombre_posgrado']));
            $usuario = trim($_POST['numero']);
            $pass = trim($_POST['numero']);

            $administrativo = new Administrativo();
            $administrativo->setNombre($nombre);
            $administrativo->setApellidos($apellidos);
            $administrativo->setNacimiento($nacimiento);
            $administrativo->setGenero($genero);
            $administrativo->setCargo($cargo);
            $administrativo->setTipoDocu($tipo);
            $administrativo->setNumeroDocu($numeroId);
            $administrativo->setLugarExpedi($lugar);
            $administrativo->setFechaExpedi($fecha_expedicion);
            $administrativo->setDireccion($direccion);
            $administrativo->setTelefono($telefono);
            $administrativo->setCorreo($correo);
            $administrativo->setReligion($religion);
            $administrativo->setIncapacidad($incapacidad);
            $administrativo->setGrupo($grupo);
            $administrativo->setRh($rh);
            $administrativo->setFechaPosesion($fecha_posesion);
            $administrativo->setNumeroActaPosesion($numero_acta_posesion);
            $administrativo->setNumeroResolucionPosesion($numero_resolucion_posesion);
            $administrativo->setPregrado($pregrado);
            $administrativo->setNombrePregrado($nombre_pregrado);
            $administrativo->setPosgrado($posgrado);
            $administrativo->setNombrePosgrado($nombre_posgrado);

            # Metodo para actualizar los datos del adminstrativo
            if (isset($_POST['actualizarAdministrativo']) && !empty($_POST['actualizarAdministrativo'])) {
                $edad = trim($_POST['edad']);
                $administrativo->setEdad($edad);
                $administrativo->setId($_POST['actualizarAdministrativo']);
                $actualizarInfo = $administrativo->guardarAdministrativo('actualizar');
                Utils::alertas($actualizarInfo, 'Información del usuario actualizada con éxito.', 'Algo salió mal al actualizar la información, inténtelo de nuevo.');
            } else {
                # Metodo para registrar un administrativo nuevo
                $validacion = Utils::validarExistenciaUsuario($_POST['numero'], 'administrativo', 'numero_a');
                if ($validacion == 0) {
                    # Metodo de guardar
                    $resultado_admin = $administrativo->guardarAdministrativo('guardar');
                    # validar el return para generar notificacion
                    Utils::alertas($resultado_admin, 'El usuario administrativo se ha registrado con éxito.', 'Algo salió mal al registrar el usuario administrativo, inténtelo de nuevo.');
                    # obtener el id del administrativo
                    $id_administrativo = $administrativo->idAdministrativo();

                    # crea las credenciales para el administrativo
                    $credencial = new Credencial();
                    $credencial->setUsuario($usuario);
                    $credencial->setPassword($pass);
                    $credencial->setRol('administrativo');
                    $credencial->setEstado('activo');
                    $credenciales = $credencial->credenciales_usuario($id_administrativo, 'administrativo');
                    # validar la resupuesta de los intert en la base de datos
                    Utils::alertas($credenciales, 'Se asignaron credenciales al usuario administrativo con éxito.', 'Algo salió mal al asignar credencale al usuario administartivo, inténtelo de nuevo.');
                } else {
                    $documento = false;
                    Utils::alertas($documento, '', 'Se encontró un usuario administrativo en la base de datos con el mismo número de documento, posiblemente este administrativo ya existe en la plataforma.');
                }
            }

        }
        header('Location: ' . base_url . 'Administrativo/vista_administrativo');
    }

    public function actualizar()
    {
        $id_administrativo = $_GET['id'];
        $informacion = new Administrativo();
        $informacion->setId($id_administrativo);
        $info = $informacion->unAdministrativo();
        require_once 'views/administrativo/administrativo/actualizar.php';
    }

    public function newPassword()
    {
        require_once 'views/administrativo/administrativo/actualizar_pass.php';
    }

    public function cambiarPass()
    {
        $nombre = $_POST['nombres'];
        $email = $_POST['correo'];
        if (!empty($email)) {
            $correo = new Correos();
            $correo->setCorreoDestinatario($email);
            $correo->setNombreDestinatario($nombre);
            $correo->setAsuntoCorreo('Su contraseña ha sido actualizada.');
            $correo->correoIndividual();
        }
        $id = $_POST['id'];
        $contra = $_POST['new_pass'];
        $usuario = 'id_administrativo';
        # auditar cambio de contraseñas
        $auditar = new Auditoria();
        $auditar->auditarCredenciales($nombre, 'Administrativo');
        $actualizacion = new Credencial();
        $actualizacion->setId($id);
        $actualizacion->setRol($usuario);
        $actualizacion->setPassword($contra);
        $resultado = $actualizacion->updatePassword();
        if ($resultado && $_SESSION['user']->id == $id) {
            $exit = new LoginController();
            $exit->logout();
            Utils::alertas($resultado, 'Contraseña actualizada con éxito.', 'Algo salió mal al cambiar la contraseña, inténtelo de nuevo.');
        } else {
            Utils::alertas($resultado, 'Contraseña actualizada con éxito.', 'Algo salió mal al cambiar la contraseña, inténtelo de nuevo.');
            header("Location: " . base_url . 'Administrativo/vista_administrativo');
        }
    }
} # fin de la clase
