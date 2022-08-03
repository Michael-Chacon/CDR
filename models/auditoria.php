<?php
# Clase para registrar las actualizaciones y las eliminaciones de datos
class Auditoria
{
    public $administrativo;
    public $id_admin;
    public $id_docente;
    public $fecha;
    public $db;

    public function __construct()
    {
        $this->db = Database::conectar();
        if (isset($_SESSION['user'])) {
            $this->administrativo = $_SESSION['user']->nombre_a . ' ' . $_SESSION['user']->apellidos_a;
            $this->id_admin = $_SESSION['user']->id_admin;
        } else {
            $this->id_docente = $_SESSION['teacher']->id;
        }
        $this->fecha = date("Y-m-d h:i:s:a");
    }

    # Metodo para auditar la actualizacion de los periodos
    public function auditarPeriodo($periodo, $inicio, $fin, $estado)
    {
        $auditar = $this->db->prepare("INSERT INTO update_periodo VALUES (null, :admin, :periodo, :inicio, :fin, :estado, :fecha)");
        $auditar->bindParam(":admin", $this->administrativo, PDO::PARAM_STR);
        $auditar->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $auditar->bindParam(":inicio", $inicio, PDO::PARAM_STR);
        $auditar->bindParam(":fin", $fin, PDO::PARAM_STR);
        $auditar->bindParam(":estado", $estado, PDO::PARAM_STR);
        $auditar->bindParam(":fecha", $this->fecha, PDO::PARAM_STR);
        $auditar->execute();
    }

    # Metodo para auditar la actualizacion de los datos de los estudiantes y los docente
    public function auditarActualizacionUsuario($tabla, $nombre, $apellidos, $identificacion)
    {
        $estudiante = $this->db->prepare("INSERT INTO $tabla VALUES (null, :admin, :nombre, :apellidos, :id, :fecha)");
        $estudiante->bindParam(":admin", $this->administrativo, PDO::PARAM_STR);
        $estudiante->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $estudiante->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
        $estudiante->bindParam(":id", $identificacion, PDO::PARAM_INT);
        $estudiante->bindParam(":fecha", $this->fecha, PDO::PARAM_STR);
        $estudiante->execute();
    }

    # Metodo para auditar la actualizacion del estado del boletin
    public function auditarEstadoBoletin($estado)
    {
        $boletin = $this->db->prepare("INSERT INTO habilitacion_boletin VALUES (null, :admin, :estado, :fecha)");
        $boletin->bindParam(":admin", $this->administrativo, PDO::PARAM_STR);
        $boletin->bindParam(":estado", $estado, PDO::PARAM_STR);
        $boletin->bindParam(":fecha", $this->fecha, PDO::PARAM_STR);
        $boletin->execute();
    }

    # Metodo para auditar la actualizacion del estado del boletin
    public function auditarCredenciales($usuario, $rol)
    {
        $credenciales = $this->db->prepare("INSERT INTO actualizar_credenciales VALUES (null, :admin, :usuario, :rol, :fecha)");
        $credenciales->bindParam(":admin", $this->administrativo, PDO::PARAM_STR);
        $credenciales->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $credenciales->bindParam(":rol", $rol, PDO::PARAM_STR);
        $credenciales->bindParam(":fecha", $this->fecha, PDO::PARAM_STR);
        $credenciales->execute();
    }

    # Metodo para auditar las subidas de los boletines
    public function auditarEliminacionGrado($grado)
    {
        $eliminarGrado = $this->db->prepare("INSERT INTO eliminar_grado VALUES (null, :admin, :grado, :fecha)");
        $eliminarGrado->bindParam(":admin", $this->id_admin, PDO::PARAM_INT);
        $eliminarGrado->bindParam(":grado", $grado, PDO::PARAM_STR);
        $eliminarGrado->bindParam(":fecha", $this->fecha, PDO::PARAM_STR);
        $eliminarGrado->execute();
    }

    # Metodo para audita la eliminacion de un estudiante o un docente
    public function auditarEliminacionUsuario($tabla, $nombre, $id)
    {
        $eliminarUsuario = $this->db->prepare("INSERT INTO $tabla VALUES (null, :admin, :nombre_e, :id, :fecha)");
        $eliminarUsuario->bindParam(":admin", $this->id_admin, PDO::PARAM_INT);
        $eliminarUsuario->bindParam(":nombre_e", $nombre, PDO::PARAM_STR);
        $eliminarUsuario->bindParam(":id", $id, PDO::PARAM_INT);
        $eliminarUsuario->bindParam(":fecha", $this->fecha, PDO::PARAM_STR);
        $eliminarUsuario->execute();
    }

