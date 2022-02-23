<?php
class Notas
{
    private $id;
    private $materia;
    private $estudiante;
    private $periodo;
    private $item;
    private $nota;
    private $porcentaje;
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
    public function getEstudiante()
    {
        return $this->estudiante;
    }

    /**
     * @param mixed $estudiante
     *
     * @return self
     */
    public function setEstudiante($estudiante)
    {
        $this->estudiante = $estudiante;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     * @param mixed $periodo
     *
     * @return self
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param mixed $item
     *
     * @return self
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param mixed $nota
     *
     * @return self
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * @param mixed $porcentaje
     *
     * @return self
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    public function validatePercent()
    {
        try {
            $subject = $this->getMateria();
            $student = $this->getEstudiante();
            $porcent = $this->getPorcentaje();
            $validacion = $this->db->prepare("SELECT SUM(porcentaje) AS 'total' FROM notas WHERE id_materia_n = :materia AND id_estudiante_n = :estudiante");
            $validacion->bindParam(":materia", $subject, PDO::PARAM_INT);
            $validacion->bindParam(":estudiante", $student, PDO::PARAM_INT);
            $validacion->execute();
            $total = $validacion->fetchObject();
            $neto = $total->total + $porcent;
            if ($neto <= 100) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function registerNote()
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $period = $this->getPeriodo();
        $itemN = $this->getItem();
        $note = $this->getNota();
        $percent = $this->getPorcentaje();

        $register = $this->db->prepare("INSERT INTO notas VALUES(null, :materia, :estudiante, :periodo, :item, :nota, :percent)");
        $register->bindParam(":materia", $subject, PDO::PARAM_INT);
        $register->bindParam(":estudiante", $student, PDO::PARAM_INT);
        $register->bindParam(":periodo", $period, PDO::PARAM_INT);
        $register->bindParam(":item", $itemN, PDO::PARAM_STR);
        $register->bindParam(":nota", $note, PDO::PARAM_INT);
        $register->bindParam(":percent", $percent, PDO::PARAM_INT);
        return $register->execute();
    }

    # obtener todas los notas de un estudiante en el periodo uno
    public function notasPeriodo1()
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $periodoUno = $this->db->prepare("SELECT * FROM notas WHERE id_materia_n = :materia AND id_estudiante_n = :estudent AND id_periodo_n = 1");
        $periodoUno->bindParam(":materia", $subject, PDO::PARAM_INT);
        $periodoUno->bindParam(":estudent", $student, PDO::PARAM_INT);
        $periodoUno->execute();
        return $periodoUno;
    }

    public function notasPeriodo2()
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $periodoUno = $this->db->prepare("SELECT * FROM notas WHERE id_materia_n = :materia AND id_estudiante_n = :estudent AND id_periodo_n = 2");
        $periodoUno->bindParam(":materia", $subject, PDO::PARAM_INT);
        $periodoUno->bindParam(":estudent", $student, PDO::PARAM_INT);
        $periodoUno->execute();
        return $periodoUno;
    }
    public function notasPeriodo3()
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $periodoUno = $this->db->prepare("SELECT * FROM notas WHERE id_materia_n = :materia AND id_estudiante_n = :estudent AND id_periodo_n = 3");
        $periodoUno->bindParam(":materia", $subject, PDO::PARAM_INT);
        $periodoUno->bindParam(":estudent", $student, PDO::PARAM_INT);
        $periodoUno->execute();
        return $periodoUno;
    }
    public function notasPeriodo4()
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $periodoUno = $this->db->prepare("SELECT * FROM notas WHERE id_materia_n = :materia AND id_estudiante_n = :estudent AND id_periodo_n = 4");
        $periodoUno->bindParam(":materia", $subject, PDO::PARAM_INT);
        $periodoUno->bindParam(":estudent", $student, PDO::PARAM_INT);
        $periodoUno->execute();
        return $periodoUno;
    }

}
