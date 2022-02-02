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

} # fin  de la clase
