<?php

class Iconos
{
    private $nombre;
    public $db;

    public function __construct()
    {
        $this->db = Database::conectar();
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

    public function saveIcono()
    {
        $name = $this->getNombre();
        $registro = $this->db->prepare("INSERT INTO iconos VALUES(null, :icono)");
        $registro->bindParam(":icono", $name, PDO::PARAM_STR);
        return $registro->execute();
    }

    public function listIconos()
    {
        $listar = $this->db->prepare("SELECT * FROM iconos ORDER BY id_icono DESC");
        $listar->execute();
        return $listar;
    }
    public function deleteIcono($id)
    {
        $eliminar = $this->db->prepare("DELETE FROM iconos WHERE id_icono = $id");
        return $eliminar->execute();
    }
}
