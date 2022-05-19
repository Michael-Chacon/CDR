<?php
class Tablero
{
    private $id;
    private $titulo;
    private $fecha;
    private $descripcion;
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     *
     * @return self
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

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
    public function saveActivity()
    {
        $title = $this->getTitulo();
        $date = $this->getFecha();
        $description = $this->getDescripcion();
        $colores = $this->getColor();
        $guardar = $this->db->prepare("INSERT INTO tableroactividades VALUES(null, :titulo, :fecha, :des, :color)");
        $guardar->bindParam(":titulo", $title, PDO::PARAM_STR);
        $guardar->bindParam(":fecha", $date, PDO::PARAM_STR);
        $guardar->bindParam(":des", $description, PDO::PARAM_STR);
        $guardar->bindParam(":color", $colores, PDO::PARAM_STR);
        return $guardar->execute();
    }
}
