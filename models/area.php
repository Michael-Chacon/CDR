<?php
class Area
{
    private $id;
    private $nombre;
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

    public function saveArea()
    {
        $area = $this->getNombre();
        $crear = $this->db->prepare("INSERT INTO areas VALUES(null, :nombre)");
        $crear->bindParam(":nombre", $area, PDO::PARAM_STR);
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
