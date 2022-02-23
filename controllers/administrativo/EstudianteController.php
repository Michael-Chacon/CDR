<?php
require_once 'models/grados.php';
require_once 'models/estudiante.php';
require_once 'models/padres.php';
require_once 'models/credencial.php';
require_once 'models/horario.php';
require_once 'models/materias.php';

class EstudianteController
{
    public function estudiantes()
    {
        $lista_grados = new Grados();
        $todos = $lista_grados->allGrados();

        #optener a todos los estudiantes
        $lista_estudiantes = new Estudiante();
        $todos_estudiantes = $lista_estudiantes->allEstudiantes();
        require_once 'views/administrativo/estudiante/estudiantes.php';
    }

    public function registrarEstudiante()
    {
        if (isset($_POST) && !empty($_POST)) {
            # datos del estudiante
            $nombre_e = trim($_POST['nombres']);
            $apellidos_e = trim($_POST['apellidos']);
            $fecha_nacimiento_e = trim($_POST['nacimienito']);
            $edad_e = trim($_POST['edad']);
            $genero = trim($_POST['genero']);
            $tipo = trim($_POST['tipo_e']);
            $numero = trim($_POST['numero']);
            $lugar_expedi = trim($_POST['expedicion']);
            $fecha_expedi = trim($_POST['fecha']);
            $direccion_e = trim($_POST['direccion']);
            $telefono_e = trim($_POST['telefono']);
            $correo_e = trim($_POST['correo']);
            $religion_e = trim($_POST['religion']);
            $incapacidad_e = trim($_POST['incapacidad']);
            $grupo = trim($_POST['grupo']);
            $rh = trim($_POST['rh']);
            $trasporte = trim($_POST['trasporte']);
            $pae = trim($_POST['pae']);
            $usuario = trim($_POST['numero']);
            $pass = trim($_POST['numero']);

            # datos de la madre
            $nombre_m = trim($_POST['nombres_m']);
            $apellidos_m = trim($_POST['apellidos_m']);
            $nacimiento_m = trim($_POST['nacimiento_m']);
            $edad_m = trim($_POST['edad_m']);
            $tipo_m = trim($_POST['tipo_m']);
            $numero_m = trim($_POST['numero_m']);
            $lugar_expedi_m = trim($_POST['lugar_expedicion_m']);
            $fecha_expedi_m = trim($_POST['fecha_expedicion_m']);
            $telefono_m = trim($_POST['telefono_m']);
            $ocupacion_m = trim($_POST['ocupacion_m']);

            # datos del padre
            $nombre_pa = trim($_POST['nombres_pa']);
            $apellidos_pa = trim($_POST['apellidos_pa']);
            $nacimiento_pa = trim($_POST['nacimiento_pa']);
            $edad_pa = trim($_POST['edad_pa']);
            $tipo_pa = trim($_POST['tipo_pa']);
            $numero_pa = trim($_POST['numero_pa']);
            $lugar_expedi_pa = trim($_POST['lugar_expedicion_pa']);
            $fecha_expedi_pa = trim($_POST['fecha_expedicion_pa']);
            $telefono_pa = trim($_POST['telefono_pa']);
            $ocupacion_pa = trim($_POST['ocupacion_pa']);

            $direccion_mp = trim($_POST['direccion_mp']);
            $correo_mp = trim($_POST['correo_mp']);
            # set padres
            $padres = new Padres();
            # madre
            $padres->setNombreM($nombre_m);
            $padres->setApellidosM($apellidos_m);
            $padres->setNacimientoM($nacimiento_m);
            $padres->setEdadM($edad_m);
            $padres->setTipoM($tipo_m);
            $padres->setNumeroM($numero_m);
            $padres->setLugarExpediM($lugar_expedi_m);
            $padres->setFechaExpediM($fecha_expedi_m);
            $padres->setTelefonoM($telefono_m);
            $padres->setOcupacionM($ocupacion_m);
            # padre
            $padres->setNombreP($nombre_pa);
            $padres->setApellidosP($apellidos_pa);
            $padres->setNacimientoP($nacimiento_pa);
            $padres->setEdadP($edad_pa);
            $padres->setTipoP($tipo_pa);
            $padres->setNumeroP($numero_pa);
            $padres->setLugarExpediP($lugar_expedi_pa);
            $padres->setFechaExpediP($fecha_expedi_pa);
            $padres->setTelefonoP($telefono_pa);
            $padres->setOcupacionP($ocupacion_pa);
            # otros
            $padres->setDireccion($direccion_mp);
            $padres->setCorreo($correo_mp);

            # set estudiantes
            $estudiantes = new Estudiante();
            $estudiantes->setNombre($nombre_e);
            $estudiantes->setApellidos($apellidos_e);
            $estudiantes->setNacimiento($fecha_nacimiento_e);
            $estudiantes->setEdad($edad_e);
            $estudiantes->setGenero($genero);
            $estudiantes->setTipoDocu($tipo);
            $estudiantes->setNumeroDocu($numero);
            $estudiantes->setLugarExpedi($lugar_expedi);
            $estudiantes->setFechaExpedi($fecha_expedi);
            $estudiantes->setDireccion($direccion_e);
            $estudiantes->setTelefono($telefono_e);
            $estudiantes->setCorreo($correo_e);
            $estudiantes->setReligion($religion_e);
            $estudiantes->setIncapacidad($incapacidad_e);
            $estudiantes->setGrupo($grupo);
            $estudiantes->setRh($rh);
            $estudiantes->setTrasporte($trasporte);
            $estudiantes->setPae($pae);

            # validar si se va a actualizar  o  ha guardar
            if (isset($_POST['padres']) && isset($_POST['estudiante_id'])) {
                # ACTUALIZAR
                $papas = $_POST['padres'];
                $estudiante_id = $_POST['estudiante_id'];
                $estudiantes->setId($estudiante_id);
                $actualizarEstudiante = $estudiantes->registroEstudiantes('', 'actualizar');
                $padres->setId($papas);
                $actualizarPadres = $padres->guardarPadres('actualizar');
                # validarReturn valida si la accion sobre la base de datos devuelve true o false, para generar la respectiva alerta.
                Utils::validarReturn($actualizarEstudiante, 'actualizarE');
                header("Location: " . base_url . 'Estudiante/perfilEstudiante&x=' . $_POST['x'] . '&y=' . $_POST['y'] . '&z=' . $_POST['z']);
            } else {
                # validar si ya existe el estudiante antes de proceder a guardar
                $validacion = Utils::validarExistenciaUsuario($_POST['numero'], 'estudiante', 'numero_e');
                if ($validacion == 0) {
                    if (isset($_FILES['foto'])) {
                        $file = $_FILES['foto'];
                        $filename = $file['name'];
                        $mimetype = $file['type'];
                        if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {

                            if (!is_dir('photos/estudiantes/')) {
                                mkdir('photos/estudiantes/', 0777, true);
                            }
                            move_uploaded_file($file['tmp_name'], 'photos/estudiantes/' . $filename);
                            $estudiantes->setImg($filename);
                        }
                    } else {
                        $estudiantes->setImg('');
                    }
                    # GUARDAR
                    if (isset($_POST['existePadres']) && $_POST['existePadres'] == 'no') {
                        # metodo para guardar la info de los padres
                        $padres->guardarPadres('guardar');
                        $id_padres = $padres->idPadres();
                    } elseif (isset($_POST['existePadres']) && $_POST['existePadres'] == 'si') {
                        $celuda_padres = $_POST['siExistePadre'];
                        $padres->setNumeroM($celuda_padres);
                        $id_padres = $padres->padresExistentes();
                    }
                    # metodo para guardar la info  del estudiante
                    $grado = $_POST['grado'];
                    $estudiantes->setGradoE($grado);
                    $resultadoE = $estudiantes->registroEstudiantes($id_padres, 'guardar');
                    $id_estudiante = $estudiantes->idEstudiante();
                    Utils::validarReturn($resultadoE, 'estudiante');

                    if ($resultadoE) {
                        # inscribir a los alumnos en las materias correspondientes
                        $estudiantes->setGradoE($grado);
                        $materias = $estudiantes->materiasEstudiante($id_estudiante);
                        Utils::validarReturn($materias, 'materias');
                    }
                    # crea las credenciales para el estudiante
                    $credencial = new Credencial();
                    $credencial->setUsuario($usuario);
                    $credencial->setPassword($pass);
                    $credencial->setRol('estudiante');
                    $credencial->setEstado('activo');
                    $credenciales = $credencial->credenciales_usuario($id_estudiante, 'estudiante');
                    Utils::validarReturn($credenciales, 'credencial');
                } else {
                    $documento = false;
                    Utils::validarReturn($documento, 'validacion_e');
                }
                header("Location: " . base_url . 'Estudiante/estudiantes');
            }

        }
    }

