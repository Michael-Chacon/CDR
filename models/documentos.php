<?php

class Documentos
{
    private $id;
    private $titulo;
    private $nombre;
    private $descripcion;
    private $fecha;
    private $formato;
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
    public function getFormato()
    {
        return $this->formato;
    }

    /**
     * @param mixed $formato
     *
     * @return self
     */
    public function setFormato($formato)
    {
        $this->formato = $formato;

        return $this;
    }

    /**
     * @return itutlo
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

    public function saveTeachers()
    {
        try {
            $name = $this->getNombre();
            $description = $this->getDescripcion();
            $guardar = $this->db->prepare("INSERT INTO documentosdocentes VALUES(null, :nombre, :descripcion);");
            $guardar->bindParam(":nombre", $name, PDO::PARAM_STR);
            $guardar->bindParam(":descripcion", $description, PDO::PARAM_STR);
            return $guardar->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function saveStudents()
    {
        try {
            $name = $this->getNombre();
            $description = $this->getDescripcion();
            $guardar = $this->db->prepare("INSERT INTO documentosestudiantes VALUES(null, :nombre, :descripcion);");
            $guardar->bindParam(":nombre", $name, PDO::PARAM_STR);
            $guardar->bindParam(":descripcion", $description, PDO::PARAM_STR);
            return $guardar->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function listarTeacher()
    {
        $obtener = $this->db->prepare("SELECT * FROM documentosdocentes");
        $obtener->execute();
        return $obtener;
    }

    public function listarStudents()
    {
        $obtener = $this->db->prepare("SELECT * FROM documentosestudiantes");
        $obtener->execute();
        return $obtener;
    }

    public function delete()
    {
        $id_docu = $this->getId();
        $eliminar = $this->db->prepare("DELETE FROM documentosdocentes WHERE id = :id;");
        $eliminar->bindParam(":id", $id_docu, PDO::PARAM_INT);
        return $eliminar->execute();
    }

    # modulo docente: guardar documentos de actividades en  x materia
    public function saveClassDocument()
    {
        $subject = $this->getId();
        $tittle = $this->getTitulo();
        $date = $this->getFecha();
        $format = $this->getFormato();
        $document = $this->getNombre();
        $description = $this->getDescripcion();
        $register = $this->db->prepare("INSERT INTO documentosclase VALUES(null, :materia, :titulo, :fecha, :formato, :documento, :descripcion)");
        $register->bindParam(":materia", $subject, PDO::PARAM_INT);
        $register->bindParam(":titulo", $tittle, PDO::PARAM_STR);
        $register->bindParam(":fecha", $date, PDO::PARAM_STR);
        $register->bindParam(":formato", $format, PDO::PARAM_STR);
        $register->bindParam("documento", $document, PDO::PARAM_STR);
        $register->bindParam("descripcion", $description, PDO::PARAM_STR);
        return $register->execute();
    }

    # obtener la lista de los documentos guardados en x materia
    public function listClassDocuments()
    {
        $subject = $this->getId();
        $listar = $this->db->prepare("SELECT * FROM documentosclase WHERE id_materia_d = :materia ORDER BY id DESC");
        $listar->bindParam(":materia", $subject, PDO::PARAM_INT);
        $listar->execute();
        return $listar;
    }

    # eliminar un documento de x materia
    public function deleteClassDocument()
    {
        $id_document = $this->getId();
        $delete = $this->db->prepare("DELETE FROM documentosclase WHERE id = :id");
        $delete->bindParam(":id", $id_document, PDO::PARAM_INT);
        return $delete->execute();
    }

    # validar que el numero de archivos por materia no sea mayor que 10
    public function validarNumeroDArchivos()
    {
        $id_materia = $this->getId();
        $conteo = $this->db->prepare("SELECT COUNT(id) AS 'resultado' FROM documentosclase WHERE id_materia_d = :materia");
        $conteo->bindParam(":materia", $id_materia, PDO::PARAM_INT);
        $conteo->execute();
        $total = $conteo->fetchObject();
        if ($total->resultado >= 10) {
            return false;
        } else {
            return true;
        }
    }

} # fin de la clase
