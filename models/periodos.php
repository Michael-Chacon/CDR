<?php

class Periodos
{
    public $id;
    public $numero;
    public $fecha_inicio;
    public $fecha_fin;
    public $estado;
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
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     *
     * @return self
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    /**
     * @param mixed $fecha_inicio
     *
     * @return self
     */
    public function setFechaInicio($fecha_inicio)
    {
        $this->fecha_inicio = $fecha_inicio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    /**
     * @param mixed $fecha_fin
     *
     * @return self
     */
    public function setFechaFin($fecha_fin)
    {
        $this->fecha_fin = $fecha_fin;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    # validar que las fechas de los  nuevos periodos no se crucen con las fechas de periodos que ya existen.
    // public function ValidarFechas()
    // {
    //     $fin = $this->getFechaFin();
    //     $inicio = $this->getFechaInicio();

    //     #obtener la fecha final del ultimo periodo registrado
    //     $ultimo = $this->db->prepare("SELECT fecha_fin FROM periodo ORDER BY id DESC LIMIT 1");
    //     $ultimo->execute();
    //     $fecha = $ultimo->fetchObject()->fecha_fin;
    //     $fecha_final = date("Y-m-d", strtotime($fecha));

    //     # verificar que la fecha de inicio y fin del nuevo periodo son mayores quel la fecha final del ultimo periodo registrado.
    //     $fin_f = date("Y-m-d", strtotime($fin));
    //     $inicio_f = date("Y-m-d", strtotime($inicio));
    //     if ($inicio_f <= $fecha_final || $fin_f <= $fecha_final) {
    //         return false;
    //     } else {
    //         return true;
    //     }

    // }

    # registrar los periodos academicos
    public function guardarPeriodo()
    {
        $id_admin = $_SESSION['user']->id;
        $id = $this->getNumero();
        $inicio = $this->getFechaInicio();
        $fin = $this->getFechaFin();
        $est = $this->getEstado();
        $registro = $this->db->prepare("UPDATE periodo SET id_admin_periodo = :admin, fecha_inicio = :inicio, fecha_fin = :fin, estado = :estado WHERE id = :id");
        $registro->bindParam(":admin", $id_admin, PDO::PARAM_INT);
        $registro->bindParam(':id', $id, PDO::PARAM_INT);
        $registro->bindParam(':inicio', $inicio, PDO::PARAM_STR);
        $registro->bindParam(':fin', $fin, PDO::PARAM_STR);
        $registro->bindParam(':estado', $est, PDO::PARAM_STR);
        return $registro->execute();
    }

    # obtener todos los periodos academicos
    public function listar()
    {
        $periodos = $this->db->prepare("SELECT * FROM periodo");
        $periodos->execute();
        return $periodos;
    }

    # seleccionar solo un periodo academico
    public function onePeriodo()
    {
        $id_periodo = $this->getId();
        $info = $this->db->prepare("SELECT * FROM periodo WHERE id = :id");
        $info->bindParam(":id", $id_periodo, PDO::PARAM_INT);
        $info->execute();
        return $info->fetchObject();
    }

    public function periodoUno()
    {
        $uno = $this->db->prepare("SELECT * FROM periodo WHERE id = 1");
        $uno->execute();
        return $uno->fetchObject();
    }

    public function periodoDos()
    {
        $dos = $this->db->prepare("SELECT * FROM periodo WHERE id = 2");
        $dos->execute();
        return $dos->fetchObject();
    }

    public function periodoTres()
    {
        $tres = $this->db->prepare("SELECT * FROM periodo WHERE id = 3");
        $tres->execute();
        return $tres->fetchObject();
    }


} # fin de la clase
