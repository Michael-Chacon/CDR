<?php
require_once 'models/docente.php';
require_once 'models/credencial.php';
require_once 'models/asignaciones.php';
require_once 'models/horario.php';
require_once 'models/auditoria.php';
require_once 'models/mail.php';

class DocenteController
{
    public function vista_docente()
    {
        $listar_docentes = new Docente();
        $lista = $listar_docentes->allDocentes();
        require_once 'views/administrativo/docente/docente.php';
    }
    # listar los docentes eliminiados
    public function auditarEliminacionDocentes()
    {
        $auditar = new Auditoria();
        $listado = $auditar->docentesEliminados();
        require_once 'views/administrativo/docente/docentesEliminados.php';
    }
    #metodo para registrar los docentes
    public function registrarDocente()
    {
        if (isset($_POST) && !empty($_POST)) {

            $nombre = trim(Utils::clearStrings($_POST['nombres']));
            $apellidos = trim(Utils::clearStrings($_POST['apellidos']));
            $nacimiento = trim($_POST['nacimiento']);
            $genero = trim($_POST['sexo']);
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

            $docente = new Docente();
            $docente->setNombre($nombre);
            $docente->setApellidos($apellidos);
            $docente->setNacimiento($nacimiento);
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
                # auditar la actualizacion de los datos del docente
                $auditar = new Auditoria();
                $auditar->auditarActualizacionUsuario('actualizar_docente', $nombre, $apellidos, $numeroId);
                $edad = trim($_POST['edad']);
                $docente->setEdad($edad);
                $docente->setId($_POST['actualizarDocente']);
                $resultado_actualizacion = $docente->guardarDocentes('actualizar');
                Utils::alertas($resultado_actualizacion, 'La información del docente fue actualizada con éxito.', 'Algo salió mal al actualizar la información, inténtelo de nuevo.');
                header("Location:" . base_url . 'Docente/perfilDocente&id=' . $_POST['actualizarDocente']);
            } else {
                # GUARDAR
                $validacion = Utils::validarExistenciaUsuario($_POST['numero'], 'docente', 'numero_d');
                if ($validacion == 0) {
                    $docente->setImg('');
                    #metodo de guardar
                    $resultado = $docente->guardarDocentes('guardar');
                    # validar el return para generar notificacion
                    Utils::alertas($resultado, 'El docente se ha registrado con éxito.', 'Algo salió mal al registrar el docente, inténtelo de nuevo.');
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
                    Utils::alertas($credenciales, 'Se asignaron credenciales al docente con éxito.', 'Algo salió mal al asignar credencale al docente, inténtelo de nuevo.');
                } else {
                    $documento = false;
                    Utils::alertas($documento, '', 'Se encontró un docente en la base de datos con el mismo número de documento, posiblemente este docente ya existe en la plataforma.');
                }
                header('Location: ' . base_url . 'Docente/vista_docente');
            }

        }
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
        $nombre = $_POST['nombres'];
        $email = $_POST['correo'];
        # Notificación por correo electronico
        if (!empty($email)) {
            $correo = new Correos();
            $correo->setCorreoDestinatario($email);
            $correo->setNombreDestinatario($nombre);
            $correo->setAsuntoCorreo('Su contraseña ha sido actualizada.');
            $correo->correoIndividual();
        }

        $id = $_POST['id_docente'];
        $contra = $_POST['new_pass'];
        # auditar cambio de contraseñas
        $auditar = new Auditoria();
        $auditar->auditarCredenciales($nombre, 'Docente');
        $actualizar = new Credencial();
        $actualizar->setId($id);
        $actualizar->setPassword($contra);
        $actualizar->setRol('id_docente');
        $result = $actualizar->updatePassword();
        Utils::alertas($result, 'La ontraseña del docente fue actualizada con éxito.', 'Algo salió mal al actualizar la contraseña, inténtelo de nuevo.');
        header("Location:" . base_url . 'Docente/perfilDocente&id=' . $id);
    }

    public function actualizarFotoPerfil()
    {
        $file = $_FILES['foto_perfil'];
        $filename = $file['name'];
        $tmp = $file['tmp_name'];
        # Redimencionar y validara que la imagen no pese mas de 2 MB
        $intenvencion = Utils::intevenirImagen('photos/docentes/', $filename, $tmp);
        if ($intenvencion) {
            $id = $_POST['docente'];
            $foto_actual = $_POST['foto_actual'];
            $new_photo = new Docente();
            $new_photo->setId($id);
            $new_photo->setImg($filename);
            $resultadoF = $new_photo->uptdateImgPerfil();
            if ($resultadoF) {
                unlink('photos/docentes/' . $foto_actual);
            }
            Utils::alertas($resultadoF, 'Foto de perfil actualizada con éxito', 'algo salió mal, intentelo de nuevo');
        } else {
            Utils::alertas($intenvencion, '', 'La imagen es muy pesada, tiene peque pesar menos de 2 MB');
        }
        header("Location: " . base_url . 'Docente/perfilDocente&id=' . $_POST['docente']);
    }

    # asignar director de grado
    public function directorGrado()
    {
        if (!empty($_POST['director'])) {
            $docente = $_POST['director'];
            $grado = $_POST['grado'];
            $asignador = new Docente();
            $asignador->setId($docente);
            $asignador->setGrupo($grado);
            $resultado = $asignador->asignarDirector();
            if ($resultado) {
                $asignador->uptadeDirector('si');
            }
            Utils::alertas($resultado, 'El director se ha asignado con éxito', 'Algo salió mal al intentar asignar el director, intenta de nuevo.');
        }
        header("Location:" . base_url . 'Materias/vista&id_grado=' . Utils::encryption($grado));
    }

    public function eliminarDocente()
    {
        $docente = $_GET['id'];
        $numeroDocu = $_GET['documento'];
        $nombre = $_GET['name'];
        $auditar = new Auditoria();
        $auditar->auditarEliminacionUsuario('eliminar_docente', $nombre, $numeroDocu);
        $borrador = new Docente();
        $borrador->setId($docente);
        $resultado = $borrador->deleteTeacher();
        Utils::alertas($resultado, 'Docente elimnado con éxito', 'Algo salio mal al intentar eliminar al docente, intentelo de nuvo');
        header("Location: " . base_url . 'Docente/vista_docente');
    }

} # fin de la clase
