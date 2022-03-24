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

    public function validatePercent()
    {
        try {
            $subject = $this->getMateria();
            $student = $this->getEstudiante();
            $porcent = $this->getPorcentaje();
            $validacion = $this->db->prepare("SELECT SUM(porcentaje) AS 'total' FROM notas WHERE id_materia_n = :materia AND id_estudiante_n = :estudiante");
            $validacion->bindParam(":materia", $subject, PDO::PARAM_INT);
            $validacion->bindParam(":estudiante", $student, PDO::PARAM_INT);
            $validacion->execute();
            $total = $validacion->fetchObject();
            $neto = $total->total + $porcent;
            if ($neto <= 100) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function registerNote()
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $period = $this->getPeriodo();
        $itemN = $this->getItem();
        $note = $this->getNota();
        $percent = $this->getPorcentaje();

        $register = $this->db->prepare("INSERT INTO notas VALUES(null, :materia, :estudiante, :periodo, :item, :nota, :percent)");
        $register->bindParam(":materia", $subject, PDO::PARAM_INT);
        $register->bindParam(":estudiante", $student, PDO::PARAM_INT);
        $register->bindParam(":periodo", $period, PDO::PARAM_INT);
        $register->bindParam(":item", $itemN, PDO::PARAM_STR);
        $register->bindParam(":nota", $note, PDO::PARAM_INT);
        $register->bindParam(":percent", $percent, PDO::PARAM_INT);
        return $register->execute();
    }

    # obtener todas los notas de un estudiante en el periodo uno
    public function notasPeriodo1()
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $periodoUno = $this->db->prepare("SELECT * FROM notas WHERE id_materia_n = :materia AND id_estudiante_n = :estudent AND id_periodo_n = 1");
        $periodoUno->bindParam(":materia", $subject, PDO::PARAM_INT);
        $periodoUno->bindParam(":estudent", $student, PDO::PARAM_INT);
        $periodoUno->execute();
        return $periodoUno;
    }

    public function notasPeriodo2()
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $periodoUno = $this->db->prepare("SELECT * FROM notas WHERE id_materia_n = :materia AND id_estudiante_n = :estudent AND id_periodo_n = 2");
        $periodoUno->bindParam(":materia", $subject, PDO::PARAM_INT);
        $periodoUno->bindParam(":estudent", $student, PDO::PARAM_INT);
        $periodoUno->execute();
        return $periodoUno;
    }
    public function notasPeriodo3()
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $periodoUno = $this->db->prepare("SELECT * FROM notas WHERE id_materia_n = :materia AND id_estudiante_n = :estudent AND id_periodo_n = 3");
        $periodoUno->bindParam(":materia", $subject, PDO::PARAM_INT);
        $periodoUno->bindParam(":estudent", $student, PDO::PARAM_INT);
        $periodoUno->execute();
        return $periodoUno;
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

}
