<?php

class Grados
{

    protected $id;
    protected $grado;
    protected $aula;
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
/**
 * @return mixed
 */
    public function getAula()
    {
        return $this->aula;
    }

    /**
     * @param mixed $aula
     *
     * @return self
     */
    public function setAula($aula)
    {
        $this->aula = $aula;

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
        try {
            $grado = $this->getGrado();
            $estudiantes = $this->db->prepare("SELECT e.*, g.id AS 'id_grado' FROM estudiante e
                INNER JOIN grado g ON g.id = e.id_gradoE
                WHERE g.id = $grado");
            $estudiantes->execute();
            return $estudiantes;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
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

    # guardar el alula
    public function saveClassroom()
    {
        $nombre = $this->getAula();
        $estado = 'no';
        $crear = $this->db->prepare("INSERT INTO aulas VALUES(null, :nombre, :estado)");
        $crear->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $crear->bindParam(":estado", $estado, PDO::PARAM_STR);
        return $crear->execute();
    }

    # seleccionar todas la aulas
    public function selectAllClassroom()
    {
        $select = $this->db->prepare("SELECT * FROM aulas");
        $select->execute();
        return $select;
    }

    # seleccionar grados sin asignar
    public function selectAllClassroomNotAssigned()
    {
        $select = $this->db->prepare("SELECT * FROM aulas WHERE asignada = 'no'");
        $select->execute();
        return $select;
    }

    # Elimina aula
    public function deleteClassroom()
    {
        $id_aula = $this->getId();
        $delete = $this->db->prepare("DELETE FROM aulas WHERE id_aula = :aula");
        $delete->bindParam(":aula", $id_aula, PDO::PARAM_INT);
        return $delete->execute();
        // 3014252
    }

    # asignar aulas a los grados
    public function assignedClassroomToDeegre()
    {
        $id_aula = $this->getAula();
        $id_grado = $this->getGrado();
        $asignar = $this->db->prepare("INSERT INTO aulaGrado VALUES (null, :aula, :grado)");
        $asignar->bindParam(":aula", $id_aula, PDO::PARAM_INT);
        $asignar->bindParam(":grado", $id_grado, PDO::PARAM_INT);
        return $asignar->execute();
    }

    # cambiar el estado del aula para que aparesca ya asignada
    public function updateStateOfClassroom()
    {
        $aula = $this->getAula();
        $nuevo_estado = 'si';
        $estado = $this->db->prepare("UPDATE aulas SET asignada = :cambio WHERE id_aula = :id;");
        $estado->bindParam(":cambio", $nuevo_estado, PDO::PARAM_STR);
        $estado->bindParam(":id", $aula, PDO::PARAM_INT);
        $estado->execute();
    }

    # seleccionar el aula que le asignaron a una grado
    public function selectClassroomOfDeegre($id_grado)
    {
        $select = $this->db->prepare("SELECT a.nombre, a.id_aula FROM aulas a
            INNER JOIN aulaGrado au ON au.id_aula_grado = a.id_aula
            WHERE au.id_grado_aula = :grado;");
        $select->bindParam(":grado", $id_grado, PDO::PARAM_INT);
        $select->execute();
        return $select;
    }
}
