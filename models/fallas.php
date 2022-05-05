<?php

class Fallas
{
    private $id;
    private $materia;
    private $fecha;
    private $periodo;
    private $estudiante;
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
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     *
     * @return self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

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

    public function registerFails()
    {
        $date = $this->getFecha();
        $student = $this->getEstudiante();
        $subject = $this->getMateria();
        $period = $this->getPeriodo();
        foreach ($student as $id_e) {
            $registrar = $this->db->prepare("INSERT INTO falla VALUES(null, :fecha, :estudiante, :materia, :periodo)");
            $registrar->bindParam(":fecha", $date, PDO::PARAM_STR);
            $registrar->bindParam(":estudiante", $id_e, PDO::PARAM_INT);
            $registrar->bindParam(":materia", $subject, PDO::PARAM_INT);
            $registrar->bindParam(":periodo", $period, PDO::PARAM_INT);
            $registrar->execute();
        }
        return $registrar;

    }

    # obtener el total de fallas de un estudiante
    public function totalFailsAStudent()
    {
        $student = $this->getEstudiante();
        $subject = $this->getMateria();
        $total_fallas = $this->db->prepare("SELECT COUNT(id) AS 'total' FROM falla WHERE id_materia_f = :materia AND id_estudiante_f = :estudiante;");
        $total_fallas->bindParam(":materia", $subject, PDO::PARAM_INT);
        $total_fallas->bindParam(":estudiante", $student, PDO::PARAM_INT);
        $total_fallas->execute();
        return $total_fallas->fetchObject();
    }
 # obtener el total de fallas de un estudiante por periodo
    public function totalFailsAStudentPeriod()
    {
        $hoy = date("Y-m-d");
        $id_periodo = Utils::validarPeriodoAcademico($hoy);
        $student = $this->getEstudiante();
        $subject = $this->getMateria();
        $total_fallas_periodo = $this->db->prepare("SELECT COUNT(id) AS 'fallas_periodo' FROM falla WHERE id_materia_f = :materia AND id_estudiante_f = :estudiante AND id_periodo_f = :periodo;");
        $total_fallas_periodo->bindParam(":materia", $subject, PDO::PARAM_INT);
        $total_fallas_periodo->bindParam(":estudiante", $student, PDO::PARAM_INT);
        $total_fallas_periodo->bindParam(":periodo", $id_periodo, PDO::PARAM_INT);
        $total_fallas_periodo->execute();
        return $total_fallas_periodo->fetchObject();
    }
    # obtener las fechas de las fallas
    public function dateFailsAStudent()
    {
        $student = $this->getEstudiante();
        $subject = $this->getMateria();
        $fallas = $this->db->prepare("SELECT fecha_falla, id_periodo_f FROM falla WHERE id_materia_f = :materia AND id_estudiante_f = :estudiante;");
        $fallas->bindParam(":materia", $subject, PDO::PARAM_INT);
        $fallas->bindParam(":estudiante", $student, PDO::PARAM_INT);
        $fallas->execute();
        return $fallas;
    }

} # fin  de la clase
