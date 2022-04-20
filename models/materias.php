<?php

class Materias
{
    protected $id;
    protected $id_grado_m;
    protected $materia;
    protected $indicadores;
    protected $icono;
    protected $asignada;
    protected $area;

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
    public function getIdGradoM()
    {
        return $this->id_grado_m;
    }

    /**
     * @param mixed $id_grado_m
     *
     * @return self
     */
    public function setIdGradoM($id_grado_m)
    {
        $this->id_grado_m = $id_grado_m;

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
    public function getIndicadores()
    {
        return $this->indicadores;
    }

    /**
     * @param mixed $indicadores
     *
     * @return self
     */
    public function setIndicadores($indicadores)
    {
        $this->indicadores = $indicadores;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcono()
    {
        return $this->icono;
    }

    /**
     * @param mixed $icono
     *
     * @return self
     */
    public function setIcono($icono)
    {
        $this->icono = $icono;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db
     *
     * @return self
     */
    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAsignada()
    {
        return $this->asignada;
    }

    /**
     * @param mixed $asignada
     *
     * @return self
     */
    public function setAsignada($asignada)
    {
        $this->asignada = $asignada;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     *
     * @return self
     */
    public function setArea($area)
    {
        $this->area = $area;

        return $this;
    }

    #mis metodos
    public function RegistrarMateria()
    {
        try {

            $materiaM = $this->getMateria();
            $indicadorM = $this->getIndicadores();
            $iconoM = $this->getIcono();
            $gradoM = $this->getIdGradoM();
            $asignacion = 'no';
            $areaS = $this->getArea();

            $registro = $this->db->prepare("INSERT INTO materia VALUES(null, :grado, :area, :nombre, :indicadores, :icono, :asignada)");
            $registro->bindParam(":grado", $gradoM, PDO::PARAM_INT);
            $registro->bindParam(":area", $areaS, PDO::PARAM_INT);
            $registro->bindParam(":nombre", $materiaM, PDO::PARAM_STR);
            $registro->bindParam(":indicadores", $indicadorM, PDO::PARAM_STR);
            $registro->bindParam(":icono", $iconoM, PDO::PARAM_STR);
            $registro->bindParam(':asignada', $asignacion, PDO::PARAM_STR);
            return $registro->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function allMaterias()
    {
        $grado = $this->getIdGradoM();
        $materias = $this->db->prepare("SELECT * FROM materia WHERE id_grado_mat = :grado");
        $materias->bindParam(":grado", $grado, PDO::PARAM_INT);
        $materias->execute();
        return $materias;
    }

    # seleccionar informacion de una sola materia (se utilizara en el controlador de notas)
    public function selectOneSubject()
    {
        $id_subject = $this->getMateria();
        $information = $this->db->prepare("SELECT * FROM materia WHERE id = :materia_id");
        $information->bindParam(":materia_id", $id_subject, PDO::PARAM_INT);
        $information->execute();
        return $information->fetchObject();
    }

    # Obtener el docente que va a dicar la mateia

    public function saveBaseSubject()
    {
        $subject = $this->getMateria();
        $iconoS = $this->getIcono();
        $areaS = $this->getArea();
        $base = $this->db->prepare("INSERT INTO materias_base VALUES(null, :area, :nombre, :icono)");
        $base->bindParam(":area", $areaS, PDO::PARAM_INT);
        $base->bindParam(":nombre", $subject, PDO::PARAM_STR);
        $base->bindParam(":icono", $iconoS, PDO::PARAM_STR);
        return $base->execute();
    }

    public function getAllBaseSubjectes()
    {
        $materia_area = $this->db->prepare("SELECT mb.*, a.color FROM materias_base mb
            INNER JOIN areas a ON a.id_area = mb.id_area_m
            ORDER BY a.id_area;");
        $materia_area->execute();
        return $materia_area;
    }

    public function deleteBaseSubject()
    {
        $id_base = $this->getArea();
        $delete = $this->db->prepare("DELETE FROM materias_base WHERE id_base = :id");
        $delete->bindParam(":id", $id_base, PDO::PARAM_INT);
        return $delete->execute();
    }

    # Metodo para obtener informacion de la materia actual
    public function subjectInformation()
    {
        $subject = $this->getMateria();
        $informacion = $this->db->prepare("SELECT m.nombre_mat, m.asignacion, a.nombre_area, d.nombre_d, d.apellidos_d, d.img, d.nombre_pregrado_d, d.correo_d FROM materia m
            INNER JOIN docentemateria dm ON dm.id_materia_doc = m.id
            INNER JOIN docente d ON  d.id = dm.id_docente_mat
            INNER JOIN areas a ON a.id_area = m.id_materia_area
            WHERE m.id = :materia");
        $informacion->bindParam(":materia", $subject, PDO::PARAM_INT);
        $informacion->execute();
        return $informacion->fetchObject();
    }

    # Metodo para obtener el estado del atributo asignacion de la tabla materia, para cambiarlo .
    public function seeAsignacionMateria($subject)
    {
        $asignacion = $this->db->prepare("SELECT asignacion FROM materia WHERE id = :id_materia");
        $asignacion->bindParam(":id_materia", $subject, PDO::PARAM_INT);
        $asignacion->execute();
        return $asignacion->fetchObject();
    }

    /*
    Metodo para resolver el siguiente problema: en un caso especifico la materia aparece como si estuviese asignada a un docente, esto no es verdad, la razón es porque en el pasado la materia le sí fue asignada a un docente, pero el docente fue eliminado de la plataforma y la materia quedo con el estado "asignada", este metodo le da la opcion al usuario administrativo para acutaliza el  estado para que la materia esté disponible para ser asignada a otro docente
     */
    public function updateAsignaiconMateria()
    {
        $id_materia = $this->getId();
        $asignacion = 'no';
        $actualizar = $this->db->prepare("UPDATE materia SET asignacion = :estado WHERE id = :materia");
        $actualizar->bindParam(":estado", $asignacion, PDO::PARAM_STR);
        $actualizar->bindParam(":materia", $id_materia, PDO::PARAM_INT);
        return $actualizar->execute();
    }

    # Eliminar una materia
    public function deleteSubject()
    {
        $subject = $this->getMateria();
        $eliminar = $this->db->prepare("DELETE FROM materia WHERE id = :materia");
        $eliminar->bindParam(":materia", $subject, PDO::PARAM_INT);
        return $eliminar->execute();
    }

    # Materias asignadas a un estudinte
    public function subjectStudent()
    {
        $estudiante = $this->getId();
        $materias = $this->db->prepare("SELECT m.* FROM materia m
            INNER JOIN estudiantemateria em ON em.id_materia_e = m.id
            INNER JOIN estudiante e ON e.id = em.id_estudiante_m
            WHERE e.id = :estudiante");
        $materias->bindParam(":estudiante", $estudiante, PDO::PARAM_INT);
        $materias->execute();
        return $materias;
    }

} # fin de la clase
