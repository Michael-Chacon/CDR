<?php

class Materias
{
    protected $id;
    protected $id_grado_m;
    protected $materia;
    protected $indicadores;
    protected $icono;
    protected $asignada;

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

    #mis metodos
    public function RegistrarMateria()
    {
        try {

            $materiaM = $this->getMateria();
            $indicadorM = $this->getIndicadores();
            $iconoM = $this->getIcono();
            $gradoM = $this->getIdGradoM();
            $asignacion = 'no';

            $registro = $this->db->prepare("INSERT INTO materia VALUES(null, :grado, :nombre, :indicadores, :icono, :asignada)");
            $registro->bindParam(":grado", $gradoM, PDO::PARAM_INT);
            $registro->bindParam(":nombre", $materiaM, PDO::PARAM_STR);
            $registro->bindParam(":indicadores", $indicadorM, PDO::PARAM_STR);
            $registro->bindParam(":icono", $iconoM, PDO::PARAM_STR);
            $registro->bindParam(':asignada', $asignacion, PDO::PARAM_STR);
            $registro->execute();
            return $registro;
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

} # fin de la clase
