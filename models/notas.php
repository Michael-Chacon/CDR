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

    # obtener las notas de evaluacion de un estudiante en el periodo x
    public function notaEvaluacionPeriodox($periodo)
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $evaluacion = $this->db->prepare("SELECT e.*, c.* FROM evaluacion e
            INNER JOIN cognitivo c ON c.id_cognitivo = e.id_cognitivo_e
            WHERE e.id_estudiante_e = :student AND e.id_materia_e = :materia AND e.id_periodo_e = :periodo;");
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
    # obtener la nota de la trimestral de un estudiate en el periodo x
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
        $individual = $this->db->prepare("SELECT t.*, p.* FROM tindividual t
            INNER JOIN procedimental p ON p.id_procedimental = t.id_procedimental_Tindividual
            WHERE t.id_estudiante_Tindividual = :student AND t.id_materia_Tindividual = :materia AND t.id_periodo_Tindividual = :periodo;");
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
        $apreciativa = $this->db->prepare("SELECT a.*, ac.* FROM apreciativa a
            INNER JOIN actitudinal ac ON ac.id_actitudinal = a.id_actitudinal_apreciativa
            WHERE a.id_estudiante_apreciativa = :student AND a.id_materia_apreciativa = :materia AND a.id_periodo_apreciativa = :periodo;");
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
    # listar los porcentajes de los 3 criterios academicos

    public function listCongnitivo()
    {
        $cognitivo = $this->db->prepare("SELECT * FROM cognitivo");
        $cognitivo->execute();
        return $cognitivo->fetchObject();
    }

    public function listProcedimental()
    {
        $procedimental = $this->db->prepare("SELECT * FROM procedimental");
        $procedimental->execute();
        return $procedimental->fetchObject();
    }

    public function listActitudinal()
    {
        $actitudinal = $this->db->prepare("SELECT * FROM actitudinal");
        $actitudinal->execute();
        return $actitudinal->fetchObject();
    }

    # METODOS PARA ACTUALIZAR LOS PORCENTAJES DE LOS CRITERIOS DE EVALUACION "COGNITIVO, PROCEDIMENTAL Y ACTITUDINAL"

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

    # metodo para registrar las notas en su respectivo criterio y actividad
    public function saveAllNotes($estudiante, $materia, $periodo, $criterio, $notas, $tabla)
    {
        $nota = $this->db->prepare("INSERT INTO $tabla VALUES(null, :estudiante, :materia, :periodo, :criterio, :nota)");
        $nota->bindParam(":estudiante", $estudiante, PDO::PARAM_INT);
        $nota->bindParam(":materia", $materia, PDO::PARAM_INT);
        $nota->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $nota->bindParam(":criterio", $criterio, PDO::PARAM_INT);
        $nota->bindParam(":nota", $notas, PDO::PARAM_INT);
        return $nota->execute();
    }

    # listar los datos de los criterios
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

    # metodo para allar promedio de las notas agrupadas por criterios
    public function calcularPromedio($nota1, $actividad1, $nota2, $actividad2, $criterio)
    {
        $notaActividad1 = ($actividad1 / $criterio) * $nota1;
        $notaActividad2 = ($actividad2 / $criterio) * $nota2;
        $resultado_criterio = $notaActividad1 + $notaActividad2;
        $definitiva = ($criterio / 100) * $resultado_criterio;
        $notas = array($resultado_criterio, $definitiva);
        return $notas;
    }

    # nota definitiva de un periodo
    public function definitivaPerido($uno, $dos, $tres)
    {
        return $uno + $dos + $tres;
    }
#fin de la clase
}