    public function auditarEliminacionNota($actividad, $id_estudiante, $id_materia, $id_actividad, $periodo)
    {
        # Obtener los datos de la nota y la materia
        switch ($actividad) {
            case 'evaluacion':
                $name_id = 'id_evaluacion';
                $nota_materia = 'id_materia_e';
                $nota = 'nota_evaluacion';
                break;
            case 'trimestral':
                $name_id = 'id_trimestral';
                $nota_materia = 'id_materia_t';
                $nota = 'nota_trimestral';
                break;
            case 'tindividual':
                $name_id = 'id_Tindividual';
                $nota_materia = 'id_materia_Tindividual';
                $nota = 'nota_Tindividual';
                break;
            case 'tcolaborativo':
                $name_id = 'id_Tcolaborativo';
                $nota_materia = 'id_materia_Tcolaborativo';
                $nota = 'nota_Tcolaborativo';
                break;
            case 'apreciativa':
                $name_id = 'id_apreciativa';
                $nota_materia = 'id_materia_apreciativa';
                $nota = 'nota_apreciativa';
                break;
            case 'autoevaluacion':
                $name_id = 'id_autoevaluacion';
                $nota_materia = 'id_materia_autoevaluacion';
                $nota = 'nota_autoevaluacion';
                break;
        }

        $note = $this->db->prepare("SELECT $nota, nombre_mat FROM $actividad
                                                    INNER JOIN materia ON id = $nota_materia
                                                    WHERE $name_id = $id_actividad");
        $note->execute();
        $datos = $note->fetchObject();
        $materia = $datos->nombre_mat;
        $calificacion = $datos->$nota;

        # Consultar los datos del estudiante y del grado
        $student = $this->db->prepare("SELECT e.nombre_e, e.apellidos_e, g.nombre_g FROM estudiante e
                                                                INNER JOIN grado g ON g.id = e.id_gradoE
                                                                WHERE e.id = :id_e");
        $student->bindParam(":id_e", $id_estudiante, PDO::PARAM_INT);
        $student->execute();
        $datosEstudiante = $student->fetchObject();
        $estudiante = $datosEstudiante->apellidos_e . ' ' . $datosEstudiante->nombre_e;
        $grado = $datosEstudiante->nombre_g;

        # Registrar datos de la accion borra nota
        $eliminarNota = $this->db->prepare("INSERT INTO eliminar_nota VALUES (null, :docente, :id_materia, :id_estudiante, :periodo, :estudiante, :materia, :grado, :actividad, :nota, :fecha)");
        $eliminarNota->bindParam(":docente", $this->id_docente, PDO::PARAM_INT);
        $eliminarNota->bindParam(":id_materia", $id_materia, PDO::PARAM_INT);
        $eliminarNota->bindParam(":id_estudiante", $id_estudiante, PDO::PARAM_INT);
        $eliminarNota->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $eliminarNota->bindParam(":estudiante", $estudiante, PDO::PARAM_STR);
        $eliminarNota->bindParam("materia", $materia, PDO::PARAM_STR);
        $eliminarNota->bindParam(":grado", $grado, PDO::PARAM_STR);
        $eliminarNota->bindParam(":actividad", $actividad, PDO::PARAM_STR);
        $eliminarNota->bindParam(":nota", $calificacion, PDO::PARAM_INT);
        $eliminarNota->bindParam(":fecha", $this->fecha, PDO::PARAM_STR);
        $eliminarNota->execute();
    }

    # Metodo para obtener listado de modificaciones de los periodos academicos
    public function periodoAcademicos()
    {
        $periodo = $this->db->prepare("SELECT * FROM update_periodo ORDER BY id_up DESC");
        $periodo->execute();
        return $periodo;
    }

    # Metodo para obtener el listado de estudiantes eliminados
    public function estudiantesEliminados()
    {
        $estudiantes = $this->db->prepare("SELECT a.nombre_a, a.apellidos_a, ee.* FROM eliminar_estudiante ee
                                                                INNER JOIN administrativo a ON a.id_admin = ee.id_admin_ee
                                                                ORDER BY id_ee DESC");
        $estudiantes->execute();
        return $estudiantes;
    }

    # Metodo para obtener el listado de estudiantes eliminados
    public function docentesEliminados()
    {
        $estudiantes = $this->db->prepare("SELECT a.nombre_a, a.apellidos_a, dd.* FROM eliminar_docente dd
                                                                INNER JOIN administrativo a ON a.id_admin = dd.id_admin_dd
                                                                ORDER BY id_dd DESC");
        $estudiantes->execute();
        return $estudiantes;
    }

    # Metodo para mostrar el cambio de estado del boletin
    public function cambiosEstadoBoletin()
    {
        $boletin = $this->db->prepare("SELECT * FROM habilitacion_boletin ORDER BY id_hb DESC");
        $boletin->execute();
        return $boletin;
    }

    # Metodo para listar las notas borradas a los estudiantes en x materia
    public function notasEliminadasAEstudiante($materia, $estudiante)
    {
        $notaEliminada = $this->db->prepare("SELECT d.nombre_d, d.apellidos_d, en.* FROM eliminar_nota en
                                                                    INNER JOIN docente d ON d.id = en.id_docente_nota_dn
                                                                    WHERE id_materia_dn = :materia AND id_estudiante_dn = :estudiante");
        $notaEliminada->bindParam(":materia", $materia, PDO::PARAM_INT);
        $notaEliminada->bindParam(":estudiante", $estudiante, PDO::PARAM_INT);
        $notaEliminada->execute();
        return $notaEliminada;
    }

}
