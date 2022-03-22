<?php
class Area
{
    private $id;
    private $nombre;
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

    public function saveArea()
    {
        $area = $this->getNombre();
        $colorA = $this->getColor();
        $crear = $this->db->prepare("INSERT INTO areas VALUES(null, :nombre, :color)");
        $crear->bindParam(":nombre", $area, PDO::PARAM_STR);
        $crear->bindParam(":color", $colorA, PDO::PARAM_STR);
        return $crear->execute();
    }

    public function getAreas()
    {
        $seleccionar = $this->db->prepare("SELECT * FROM areas");
        $seleccionar->execute();
        return $seleccionar;
    }

    public function deleteArea(){
    	$id_area = $this->getId();
    	$delete = $this->db->prepare("DELETE FROM areas WHERE id_area = :id");
    	$delete->bindParam(":id", $id_area, PDO::PARAM_INT);
    	return $delete->execute();
    }


}
