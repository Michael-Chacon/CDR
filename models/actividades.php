<?php

class Actividades
{
    protected $id;
    protected $materia;
    protected $titulo;
    protected $fecha;
    protected $descripcion;

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
    # guardar actividad
    public function saveClassActivity()
    {
        $subject = $this->getMateria();
        $tittle = $this->getTitulo();
        $date = $this->getFecha();
        $description = $this->getDescripcion();
        $register = $this->db->prepare("INSERT INTO actividadesmateria VALUES(null, :materia, :titulo, :fecha, :descripcion)");
        $register->bindParam(":materia", $subject, PDO::PARAM_INT);
        $register->bindParam(":titulo", $tittle, PDO::PARAM_STR);
        $register->bindParam(":fecha", $date, PDO::PARAM_STR);
        $register->bindParam(":descripcion", $description, PDO::PARAM_STR);
        return $register->execute();
    }

    public function listClassActivitys()
    {
        $id_materia = $this->getMateria();
        $listado = $this->db->prepare("SELECT * FROM actividadesmateria WHERE id_materia_a = :id ORDER BY id DESC");
        $listado->bindParam(":id", $id_materia, PDO::PARAM_INT);
        $listado->execute();
        return $listado;
    }

    public function deleteActivity()
    {
        $id_actividad = $this->getId();
        $eliminar = $this->db->prepare("DELETE FROM actividadesmateria WHERE id = :actividad");
        $eliminar->bindParam(":actividad", $id_actividad, PDO::PARAM_INT);
        return $eliminar->execute();
    }
} # end of class