    # llama a la vista del perfil del estudiante
    public function perfilEstudiante()
    {
        if (!empty($_GET['x'])) {
            $estudiante_id = $_GET['x'];
            $padres = $_GET['y'];
            $grado = $_GET['z'];

            # obtener todas las materias de un grado
            $materias = new Materias();
            $materias->setIdGradoM($grado);
            $datos = $materias->allMaterias();

            # obtener el horario por dias
            $dia = new Horario();
            $lista_lunes = $dia->listarLunes($grado);
            $lista_martes = $dia->listarMartes($grado);
            $lista_miercoles = $dia->listarMiercoles($grado);
            $lista_jueves = $dia->listarJueves($grado);
            $lista_viernes = $dia->listarViernes($grado);

            # obtener los datos de un estudiante en espacifico
            $datos_estudiante = new Estudiante();
            $datos_estudiante->setGradoE($grado);
            $datos_estudiante->setId($estudiante_id);
            $datos_estudiante->setPadres($padres);
            $estudiante = $datos_estudiante->datosEstudiante();
            $estudiantePadres = $datos_estudiante->datosEstudiante();
            require_once 'views/administrativo/estudiante/perfil_estudiante.php';
        }
    }

    # cambiar la contraseña
    public function cambiarPassword()
    {
        $contra = $_POST['new_pass'];
        # usuario es el campo en la tabla credenciales que contiene el id del usuario,  el vinculo con la tabla estudiante en este caso.
        $usuario = 'id_estudiante';
        $id = $_POST['id'];

        $actualizacion = new Credencial();
        $actualizacion->setId($id);
        $actualizacion->setRol($usuario);
        $actualizacion->setPassword($contra);
        $estado = $actualizacion->updatePassword();
        Utils::validarReturn($estado, 'cambiarPassword');
        header("Location: " . base_url . 'Estudiante/estudiantes');
    }

    public function fotoPerfil()
    {
        $file = $_FILES['foto_perfil'];
        $filename = $file['name'];
        $mimetype = $file['type'];
        if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {

            if (!is_dir('photos/estudiantes/')) {
                mkdir('photos/estudiantes/', 0777, true);
            }
            move_uploaded_file($file['tmp_name'], 'photos/estudiantes/' . $filename);
        }
        $id = $_POST['x'];
        $foto = $filename;
        $new_photo = new Estudiante();
        $new_photo->setId($id);
        $new_photo->setImg($foto);
        $resultadoF = $new_photo->imgPerfil();
        Utils::validarReturn($resultadoF, 'cambiarPhoto');
        header("Location: " . base_url . 'Estudiante/perfilEstudiante&x=' . $_POST['x'] . '&y=' . $_POST['y'] . '&z=' . $_POST['z']);
    }

} # Fin de la clase
