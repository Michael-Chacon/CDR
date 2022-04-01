<?php
class Notas
{
    private $id;
    private $materia;
    private $estudiante;
    private $periodo;
    private $item;
    private $nota;
    private $porcentaje;
    private $cognitivo;
    private $evaluacion;
    private $trimestral;
    private $procedimental;
    private $Tindividual;
    private $Tcolaborativo;
    private $actitudinal;
    private $apreciativa;
    private $autoevaluacion;
    public $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMateria()
    {
        return $this->materia;
    }

    /**
     * @param mixed $materia
     *
     * @return self
     */
    public function setMateria($materia)
    {
        $this->materia = $materia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstudiante()
    {
        return $this->estudiante;
    }

    /**
     * @param mixed $estudiante
     *
     * @return self
     */
    public function setEstudiante($estudiante)
    {
        $this->estudiante = $estudiante;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param mixed $periodo
     *
     * @return self
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param mixed $item
     *
     * @return self
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param mixed $nota
     *
     * @return self
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * @param mixed $porcentaje
     *
     * @return self
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCognitivo()
    {
        return $this->cognitivo;
    }

    /**
     * @param mixed $cognitivo
     *
     * @return self
     */
    public function setCognitivo($cognitivo)
    {
        $this->cognitivo = $cognitivo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEvaluacion()
    {
        return $this->evaluacion;
    }

    /**
     * @param mixed $evaluacion
     *
     * @return self
     */
    public function setEvaluacion($evaluacion)
    {
        $this->evaluacion = $evaluacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrimestral()
    {
        return $this->trimestral;
    }

    /**
     * @param mixed $trimestral
     *
     * @return self
     */
    public function setTrimestral($trimestral)
    {
        $this->trimestral = $trimestral;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProcedimental()
    {
        return $this->procedimental;
    }

    /**
     * @param mixed $procedimental
     *
     * @return self
     */
    public function setProcedimental($procedimental)
    {
        $this->procedimental = $procedimental;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTindividual()
    {
        return $this->Tindividual;
    }

    /**
     * @param mixed $Tindividual
     *
     * @return self
     */
    public function setTindividual($Tindividual)
    {
        $this->Tindividual = $Tindividual;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTcolaborativo()
    {
        return $this->Tcolaborativo;
    }

    /**
     * @param mixed $Tcolaborativo
     *
     * @return self
     */
    public function setTcolaborativo($Tcolaborativo)
    {
        $this->Tcolaborativo = $Tcolaborativo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getActitudinal()
    {
        return $this->actitudinal;
    }

    /**
     * @param mixed $actitudinal
     *
     * @return self
     */
    public function setActitudinal($actitudinal)
    {
        $this->actitudinal = $actitudinal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApreciativa()
    {
        return $this->apreciativa;
    }

    /**
     * @param mixed $apreciativa
     *
     * @return self
     */
    public function setApreciativa($apreciativa)
    {
        $this->apreciativa = $apreciativa;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAutoevaluacion()
    {
        return $this->autoevaluacion;
    }

    /**
     * @param mixed $autoevaluacion
     *
     * @return self
     */
    public function setAutoevaluacion($autoevaluacion)
    {
        $this->autoevaluacion = $autoevaluacion;

        return $this;
    }

    # Metodo para registrar las notas de x actividad a un estudiatne.
    public function saveAllNotes($estudiante, $materia, $periodo, $criterio, $notas, $actividad)
    {
        $nota = $this->db->prepare("INSERT INTO $actividad VALUES(null, :estudiante, :materia, :periodo, :criterio, :nota)");
        $nota->bindParam(":estudiante", $estudiante, PDO::PARAM_INT);
        $nota->bindParam(":materia", $materia, PDO::PARAM_INT);
        $nota->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $nota->bindParam(":criterio", $criterio, PDO::PARAM_INT);
        $nota->bindParam(":nota", $notas, PDO::PARAM_INT);
        return $nota->execute();
    }

    /*
    Lo siguientes 6 metodos seleccionan la informacion de  todas las actividades (evaluaciones, trimestrales, trabajos individuales y colaborativos,  apreciativa, y autoevaluaciones)  por separado.
    - Los metodos estan desarrollados de esta forma porque necesito tener los datos de las actividades por separado, para consultar la informacion de los 3 periodos academicos solo variando el parametro periodo.
     */
    public function notaEvaluacionPeriodox($periodo)
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $evaluacion = $this->db->prepare("SELECT  * FROM evaluacion
            WHERE id_estudiante_e = :student AND id_materia_e = :materia AND id_periodo_e = :periodo;");
        $evaluacion->bindParam(":materia", $subject, PDO::PARAM_INT);
        $evaluacion->bindParam(":student", $student, PDO::PARAM_INT);
        $evaluacion->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $evaluacion->execute();
        $respuesta = $evaluacion->fetchObject();

        if (empty($respuesta->nota_evaluacion)) {
            return "vacio";
        } else {
            return $respuesta;
        }
    }

    public function notaTrimestralPeriodox($periodo)
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $trimestral = $this->db->prepare("SELECT  * FROM trimestral
            WHERE id_estudiante_t = :student AND id_materia_t = :materia AND id_periodo_t = :periodo;");
        $trimestral->bindParam(":materia", $subject, PDO::PARAM_INT);
        $trimestral->bindParam(":student", $student, PDO::PARAM_INT);
        $trimestral->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $trimestral->execute();
        $respuesta = $trimestral->fetchObject();

        if (empty($respuesta->nota_trimestral)) {
            return "vacio";
        } else {
            return $respuesta;
        }
    }

    public function notaTindividualPeriodox($periodo)
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $individual = $this->db->prepare("SELECT * FROM tindividual
            WHERE id_estudiante_Tindividual = :student AND id_materia_Tindividual = :materia AND id_periodo_Tindividual = :periodo;");
        $individual->bindParam(":materia", $subject, PDO::PARAM_INT);
        $individual->bindParam(":student", $student, PDO::PARAM_INT);
        $individual->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $individual->execute();
        return $individual->fetchObject();
    }

    public function notaTcolaborativoPeriodox($periodo)
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $colaborativo = $this->db->prepare("SELECT * FROM tcolaborativo t
            WHERE id_estudiante_Tcolaborativo = :student AND id_materia_Tcolaborativo = :materia AND id_periodo_Tcolaborativo = :periodo;");
        $colaborativo->bindParam(":materia", $subject, PDO::PARAM_INT);
        $colaborativo->bindParam(":student", $student, PDO::PARAM_INT);
        $colaborativo->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $colaborativo->execute();
        return $colaborativo->fetchObject();
    }

    public function notaApreciativaPeriodox($periodo)
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $apreciativa = $this->db->prepare("SELECT * FROM apreciativa
            WHERE id_estudiante_apreciativa = :student AND id_materia_apreciativa = :materia AND id_periodo_apreciativa = :periodo;");
        $apreciativa->bindParam(":materia", $subject, PDO::PARAM_INT);
        $apreciativa->bindParam(":student", $student, PDO::PARAM_INT);
        $apreciativa->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $apreciativa->execute();
        return $apreciativa->fetchObject();
    }

    public function notaAutoevaluacionPeriodox($periodo)
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $autoevaluacion = $this->db->prepare("SELECT * FROM autoevaluacion a
            WHERE id_estudiante_autoevaluacion = :student AND id_materia_autoevaluacion = :materia AND id_periodo_autoevaluacion = :periodo;");
        $autoevaluacion->bindParam(":materia", $subject, PDO::PARAM_INT);
        $autoevaluacion->bindParam(":student", $student, PDO::PARAM_INT);
        $autoevaluacion->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $autoevaluacion->execute();
        return $autoevaluacion->fetchObject();
    }

    /*
    En los siguientes 3 metodos obtengo los porcentajes de los 3 criterios academicos junto a los porcetajes de sus actividades, para hallar las notas definitvas
     */
    public function dataCognitivo()
    {
        $cognitivo = $this->db->prepare("SELECT * FROM cognitivo");
        $cognitivo->execute();
        return $cognitivo->fetchObject();
    }

    public function dataProcedimental()
    {
        $procedimental = $this->db->prepare("SELECT * FROM procedimental");
        $procedimental->execute();
        return $procedimental->fetchObject();
    }

    public function dataActitudinal()
    {
        $actitudinal = $this->db->prepare("SELECT * FROM actitudinal");
        $actitudinal->execute();
        return $actitudinal->fetchObject();
    }

    /*
    Los siguientes 3 metodos tienen la función de actualizar los porcetajes de los 3 criterios de evaluacion "cognitivo, procedimental y actitudinal".
     */
    public function updateCognitivo()
    {
        $criterio_cognitivo = $this->getCognitivo();
        $evaluaciones = $this->getEvaluacion();
        $trimestrales = $this->getTrimestral();
        $actualizacion = $this->db->prepare("UPDATE cognitivo SET porcentaje_cognitivo = :cognitivo, porcentaje_evaluacion = :evaluacion, porcentaje_trimestral = :trimestral");
        $actualizacion->bindParam(":cognitivo", $criterio_cognitivo, PDO::PARAM_INT);
        $actualizacion->bindParam(":evaluacion", $evaluaciones, PDO::PARAM_INT);
        $actualizacion->bindParam(":trimestral", $trimestrales, PDO::PARAM_INT);
        return $actualizacion->execute();
    }

    public function updateProcedimental()
    {
        $criterio_procedimental = $this->getProcedimental();
        $individual = $this->getTindividual();
        $colaborativo = $this->getTcolaborativo();
        $actualizacion = $this->db->prepare("UPDATE procedimental SET porcentaje_procedimental = :procedimental, porcentaje_Tindividual = :individual, porcentaje_Tcolaborativo = :colaborativo");
        $actualizacion->bindParam(":procedimental", $criterio_procedimental, PDO::PARAM_INT);
        $actualizacion->bindParam(":individual", $individual, PDO::PARAM_INT);
        $actualizacion->bindParam(":colaborativo", $colaborativo, PDO::PARAM_INT);
        return $actualizacion->execute();
    }

    public function updateActitudinal()
    {
        $criterio_atitudinal = $this->getActitudinal();
        $apreciativas = $this->getApreciativa();
        $autoevaluaciones = $this->getAutoevaluacion();
        $actualizacion = $this->db->prepare("UPDATE actitudinal SET porcentaje_actitudinal = :actitudinal, porcentaje_apreciativa = :apreciativas, porcentaje_autoevaluacion = :autoevaluacion");
        $actualizacion->bindParam(":actitudinal", $criterio_atitudinal, PDO::PARAM_INT);
        $actualizacion->bindParam(":apreciativas", $apreciativas, PDO::PARAM_INT);
        $actualizacion->bindParam(":autoevaluacion", $autoevaluaciones, PDO::PARAM_INT);
        return $actualizacion->execute();
    }

    # metodo para allar promedio de las notas agrupadas por criterios
    public function calcularNota($nota1, $actividad1, $nota2, $actividad2, $criterio)
    {
        $notaActividad1 = ($actividad1 / $criterio) * $nota1;
        $notaActividad2 = ($actividad2 / $criterio) * $nota2;
        $resultado_criterio = $notaActividad1 + $notaActividad2;
        $definitiva = ($criterio / 100) * $resultado_criterio;
        $notas = array($resultado_criterio, $definitiva);
        return $notas;
    }

    # Metodo para sumar las notas de los 3 criterios evaluativos y asi hallar la nota definitiva de un periodo.
    public function definitivaPerido($uno, $dos, $tres)
    {
        return $uno + $dos + $tres;
    }

    # Metodo para validar que solo se ingrese una nota por periodo en cada actividad
    public function justANote($estudiante, $nota, $materia, $periodo, $actividad)
    {
        switch ($actividad) {
            case 'evaluacion':
                $db_estudiante = 'id_estudiante_e';
                $db_materia = 'id_materia_e';
                $db_periodo = 'id_periodo_e';
                break;
            case 'trimestral':
                $db_estudiante = 'id_estudiante_t';
                $db_materia = 'id_materia_t';
                $db_periodo = 'id_periodo_t';
                break;
            case 'tindividual':
                $db_estudiante = 'id_estudiante_Tindividual';
                $db_materia = 'id_materia_Tindividual';
                $db_periodo = 'id_periodo_Tindividual';
                break;
            case 'tcolaborativo':
                $db_estudiante = 'id_estudiante_Tcolaborativo';
                $db_materia = 'id_materia_Tcolaborativo';
                $db_periodo = 'id_periodo_Tcolaborativo';
                break;
            case 'apreciativa':
                $db_estudiante = 'id_estudiante_apreciativa';
                $db_materia = 'id_materia_apreciativa';
                $db_periodo = 'id_periodo_apreciativa';
                break;
            case 'autoevaluacion':
                $db_estudiante = 'id_estudiante_autoevaluacion';
                $db_materia = 'id_materia_autoevaluacion';
                $db_periodo = 'id_periodo_autoevaluacion';
                break;
        }
        $validacion = $this->db->prepare("SELECT * FROM $actividad WHERE $db_estudiante = :estudiante AND $db_materia = :materia AND $db_periodo = :periodo");
        $validacion->bindParam(":estudiante", $estudiante, PDO::PARAM_INT);
        $validacion->bindParam(":materia", $materia, PDO::PARAM_INT);
        $validacion->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $validacion->execute();
        $resultado = $validacion;
        if ($resultado->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }

    # Metodo para eliminar la nota de una actividad
    public function deleteNote()
    {
        $actividad = $this->getItem();
        $ide = $this->getId();

        switch ($actividad) {
            case 'evaluacion':
                $name_id = 'id_evaluacion';
                break;
            case 'trimestral':
                $name_id = 'id_trimestral';
                break;
            case 'tindividual':
                $name_id = 'id_Tindividual';
                break;
            case 'tcolaborativo':
                $name_id = 'id_Tcolaborativo';
                break;
            case 'apreciativa':
                $name_id = 'id_apreciativa';
                break;
            case 'autoevaluacion':
                $name_id = 'id_autoevaluacion';
                break;
        }
        $eliminar = $this->db->prepare("DELETE  FROM $actividad WHERE $name_id = :id");
        $eliminar->bindParam(":id", $ide, PDO::PARAM_INT);
        return $eliminar->execute();
    }

# Metodo para mantener acualizada la nota definitiva de una materia
    public function updateFinalNote($periodo)
    {
        try {
            $student = $this->getEstudiante();
            $subject = $this->getMateria();
            $note = $this->getNota();
            # Verificando si existe  nota o no.
            $existe = $this->db->prepare("SELECT  * FROM notasdefinitivas WHERE id_estudiante_nd = :estudiante AND id_materia_nd= :materia AND id_periodo_nd = :periodo");
            $existe->bindParam(":estudiante", $student, PDO::PARAM_INT);
            $existe->bindParam(":materia", $subject, PDO::PARAM_INT);
            $existe->bindParam(":periodo", $periodo, PDO::PARAM_INT);
            $existe->execute();
            $total_resultado = $existe;

            if ($total_resultado->rowCount() == 0) {
                # Sí no existe nota, entonces se registra
                $registrar = $this->db->prepare("INSERT INTO notasdefinitivas VALUES(null, :id_estudiante, :id_materia, :id_periodo, :nota, CURDATE(), CURTIME())");
                $registrar->bindParam(":id_estudiante", $student, PDO::PARAM_INT);
                $registrar->bindParam(":id_materia", $subject, PDO::PARAM_INT);
                $registrar->bindParam(":id_periodo", $periodo, PDO::PARAM_INT);
                $registrar->bindParam(":nota", $note, PDO::PARAM_INT);
                echo $registrar->execute();
            } else {
                # Sí ya existe nota, entonce se actualiza con la nueva nota cálculada
                $actualizar = $this->db->prepare("UPDATE notasdefinitivas SET nota_definitiva = :definitiva, fecha = CURDATE(), hora = CURTIME() WHERE id_estudiante_nd = :id_estudiante AND id_materia_nd = :id_materia AND id_periodo_nd = :id_periodo");
                $actualizar->bindParam(":id_estudiante", $student, PDO::PARAM_INT);
                $actualizar->bindParam(":id_materia", $subject, PDO::PARAM_INT);
                $actualizar->bindParam(":id_periodo", $periodo, PDO::PARAM_INT);
                $actualizar->bindParam(":definitiva", $note, PDO::PARAM_INT);
                $actualizar->execute();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

} # fin de la clase
