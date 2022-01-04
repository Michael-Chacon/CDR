<?php

class Horario
{
    private $id;
    private $materia;
    private $dia;
    private $inicio;
    private $fin;

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
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * @param mixed $dia
     *
     * @return self
     */
    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInicio()
    {
        return $this->inicio;
    }

    /**
     * @param mixed $inicio
     *
     * @return self
     */
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * @param mixed $fin
     *
     * @return self
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    public function guardarHorario()
    {
        $matter = $this->getMateria();
        $day = $this->getDia();
        $star = $this->getInicio();
        $end = $this->getFin();
        $tabla = '';

        switch ($day) {
            case 'lunes':
                $tabla = 'lunes';
                break;
            case 'martes':
                $tabla = 'martes';
                break;
            case 'miercoles':
                $tabla = 'miercoles';
                break;
            case 'jueves':
                $tabla = 'jueves';
                break;
            case 'viernes':
                $tabla = 'viernes';
                break;
        }
        $registro = $this->db->prepare("INSERT INTO $tabla VALUES(null, :materia, :inicio, :fin);");
        $registro->bindParam(":materia", $matter, PDO::PARAM_INT);
        $registro->bindParam(":inicio", $star, PDO::PARAM_STR);
        $registro->bindParam(":fin", $end, PDO::PARAM_STR);
        $registro->execute();
        return $registro;
    }

    # metodos para obtener el horario de cada dia de la semana

    public function listarLunes($grado)
    {
        $lunes = $this->db->prepare("SELECT m.*, l.id AS 'dia', l.inicio, l.fin FROM materia m
                                                        INNER JOIN lunes l ON l.id_materia_lunes = m.id
                                                        WHERE m.id_grado_mat = :grado; ");
        $lunes->bindParam(":grado", $grado, PDO::PARAM_INT);
        $lunes->execute();
        return $lunes;
    }

    public function listarMartes($grado)
    {
        $martes = $this->db->prepare("SELECT m.*, mart.id AS 'dia', mart.inicio, mart.fin FROM materia m
                                                        INNER JOIN martes mart ON mart.id_materia_martes = m.id
                                                        WHERE m.id_grado_mat = :grado; ");
        $martes->bindParam(":grado", $grado, PDO::PARAM_INT);
        $martes->execute();
        return $martes;
    }

    public function listarMiercoles($grado)
    {
        $miercoles = $this->db->prepare("SELECT m.*, mier.id AS 'dia', mier.inicio, mier.fin FROM materia m
                                                        INNER JOIN miercoles mier ON mier.id_materia_miercoles = m.id
                                                        WHERE m.id_grado_mat = :grado; ");
        $miercoles->bindParam(":grado", $grado, PDO::PARAM_INT);
        $miercoles->execute();
        return $miercoles;
    }

    public function listarJueves($grado)
    {
        $jueves = $this->db->prepare("SELECT m.*, j.id AS 'dia', j.inicio, j.fin FROM materia m
                                                        INNER JOIN jueves j ON j.id_materia_jueves = m.id
                                                        WHERE m.id_grado_mat = :grado; ");
        $jueves->bindParam(":grado", $grado, PDO::PARAM_INT);
        $jueves->execute();
        return $jueves;
    }

    public function listarViernes($grado)
    {
        $viernes = $this->db->prepare("SELECT m.*, v.id AS 'dia', v.inicio, v.fin FROM materia m
                                                        INNER JOIN viernes v ON v.id_materia_viernes = m.id
                                                        WHERE m.id_grado_mat = :grado; ");
        $viernes->bindParam(":grado", $grado, PDO::PARAM_INT);
        $viernes->execute();
        return $viernes;
    }

    # eliminar el horario de una materia en un dia especifico
    public function deleteDay()
    {
        $id_hora = $this->getId();
        $nombre_dia = $this->getDia();
        $tabla = '';

        switch ($nombre_dia) {
            case 'lunes':
                $tabla = 'lunes';
                break;
            case 'martes':
                $tabla = 'martes';
                break;
            case 'miercoles':
                $tabla = 'miercoles';
                break;
            case 'jueves':
                $tabla = 'jueves';
                break;
            case 'viernes':
                $tabla = 'viernes';
                break;
        }

        $eliminar = $this->db->prepare("DELETE FROM $tabla WHERE id = :id");
        $eliminar->bindParam(":id", $id_hora, PDO::PARAM_INT);
        $eliminar->execute();
        return $eliminar;

    }
}
