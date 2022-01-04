<?php

class Grados
{

    protected $id;
    protected $grado;
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

    # validar sí el nombre del grado y existe
    public function validar()
    {
        $nombre = $this->getGrado();
        $validacion = $this->db->prepare("SELECT COUNT(id) AS 'resultado' FROM grado WHERE nombre_g = :nombre");
        $validacion->bindParam(":nombre", $nombre, PDO::PARAM_INT);
        $validacion->execute();
        $total = $validacion->fetchObject();
        if ($total->resultado == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function guardar()
    {
        $grado = $this->getGrado();
        $consulta = $this->db->prepare("INSERT INTO grado VALUES(null, :g)");
        $consulta->bindParam(":g", $grado, PDO::PARAM_INT);
        return $consulta->execute();

    }

    #seleccionar todos los grados
    public function allGrados()
    {
        $todos = $this->db->prepare("SELECT  *  FROM grado");
        $todos->execute();
        return $todos;
    }

    #obtener los alumos de determinado grado
    public function EstudiantesGrado()
    {
        $grado = $this->getGrado();
        $estudiantes = $this->db->prepare("SELECT e.*, g.id AS 'id_grado' FROM estudiante e  INNER JOIN grado g ON g.id = e.id_gradoE WHERE g.id = $grado;");
        $estudiantes->execute();
        return $estudiantes;
    }

    #identificar el grado
    public function gradoActual($id)
    {
        $G_actual = $this->db->prepare("SELECT * FROM grado WHERE id = :grado");
        $G_actual->bindParam(':grado', $id, PDO::PARAM_INT);
        $G_actual->execute();
        return $G_actual->fetchObject();
    }

    public function deleteGrado()
    {
        $gr = $this->getId();
        $eliminar = $this->db->prepare("DELETE FROM grado WHERE id = :id");
        $eliminar->bindParam(":id", $gr, PDO::PARAM_INT);
        echo $eliminar->execute();
        exit;
    }

}
