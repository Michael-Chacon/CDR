<?php

class Filtro
{
    protected $id_usuario;
    public $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     *
     * @return self
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    #obtener los datos del usuario que inicia sesion
    public function obtenerDatos($rol)
    {
        $usuario = $this->getIdUsuario();
        $consulta = $this->db->prepare("SELECT * FROM $rol WHERE id = :id");
        $consulta->bindParam('id', $usuario, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchObject();

    }
}
