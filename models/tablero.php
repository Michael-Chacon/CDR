<?php
class Tablero
{
    private $id;
    private $titulo;
    private $fecha;
    private $detalle;
    private $color;
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
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     *
     * @return self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

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
    public function getDetalle()
    {
        return $this->detalle;
    }

    /**
     * @param mixed $detalle
     *
     * @return self
     */
    public function setDetalle($detalle)
    {
        $this->detalle = $detalle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     *
     * @return self
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    # Metodo para guardar las actividades
    public function saveActivityStudents()
    {
        $title = $this->getTitulo();
        $date = $this->getFecha();
        $description = $this->getDetalle();
        $colores = $this->getColor();
        $guardar = $this->db->prepare("INSERT INTO tableroactividadesestudiantes VALUES(null, :titulo, :fecha, :des, :color)");
        $guardar->bindParam(":titulo", $title, PDO::PARAM_STR);
        $guardar->bindParam(":fecha", $date, PDO::PARAM_STR);
        $guardar->bindParam(":des", $description, PDO::PARAM_STR);
        $guardar->bindParam(":color", $colores, PDO::PARAM_STR);
        return $guardar->execute();
    }
    public function saveActivityTeachers()
    {
        $title = $this->getTitulo();
        $date = $this->getFecha();
        $description = $this->getDetalle();
        $colores = $this->getColor();
        $guardar = $this->db->prepare("INSERT INTO tableroactividadesdocentes VALUES(null, :titulo, :fecha, :des, :color)");
        $guardar->bindParam(":titulo", $title, PDO::PARAM_STR);
        $guardar->bindParam(":fecha", $date, PDO::PARAM_STR);
        $guardar->bindParam(":des", $description, PDO::PARAM_STR);
        $guardar->bindParam(":color", $colores, PDO::PARAM_STR);
        return $guardar->execute();
    }
    # metodo para obtener todas las actividades
    public function getAllActivitiesStudends()
    {
        $listar = $this->db->prepare("SELECT * FROM tableroactividadesestudiantes ORDER BY fecha ASC");
        $listar->execute();
        return $listar;
    }
    public function getAllActivitiesTeachers()
    {
        $listar = $this->db->prepare("SELECT * FROM tableroactividadesdocentes ORDER BY fecha ASC");
        $listar->execute();
        return $listar;
    }
}
