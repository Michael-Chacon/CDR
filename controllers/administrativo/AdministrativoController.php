<?php
require_once 'models/administrativo.php';
require_once 'models/credencial.php';
require_once 'controllers/LoginController.php';

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

            $nombre = trim($_POST['nombres']);
            $apellidos = trim($_POST['apellidos']);
            $nacimiento = trim($_POST['nacimiento']);
            $edad = trim($_POST['edad']);
            $genero = trim($_POST['sexo']);
            $cargo = trim($_POST['cargo']);
            $tipo = trim($_POST['tipo']);
            $numeroId = trim($_POST['numero']);
            $lugar = trim($_POST['expedicion']);
            $fecha_expedicion = trim($_POST['fecha']);
            $direccion = trim($_POST['direccion']);
            $telefono = trim($_POST['telefono']);
            $correo = trim($_POST['correo']);
            $religion = trim($_POST['religion']);
            $incapacidad = trim($_POST['incapacidad']);
            $grupo = trim($_POST['grupo']);
            $rh = trim($_POST['rh']);
            $fecha_posesion = trim($_POST['fecha_posesion']);
            $numero_acta_posesion = trim($_POST['acta_posesion']);
            $numero_resolucion_posesion = trim($_POST['resolucion_posesion']);
            $pregrado = trim($_POST['pregrado']);
            $nombre_pregrado = trim($_POST['nombre_pregrado']);
            $posgrado = trim($_POST['posgrado']);
            $nombre_posgrado = trim($_POST['nombre_posgrado']);
            $usuario = trim($_POST['numero']);
            $pass = trim($_POST['numero']);

            $administrativo = new Administrativo();
            $administrativo->setNombre($nombre);
            $administrativo->setApellidos($apellidos);
            $administrativo->setNacimiento($nacimiento);
            $administrativo->setEdad($edad);
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

            if (isset($_POST['actualizarAdministrativo']) && !empty($_POST['actualizarAdministrativo'])) {
                $administrativo->setId($_POST['actualizarAdministrativo']);
                $actualizarInfo = $administrativo->guardarAdministrativo('actualizar');
                Utils::validarReturn($actualizarInfo, 'actualizarA');
            } else {
                $validacion = Utils::validarExistenciaUsuario($_POST['numero'], 'administrativo', 'numero_a');
                if ($validacion == 0) {
                    #metodo de guardar
                    $resultado_admin = $administrativo->guardarAdministrativo('guardar');
                    # validar el return para generar notificacion
                    Utils::validarReturn($resultado_admin, 'administrativo');
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
                    Utils::validarReturn($credenciales, 'credencial_a');
                } else {
                    $documento = false;
                    Utils::validarReturn($documento, 'validacion_a');
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
        $id = $_POST['id'];
        $contra = $_POST['new_pass'];
        $usuario = 'id_administrativo';

        $actualizacion = new Credencial();
        $actualizacion->setId($id);
        $actualizacion->setRol($usuario);
        $actualizacion->setPassword($contra);
        $resultado = $actualizacion->updatePassword();
        if ($resultado && $_SESSION['user']->id == $id) {
            $exit = new LoginController();
            $exit->logout();
            Utils::validarReturn($resultado, 'cambiarPassA');
        } else {
            Utils::validarReturn($resultado, 'cambiarPassA');
            header("Location: " . base_url . 'Administrativo/vista_administrativo');
        }
    }
} # fin de la clase
