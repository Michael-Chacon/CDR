<?php

class Documentos
{
    private $id;
    private $nombre;
    private $descripcion;
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

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

    public function save()
    {
        try {
            $name = $this->getNombre();
            $description = $this->getDescripcion();
            $guardar = $this->db->prepare("INSERT INTO documentos VALUES(null, :nombre, :descripcion);");
            $guardar->bindParam(":nombre", $name, PDO::PARAM_STR);
            $guardar->bindParam(":descripcion", $description, PDO::PARAM_STR);
            return $guardar->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function listar()
    {
        $obtener = $this->db->prepare("SELECT * FROM documentos");
        $obtener->execute();
        return $obtener;
    }

    public function delete()
    {
        $id_docu = $this->getId();
        $eliminar = $this->db->prepare("DELETE FROM documentos WHERE id = :id;");
        $eliminar->bindParam(":id", $id_docu, PDO::PARAM_INT);
        return $eliminar->execute();
    }
}
