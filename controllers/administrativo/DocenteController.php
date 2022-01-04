<?php
require_once 'models/administrativo/docente.php';
require_once 'models/administrativo/credencial.php';
require_once 'models/administrativo/asignaciones.php';
require_once 'models/administrativo/horario.php';

class DocenteController
{
    public function vista_docente()
    {
        $listar_docentes = new Docente();
        $lista = $listar_docentes->allDocentes();
        require_once 'views/administrativo/docente/docente.php';
    }

    #metodo para registrar los docentes
    public function registrarDocente()
    {
        if (isset($_POST) && !empty($_POST)) {

            $nombre = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $nacimiento = $_POST['nacimiento'];
            $edad = $_POST['edad'];
            $genero = $_POST['sexo'];
            $tipo = $_POST['tipo'];
            $numeroId = $_POST['numero'];
            $lugar = $_POST['expedicion'];
            $fecha_expedicion = $_POST['fecha'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $religion = $_POST['religion'];
            $incapacidad = $_POST['incapacidad'];
            $grupo = $_POST['grupo'];
            $rh = $_POST['rh'];
            $fecha_posesion = $_POST['fecha_posesion'];
            $numero_acta_posesion = $_POST['acta_posesion'];
            $numero_resolucion_posesion = $_POST['resolucion_posesion'];
            $pregrado = $_POST['pregrado'];
            $nombre_pregrado = $_POST['nombre_pregrado'];
            $posgrado = $_POST['posgrado'];
            $nombre_posgrado = $_POST['nombre_posgrado'];
            $usuario = $_POST['numero'];
            $pass = $_POST['numero'];

            $docente = new Docente();
            $docente->setNombre($nombre);
            $docente->setApellidos($apellidos);
            $docente->setNacimiento($nacimiento);
            $docente->setEdad($edad);
            $docente->setGenero($genero);
            $docente->setTipoDocu($tipo);
            $docente->setNumeroDocu($numeroId);
            $docente->setLugarExpedi($lugar);
            $docente->setFechaExpedi($fecha_expedicion);
            $docente->setDireccion($direccion);
            $docente->setTelefono($telefono);
            $docente->setCorreo($correo);
            $docente->setReligion($religion);
            $docente->setIncapacidad($incapacidad);
            $docente->setGrupo($grupo);
            $docente->setRh($rh);
            $docente->setFechaPosesion($fecha_posesion);
            $docente->setNumeroActaPosesion($numero_acta_posesion);
            $docente->setNumeroResolucionPosesion($numero_resolucion_posesion);
            $docente->setPregrado($pregrado);
            $docente->setNombrePregrado($nombre_pregrado);
            $docente->setPosgrado($posgrado);
            $docente->setNombrePosgrado($nombre_posgrado);

            # validar si se va a guardar o a actualizar
            if (isset($_POST['actualizarDocente'])) {
                # ACTUALIZAR
                $docente->setId($_POST['actualizarDocente']);
                $resultado_actualizacion = $docente->guardarDocentes('actualizar');
                Utils::validarReturn($resultado_actualizacion, 'actualizarD');
                header("Location:" . base_url . 'Docente/perfilDocente&id=' . $_POST['actualizarDocente']);
                exit;
            } else {
                # GUARDAR
                $validacion = Utils::validarExistenciaUsuario($_POST['numero'], 'docente', 'numero_d');
                if ($validacion == 0) {
                    #metodo de guardar
                    $resultado = $docente->guardarDocentes('guardar');
                    # validar el return para generar notificacion
                    Utils::validarReturn($resultado, 'docente');
                    # obtener el id del docente
                    $id_docente = $docente->idDocente();

                    # crea las credenciales para el docente
                    $credencial = new Credencial();
                    $credencial->setUsuario($usuario);
                    $credencial->setPassword($pass);
                    $credencial->setRol('docente');
                    $credencial->setEstado('activo');
                    $credenciales = $credencial->credenciales_usuario($id_docente, 'docente');
                    # validar la resupuesta de los intert en la base de datos
                    Utils::validarReturn($credenciales, 'credencial_d');
                } else {
                    $documento = false;
                    Utils::validarReturn($documento, 'validacion_d');
                }
            }

        }
        header('Location: ' . base_url . 'Docente/vista_docente');
    }

    # perfil del docente
    public function perfilDocente()
    {
        $id = $_GET['id'];
        $perfil = new Docente();
        $perfil->setId($id);
        $docente = $perfil->obtenerPerfil();
        $info_docente = $perfil->obtenerPerfil();

        # obtener los grados donde el docente dicta materias
        $grados = new Asignaciones();
        $grados->setIdDocente($id);
        $lista_grados = $grados->docenteGrados();

        # listar el horario del docente del dia martes
        $dia = new Horario();
        $dia->setId($id);
        $dia_lunes = $dia->horarioLunes();
        $dia_martes = $dia->horarioMartes();
        $dia_miercoles = $dia->horarioMiercoles();
        $dia_jueves = $dia->horarioJueves();
        $dia_viernes = $dia->horarioViernes();

        require_once 'views/administrativo/docente/perfil_docente.php';
    }

    public function cambiarPass()
    {
        $id = $_POST['id_docente'];
        $contra = $_POST['new_pass'];
        $actualizar = new Credencial();
        $actualizar->setId($id);
        $actualizar->setPassword($contra);
        $actualizar->setRol('id_docente');
        $result = $actualizar->updatePassword();
        Utils::validarReturn($result, 'actualizarPD');
        header("Location:" . base_url . 'Docente/perfilDocente&id=' . $id);
    }

} # fin de la clase
