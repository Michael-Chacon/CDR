<?php
require_once 'models/personal.php';

class PersonalController
{
    public function vista_personal()
    {
        $personal = new Personal();
        $listado = $personal->listarPersonal();
        require_once 'views/administrativo/personal/personal.php';
    }

    public function registrarPersonal()
    {

        if (isset($_POST) && !empty($_POST)) {

            $nombre = trim($_POST['nombres']);
            $apellidos = trim($_POST['apellidos']);
            $nacimiento = trim($_POST['nacimiento']);
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

            $personal = new Personal();
            $personal->setNombre($nombre);
            $personal->setApellidos($apellidos);
            $personal->setNacimiento($nacimiento);
            $personal->setGenero($genero);
            $personal->setCargo($cargo);
            $personal->setTipoDocu($tipo);
            $personal->setNumeroDocu($numeroId);
            $personal->setLugarExpedi($lugar);
            $personal->setFechaExpedi($fecha_expedicion);
            $personal->setDireccion($direccion);
            $personal->setTelefono($telefono);
            $personal->setCorreo($correo);
            $personal->setReligion($religion);
            $personal->setIncapacidad($incapacidad);
            $personal->setGrupo($grupo);
            $personal->setRh($rh);
            $personal->setFechaPosesion($fecha_posesion);
            $personal->setNumeroActaPosesion($numero_acta_posesion);
            $personal->setNumeroResolucionPosesion($numero_resolucion_posesion);
            $personal->setPregrado($pregrado);
            $personal->setNombrePregrado($nombre_pregrado);
            $personal->setPosgrado($posgrado);
            $personal->setNombrePosgrado($nombre_posgrado);

            #Actualizar los datos del personal
            if (isset($_POST['actualizarPersonal'])) {
                $edad = trim($_POST['edad']);
                $personal->setEdad($edad);
                $id = $_POST['actualizarPersonal'];
                $personal->setId($id);
                $actualizar_personal = $personal->guardarPersonal('actualizar');
                Utils::validarReturn($actualizar_personal, 'actualizarPer');
            } else {
                $validacion = Utils::validarExistenciaUsuario($_POST['numero'], 'personal', 'numero_per');
                if ($validacion == 0) {
                    #metodo de guardar
                    $resultado_personal = $personal->guardarPersonal('guardar');
                    # validar el return para generar notificacion
                    Utils::validarReturn($resultado_personal, 'personal');
                } else {
                    $documento = false;
                    Utils::validarReturn($documento, 'validacion');
                }
            }

        }
        header('Location: ' . base_url . 'Personal/vista_personal');
    }

    public function actualizar()
    {
        $id = $_GET['id'];
        $persona = new Personal();
        $persona->setId($id);
        $info = $persona->datosPersona();
        require_once 'views/administrativo/personal/actualizar.php';
    }

    # Obtener los datos del personal  para generar el pdf
    public function generaPDF()
    {
        $persona = $_GET['person'];
        $datos = new Personal();
        $datos->setId($persona);
        $personal = $datos->datosPersonal();
        require_once 'views/pdf/infoPersonal.php';
    }

} # fin de la clase
