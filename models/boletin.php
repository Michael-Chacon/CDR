<?php
class Boletin
{
    private $id_boletin;
    private $id_estudiante;
    private $id_materia;
    private $area;
    private $id_periodo;
    private $materia;
    private $estudiante;
    private $docente;
    private $fallas;
    private $observacion;
    private $periodo1;
    private $periodo2;
    private $periodo3;
    private $promedio;
    private $recuperacion;

    public $db;
    public function __construct()
    {
        $this->db = Database::conectar();
    }

    /**
     * @return mixed
     */
    public function getIdBoletin()
    {
        return $this->id_boletin;
    }

    /**
     * @param mixed $id_boletin
     *
     * @return self
     */
    public function setIdBoletin($id_boletin)
    {
        $this->id_boletin = $id_boletin;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdMateria()
    {
        return $this->id_materia;
    }

    /**
     * @param mixed $id_materia
     *
     * @return self
     */
    public function setIdMateria($id_materia)
    {
        $this->id_materia = $id_materia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     *
     * @return self
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdPeriodo()
    {
        return $this->id_periodo;
    }

    /**
     * @param mixed $id_periodo
     *
     * @return self
     */
    public function setIdPeriodo($id_periodo)
    {
        $this->id_periodo = $id_periodo;

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
    public function getDocente()
    {
        return $this->docente;
    }

    /**
     * @param mixed $docente
     *
     * @return self
     */
    public function setDocente($docente)
    {
        $this->docente = $docente;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFallas()
    {
        return $this->fallas;
    }

    /**
     * @param mixed $fallas
     *
     * @return self
     */
    public function setFallas($fallas)
    {
        $this->fallas = $fallas;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * @param mixed $observacion
     *
     * @return self
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriodo1()
    {
        return $this->periodo1;
    }

    /**
     * @param mixed $periodo1
     *
     * @return self
     */
    public function setPeriodo1($periodo1)
    {
        $this->periodo1 = $periodo1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriodo2()
    {
        return $this->periodo2;
    }

    /**
     * @param mixed $periodo2
     *
     * @return self
     */
    public function setPeriodo2($periodo2)
    {
        $this->periodo2 = $periodo2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriodo3()
    {
        return $this->periodo3;
    }

    /**
     * @param mixed $periodo3
     *
     * @return self
     */
    public function setPeriodo3($periodo3)
    {
        $this->periodo3 = $periodo3;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPromedio()
    {
        return $this->promedio;
    }

    /**
     * @param mixed $promedio
     *
     * @return self
     */
    public function setPromedio($promedio)
    {
        $this->promedio = $promedio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecuperacion()
    {
        return $this->recuperacion;
    }

    /**
     * @param mixed $recuperacion
     *
     * @return self
     */
    public function setRecuperacion($recuperacion)
    {
        $this->recuperacion = $recuperacion;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getIdEstudiante()
    {
        return $this->id_estudiante;
    }

    /**
     * @param mixed $id_estudiante
     *
     * @return self
     */
    public function setIdEstudiante($id_estudiante)
    {
        $this->id_estudiante = $id_estudiante;

        return $this;
    }

    # Guardar boletin de una materia
    public function saveBoletin()
    {
        try {
            $student_id = $this->getIdEstudiante();
            $subject_id = $this->getIdMateria();
            $area_id = $this->getArea();
            $period_id = $this->getIdPeriodo();
            $subject = $this->getMateria();
            $student = $this->getEstudiante();
            $teacher = $this->getDocente();
            $fails = $this->getFallas();
            $observation = $this->getObservacion();
            $avg = $this->getPromedio();
            $recuperacion_m = $this->getRecuperacion();
            $periodoUno = $this->getPeriodo1();
            $periodoDos = $this->getPeriodo2();
            $periodoTres = $this->getPeriodo3();

            $boletin = $this->db->prepare("INSERT INTO boletin VALUES(null, :e_id, :m_id, :a_id, :p_id, :materia, :student, :teacher, :observa, :recuperacion, :p1, :p2, :p3, :avg, :fail)");
            $boletin->bindParam(":e_id", $student_id, PDO::PARAM_INT);
            $boletin->bindParam(":m_id", $subject_id, PDO::PARAM_INT);
            $boletin->bindParam(":a_id", $area_id, PDO::PARAM_INT);
            $boletin->bindParam(":p_id", $period_id, PDO::PARAM_INT);
            $boletin->bindParam(":materia", $subject, PDO::PARAM_STR);
            $boletin->bindParam(":student", $student, PDO::PARAM_STR);
            $boletin->bindParam(":teacher", $teacher, PDO::PARAM_STR);
            $boletin->bindParam(":observa", $observation, PDO::PARAM_STR);
            $boletin->bindParam(":recuperacion", $recuperacion_m, PDO::PARAM_STR);
            $boletin->bindParam(":p1", $periodoUno, PDO::PARAM_INT);
            $boletin->bindParam(":p2", $periodoDos, PDO::PARAM_INT);
            $boletin->bindParam(":p3", $periodoTres, PDO::PARAM_INT);
            $boletin->bindParam(":avg", $avg, PDO::PARAM_INT);
            $boletin->bindParam(":fail", $fails, PDO::PARAM_INT);
            return $boletin->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

} # fin de la clase
