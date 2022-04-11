<?php

class Asignaciones
{
    private $id;
    private $grados;
    private $id_docente;
    private $materia;
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
    public function getGrados()
    {
        return $this->grados;
    }

    /**
     * @param mixed $grados
     *
     * @return self
     */
    public function setGrados($grados)
    {
        $this->grados = $grados;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdDocente()
    {
        return $this->id_docente;
    }

    /**
     * @param mixed $id_docente
     *
     * @return self
     */
    public function setIdDocente($id_docente)
    {
        $this->id_docente = $id_docente;

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

    public function guardarGrados()
    {
        $id_grados = $this->getGrados();
        $docente = $this->getIdDocente();
        foreach ($id_grados as $grado) {
            $registro = $this->db->prepare("INSERT INTO gradodocente  VALUES(:grado, :docente)");
            $registro->bindParam(':grado', $grado, PDO::PARAM_INT);
            $registro->bindParam(':docente', $docente, PDO::PARAM_INT);
            $registro->execute();
        }
        return $registro;
    }

    # Obtener los grados que se le asigno a cada docente
    public function docenteGrados()
    {
        $docente = $this->getIdDocente();
        $grados = $this->db->prepare("
            SELECT g.*, a.nombre FROM grado g
            INNER JOIN gradodocente gd ON g.id = gd.id_grado_d
            INNER JOIN docente d ON d.id = gd.id_docente_g
            INNER JOIN aulagrado ag ON ag.id_grado_aula = g.id
            INNER JOIN aulas a ON a.id_aula = ag.id_aula_grado
            WHERE d.id = :docente ORDER BY g.id ASC;
            ");
        $grados->bindParam(':docente', $docente, PDO::PARAM_INT);
        $grados->execute();
        return $grados;
    }

    # Eliminar grados que ya fueron asignados al docente
    public function EliminiarAsignacionDGrado()
    {
        try {

            $grados = $this->getGrados();
            $teacher = $this->getIdDocente();
            foreach ($grados as $grado) {
                $eliminar = $this->db->prepare("DELETE FROM gradodocente WHERE id_grado_d = :grado AND id_docente_g = :docente");
                $eliminar->bindParam(":grado", $grado, PDO::PARAM_INT);
                $eliminar->bindParam(":docente", $teacher, PDO::PARAM_INT);
                $eliminar->execute();
            }
            return $eliminar;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    # obtener las mateiras de un grado determinado que previamente se le asigno al docente
    public function gradoMaterias()
    {
        $grado = $this->getGrados();
        $docente = $this->getIdDocente();
        $materias = $this->db->prepare("
            SELECT m.*  FROM gradodocente gd
            INNER JOIN docente d ON d.id = gd.id_docente_g
            INNER JOIN grado g ON g.id = gd.id_grado_d
            INNER JOIN materia m ON m.id_grado_mat =  gd.id_grado_d
            WHERE g.id = :grado AND d.id = :docente AND m.asignacion = 'no';
            ");
        $materias->bindParam(':grado', $grado, PDO::PARAM_INT);
        $materias->bindParam(':docente', $docente, PDO::PARAM_INT);
        $materias->execute();
        return $materias;
    } # metodo

    # guardar las materias que se le asignaron al docente
    public function docenteMateria()
    {
        $materias = $this->getMateria();
        $docente = $this->getIdDocente();
        foreach ($materias as $valor) {
            $registrar = $this->db->prepare("INSERT INTO docentemateria VALUES(:docente, :materia)");
            $registrar->bindParam(':docente', $docente, PDO::PARAM_INT);
            $registrar->bindParam(':materia', $valor, PDO::PARAM_INT);
            $registrar->execute();
        }
        return $registrar;
    }

    # obtener las materias que le asignaron ha un docente en determindado grado
    public function materiasAsignadas()
    {
        try {
            $docente = $this->getIdDocente();
            $grado = $this->getGrados();

            $materias = $this->db->prepare("
                SELECT m.id AS 'id_materia', m.icono, m.nombre_mat, g.* FROM docentemateria dm
                INNER JOIN docente d ON d.id = dm.id_docente_mat
                INNER JOIN materia m ON m.id = dm.id_materia_doc
                INNER JOIN grado g ON g.id = m.id_grado_mat
                WHERE d.id = :docente AND g.id = :grado;
                ");
            $materias->bindParam(':docente', $docente, PDO::PARAM_INT);
            $materias->bindParam(':grado', $grado, PDO::PARAM_INT);
            $materias->execute();
            return $materias;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function cambiarEstadoAsignacion($estado)
    {
        try {

            $materias_seleccionadas = $this->getMateria();
            if ($estado) {
                $estado = 'si';
            } else {
                $estado = 'no';
            }
            foreach ($materias_seleccionadas as $id) {
                $asignacion = $this->db->prepare("UPDATE materia SET asignacion= :estado WHERE id = :id_materia");
                $asignacion->bindParam(':estado', $estado, PDO::PARAM_STR);
                $asignacion->bindParam(':id_materia', $id, PDO::PARAM_INT);
                $asignacion->execute();
            }
            return $asignacion;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    # eliminar las asignaciones de materias a docentes
    public function eliminarAsignacionMaterias()
    {
        try {

            $mate = $this->getMateria();
            $docente = $this->getIdDocente();
            foreach ($mate as $materia_id) {
                $eliminar = $this->db->prepare("DELETE FROM docentemateria WHERE id_docente_mat = :docente AND id_materia_doc = :materia");
                $eliminar->bindParam(":docente", $docente, PDO::PARAM_INT);
                $eliminar->bindParam(":materia", $materia_id, PDO::PARAM_INT);
                $eliminar->execute();
            }
            return $eliminar;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

} # fin de la clase
