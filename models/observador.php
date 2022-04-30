<?php

class Observador
{
    private $id;
    private $estudiante;
    private $nombre_e;
    private $grado;
    private $fecha;
    private $docente;
    private $observacion;
    private $acciones;
    public $db;

    public function __construct()
    {
        $this->db = Database::conectar();
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
    public function getAcciones()
    {
        return $this->acciones;
    }

    /**
     * @param mixed $acciones
     *
     * @return self
     */
    public function setAcciones($acciones)
    {
        $this->acciones = $acciones;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombreE()
    {
        return $this->nombre_e;
    }

    /**
     * @param mixed $nombre_e
     *
     * @return self
     */
    public function setNombreE($nombre_e)
    {
        $this->nombre_e = $nombre_e;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrado()
    {
        return $this->grado;
    }

    /**
     * @param mixed $grado
     *
     * @return self
     */
    public function setGrado($grado)
    {
        $this->grado = $grado;

        return $this;
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

    # metodo para registrar las observaciones de los estudiantes
    public function saveWatcher()
    {
        $student = $this->getEstudiante();
        $date = $this->getFecha();
        $degree = $this->getGrado();
        $teache = $this->getDocente();
        $name_e = $this->getNombreE();
        $observation = $this->getObservacion();
        $action = $this->getAcciones();

        $registrar = $this->db->prepare("INSERT INTO observaciones VALUES(null, :estudiante, :fecha, :grado, :profe,  :nombre, :observacion, :accion);");
        $registrar->bindParam(":estudiante", $student, PDO::PARAM_INT);
        $registrar->bindParam(":fecha", $date, PDO::PARAM_STR);
        $registrar->bindParam(":grado", $degree, PDO::PARAM_INT);
        $registrar->bindParam(":profe", $teache, PDO::PARAM_STR);
        $registrar->bindParam(":nombre", $name_e, PDO::PARAM_STR);
        $registrar->bindParam(":observacion", $observation, PDO::PARAM_STR);
        $registrar->bindParam(":accion", $action, PDO::PARAM_STR);
        return $registrar->execute();
    }

    # Seleccionar las observaciones de un estudiante
    public function getObservation()
    {
        $estudiante = $this->getEstudiante();
        $listado = $this->db->prepare("SELECT * FROM observaciones WHERE id_estudiante_ob = :id ORDER BY id_observacion DESC ");
        $listado->bindParam(":id", $estudiante, PDO::PARAM_INT);
        $listado->execute();
        return $listado;
    }

    # Contar el nuemro de observaciones de un estudiante
    public function countObservations()
    {
        $student = $this->getEstudiante();
        $observaciones = $this->db->prepare("SELECT COUNT(id_observacion) AS 'total' FROM observaciones WHERE id_estudiante_ob = :id_student");
        $observaciones->bindParam(':id_student', $student, PDO::PARAM_INT);
        $observaciones->execute();
        return $observaciones->fetchObject();
    }
    # Obtener los datos de una obsrvacion para generar el reporte ne pdf
    public function observationInPDF()
    {
        $id_observacion = $this->getId();
        $listado = $this->db->prepare("SELECT * FROM observaciones WHERE id_observacion = :id");
        $listado->bindParam(":id", $id_observacion, PDO::PARAM_INT);
        $listado->execute();
        return $listado->fetchObject();

    }
}
