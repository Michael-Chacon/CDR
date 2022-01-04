<?php
require_once 'models/administrativo/grados.php';
require_once 'models/administrativo/estudiante.php';
require_once 'models/administrativo/padres.php';
require_once 'models/administrativo/credencial.php';
require_once 'models/administrativo/horario.php';
require_once 'models/administrativo/materias.php';

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
            $nombre_e = $_POST['nombres'];
            $apellidos_e = $_POST['apellidos'];
            $fecha_nacimiento_e = $_POST['nacimienito'];
            $edad_e = $_POST['edad'];
            $genero = $_POST['genero'];
            $tipo = $_POST['tipo_e'];
            $numero = $_POST['numero'];
            $lugar_expedi = $_POST['expedicion'];
            $fecha_expedi = $_POST['fecha'];
            $direccion_e = $_POST['direccion'];
            $telefono_e = $_POST['telefono'];
            $correo_e = $_POST['correo'];
            $religion_e = $_POST['religion'];
            $incapacidad_e = $_POST['incapacidad'];
            $grupo = $_POST['grupo'];
            $rh = $_POST['rh'];
            $trasporte = $_POST['trasporte'];
            $pae = $_POST['pae'];
            $usuario = $_POST['numero'];
            $pass = $_POST['numero'];

            # datos de la madre
            $nombre_m = $_POST['nombres_m'];
            $apellidos_m = $_POST['apellidos_m'];
            $nacimiento_m = $_POST['nacimiento_m'];
            $edad_m = $_POST['edad_m'];
            $tipo_m = $_POST['tipo_m'];
            $numero_m = $_POST['numero_m'];
            $lugar_expedi_m = $_POST['lugar_expedicion_m'];
            $fecha_expedi_m = $_POST['fecha_expedicion_m'];
            $telefono_m = $_POST['telefono_m'];
            $ocupacion_m = $_POST['ocupacion_m'];

            # datos del padre
            $nombre_pa = $_POST['nombres_pa'];
            $apellidos_pa = $_POST['apellidos_pa'];
            $nacimiento_pa = $_POST['nacimiento_pa'];
            $edad_pa = $_POST['edad_pa'];
            $tipo_pa = $_POST['tipo_pa'];
            $numero_pa = $_POST['numero_pa'];
            $lugar_expedi_pa = $_POST['lugar_expedicion_pa'];
            $fecha_expedi_pa = $_POST['fecha_expedicion_pa'];
            $telefono_pa = $_POST['telefono_pa'];
            $ocupacion_pa = $_POST['ocupacion_pa'];

            $direccion_mp = $_POST['direccion_mp'];
            $correo_mp = $_POST['correo_mp'];

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
                echo "si hay imagen";
            } else {
                echo "no hay imagen";
                $estudiantes->setImg('');
            }

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
                    # GUARDAR
                    # metodo para guardar la info de los padres
                    $padres->guardarPadres('guardar');
                    $id_padres = $padres->idPadres();
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

} # Fin de la clase
