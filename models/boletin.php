<?php
class Boletin
{
    private $id_boletin;
    private $id_estudiante;
    private $id_materia;
    private $area;
    private $id_periodo;
    private $materia;
    private $estudiante;
    private $docente;
    private $fallas;
    private $observacion;
    private $periodo1;
    private $periodo2;
    private $periodo3;
    private $promedio;
    private $recuperacion;

    public $db;
    public function __construct()
    {
        $this->db = Database::conectar();
    }

    /**
     * @return mixed
     */
    public function getIdBoletin()
    {
        return $this->id_boletin;
    }

    /**
     * @param mixed $id_boletin
     *
     * @return self
     */
    public function setIdBoletin($id_boletin)
    {
        $this->id_boletin = $id_boletin;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdMateria()
    {
        return $this->id_materia;
    }

    /**
     * @param mixed $id_materia
     *
     * @return self
     */
    public function setIdMateria($id_materia)
    {
        $this->id_materia = $id_materia;

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

    /**
     * @return mixed
     */
    public function getIdPeriodo()
    {
        return $this->id_periodo;
    }

    /**
     * @param mixed $id_periodo
     *
     * @return self
     */
    public function setIdPeriodo($id_periodo)
    {
        $this->id_periodo = $id_periodo;

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
    public function getDocente()
    {
        return $this->docente;
    }

    /**
     * @param mixed $docente
     *
     * @return self
     */
    public function setDocente($docente)
    {
        $this->docente = $docente;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFallas()
    {
        return $this->fallas;
    }

    /**
     * @param mixed $fallas
     *
     * @return self
     */
    public function setFallas($fallas)
    {
        $this->fallas = $fallas;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * @param mixed $observacion
     *
     * @return self
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriodo1()
    {
        return $this->periodo1;
    }

    /**
     * @param mixed $periodo1
     *
     * @return self
     */
    public function setPeriodo1($periodo1)
    {
        $this->periodo1 = $periodo1;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriodo2()
    {
        return $this->periodo2;
    }

    /**
     * @param mixed $periodo2
     *
     * @return self
     */
    public function setPeriodo2($periodo2)
    {
        $this->periodo2 = $periodo2;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriodo3()
    {
        return $this->periodo3;
    }

    /**
     * @param mixed $periodo3
     *
     * @return self
     */
    public function setPeriodo3($periodo3)
    {
        $this->periodo3 = $periodo3;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPromedio()
    {
        return $this->promedio;
    }

    /**
     * @param mixed $promedio
     *
     * @return self
     */
    public function setPromedio($promedio)
    {
        $this->promedio = $promedio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRecuperacion()
    {
        return $this->recuperacion;
    }

    /**
     * @param mixed $recuperacion
     *
     * @return self
     */
    public function setRecuperacion($recuperacion)
    {
        $this->recuperacion = $recuperacion;

        return $this;
    }
    /**
     * @return mixed
     */
    public function getIdEstudiante()
    {
        return $this->id_estudiante;
    }

    /**
     * @param mixed $id_estudiante
     *
     * @return self
     */
    public function setIdEstudiante($id_estudiante)
    {
        $this->id_estudiante = $id_estudiante;

        return $this;
    }

    # Guardar boletin de una materia
    public function saveBoletin()
    {
        try {
            $student_id = $this->getIdEstudiante();
            $subject_id = $this->getIdMateria();
            $area_id = $this->getArea();
            $period_id = $this->getIdPeriodo();
            $subject = $this->getMateria();
            $student = $this->getEstudiante();
            $teacher = $this->getDocente();
            $fails = $this->getFallas();
            $observation = $this->getObservacion();
            $avg = $this->getPromedio();
            $recuperacion_m = $this->getRecuperacion();
            $periodoUno = $this->getPeriodo1();
            $periodoDos = $this->getPeriodo2();
            $periodoTres = $this->getPeriodo3();

            $boletin = $this->db->prepare("INSERT INTO boletin VALUES(null, :e_id, :m_id, :a_id, :p_id, :materia, :student, :teacher, :observa, :recuperacion, :p1, :p2, :p3, :avg, :fail)");
            $boletin->bindParam(":e_id", $student_id, PDO::PARAM_INT);
            $boletin->bindParam(":m_id", $subject_id, PDO::PARAM_INT);
            $boletin->bindParam(":a_id", $area_id, PDO::PARAM_INT);
            $boletin->bindParam(":p_id", $period_id, PDO::PARAM_INT);
            $boletin->bindParam(":materia", $subject, PDO::PARAM_STR);
            $boletin->bindParam(":student", $student, PDO::PARAM_STR);
            $boletin->bindParam(":teacher", $teacher, PDO::PARAM_STR);
            $boletin->bindParam(":observa", $observation, PDO::PARAM_STR);
            $boletin->bindParam(":recuperacion", $recuperacion_m, PDO::PARAM_STR);
            $boletin->bindParam(":p1", $periodoUno, PDO::PARAM_INT);
            $boletin->bindParam(":p2", $periodoDos, PDO::PARAM_INT);
            $boletin->bindParam(":p3", $periodoTres, PDO::PARAM_INT);
            $boletin->bindParam(":avg", $avg, PDO::PARAM_INT);
            $boletin->bindParam(":fail", $fails, PDO::PARAM_INT);
            return $boletin->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    # metodo para hallar el puesto del estudiante en el grado
    public function calcularPuestoEstudiante($grado)
    {
        try {
            # Obtener todos los registros de promedios
            $periodo = Utils::validarPeriodoAcademico(date("Y-m-d"));
            $cunsultar_promedio = $this->db->prepare("SELECT * FROM promedioEstudiante WHERE id_grado_avg = :grado AND id_periodo_avg = :periodo ORDER BY promedio DESC");
            $cunsultar_promedio->bindParam(":grado", $grado, PDO::PARAM_INT);
            $cunsultar_promedio->bindParam(":periodo", $periodo, PDO::PARAM_INT);
            $cunsultar_promedio->execute();
            $c = 1;
            # guardar los puestos
            while ($orden = $cunsultar_promedio->fetchObject()) {
                $puesto = $c++;
                # vamos a ver si el estudiante tiene un registro en la tabla
                $consultar_puesto = $this->db->prepare("SELECT * FROM puestos WHERE id_estudiante_puesto = :student AND id_periodo_puesto = :period AND id_grado_puesto = :degree");
                $consultar_puesto->bindParam(":student", $orden->id_estudiante_avg, PDO::PARAM_INT);
                $consultar_puesto->bindParam(":period", $periodo, PDO::PARAM_INT);
                $consultar_puesto->bindParam(":degree", $orden->id_grado_avg, PDO::PARAM_INT);
                $consultar_puesto->execute();

                if ($consultar_puesto->rowCount() == 0) {
                    $registrar_puesto = $this->db->prepare("INSERT INTO puestos VALUES (null, :es, :pe, :gra, :puesto, CURDATE(), CURTIME())");
                    $registrar_puesto->bindParam(":es", $orden->id_estudiante_avg, PDO::PARAM_INT);
                    $registrar_puesto->bindParam(":pe", $periodo, PDO::PARAM_INT);
                    $registrar_puesto->bindParam(":gra", $orden->id_grado_avg, PDO::PARAM_INT);
                    $registrar_puesto->bindParam(":puesto", $puesto, PDO::PARAM_INT);
                    $registrar_puesto->execute();
                } else {
                    $actualizar_puesto = $this->db->prepare("UPDATE  puestos SET puesto = :puesto, fecha = CURDATE(), hora = CURTIME() WHERE  id_estudiante_puesto = :es AND id_periodo_puesto = :pe AND id_grado_puesto = :gra");
                    $actualizar_puesto->bindParam(":puesto", $puesto, PDO::PARAM_INT);
                    $actualizar_puesto->bindParam(":es", $orden->id_estudiante_avg, PDO::PARAM_INT);
                    $actualizar_puesto->bindParam(":pe", $periodo, PDO::PARAM_INT);
                    $actualizar_puesto->bindParam(":gra", $orden->id_grado_avg, PDO::PARAM_INT);
                    $actualizar_puesto->execute();
                }
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    # Seleccionar las notas de todas las materias de un estudiante para generar el boletín por periodos
    public function generarBoletin()
    {
        $student = $this->getIdEstudiante();
        $periodo_id = $this->getIdPeriodo();
        $boletin = $this->db->prepare("SELECT * FROM boletin WHERE id_estudiante_boletin = :estudiante AND id_periodo_boletin = :periodo ORDER BY id_area_boletin");
        $boletin->bindParam(":estudiante", $student, PDO::PARAM_INT);
        $boletin->bindParam(":periodo", $periodo_id, PDO::PARAM_INT);
        $boletin->execute();
        return $boletin;
    }

    # ver el puesto y el promedio del estudiante en x periodo

    public function puestoPromedioPeriodo1()
    {
        $estudiante_id = $this->getIdEstudiante();
        // $periodo_id = 1;
        $datos = $this->db->prepare("SELECT pe.promedio, p.puesto FROM promedioestudiante pe
            INNER JOIN estudiante e ON e.id = pe.id_estudiante_avg
            INNER JOIN puestos p ON p.id_estudiante_puesto = e.id
            WHERE e.id = :estudiante AND p.id_periodo_puesto = 1 AND id_periodo_avg = 1");
        $datos->bindParam(":estudiante", $estudiante_id, PDO::PARAM_INT);
        $datos->execute();
        return $datos->fetchObject();
    }

    public function puestoPromedioPeriodo2()
    {
        $estudiante_id = $this->getIdEstudiante();
        $periodo_id = 2;
        $datos = $this->db->prepare("SELECT pe.promedio, p.puesto FROM promedioestudiante pe
            INNER JOIN estudiante e ON e.id = pe.id_estudiante_avg
            INNER JOIN puestos p ON p.id_estudiante_puesto = e.id
            WHERE e.id = :estudiante AND p.id_periodo_puesto = $periodo_id AND id_periodo_avg = $periodo_id;");
        $datos->bindParam(":estudiante", $estudiante_id, PDO::PARAM_INT);
        $datos->execute();
        return $datos->fetchObject();
    }

    public function puestoPromedioPeriodo3()
    {
        $estudiante_id = $this->getIdEstudiante();
        $periodo_id = 3;
        $datos = $this->db->prepare("SELECT pe.promedio, p.puesto FROM promedioestudiante pe
            INNER JOIN estudiante e ON e.id = pe.id_estudiante_avg
            INNER JOIN puestos p ON p.id_estudiante_puesto = e.id
            WHERE e.id = :estudiante AND p.id_periodo_puesto = $periodo_id AND id_periodo_avg = $periodo_id;");
        $datos->bindParam(":estudiante", $estudiante_id, PDO::PARAM_INT);
        $datos->execute();
        return $datos->fetchObject();
    }

    # Metodo para ver cuantas materias perdio un estudiante
    public function materiasPerdidasPeriodo1()
    {
        $estudiante_id = $this->getIdEstudiante();
        $perdidas = $this->db->prepare("SELECT COUNT(id_nota) AS 'perdidas1' FROM notasdefinitivas
            WHERE id_estudiante_nd = :estudiante AND id_periodo_nd = 1 AND nota_definitiva < 30");
        $perdidas->bindParam(":estudiante", $estudiante_id, PDO::PARAM_INT);
        $perdidas->execute();
        return $perdidas->fetchObject();
    }

    public function materiasPerdidasPeriodo2()
    {
        $estudiante_id = $this->getIdEstudiante();
        $perdidas = $this->db->prepare("SELECT COUNT(id_nota) AS 'perdidas1' FROM notasdefinitivas
            WHERE id_estudiante_nd = :estudiante AND id_periodo_nd = 2 AND nota_definitiva < 30");
        $perdidas->bindParam(":estudiante", $estudiante_id, PDO::PARAM_INT);
        $perdidas->execute();
        return $perdidas->fetchObject();
    }

    public function materiasPerdidasPeriodo3()
    {
        $estudiante_id = $this->getIdEstudiante();
        $perdidas = $this->db->prepare("SELECT COUNT(id_nota) AS 'perdidas1' FROM notasdefinitivas
            WHERE id_estudiante_nd = :estudiante AND id_periodo_nd = 3 AND nota_definitiva < 30");
        $perdidas->bindParam(":estudiante", $estudiante_id, PDO::PARAM_INT);
        $perdidas->execute();
        return $perdidas->fetchObject();
    }

    # Calcular el total de fallas por periodo
    public function totolFallasPeriodo1()
    {
        $student = $this->getIdEstudiante();
        $fallas = $this->db->prepare("SELECT COUNT(f.id) AS 'total' FROM falla f
            INNER JOIN estudiante e ON e.id = f.id_estudiante_f
            WHERE e.id = :student AND f.id_periodo_f = 1");
        $fallas->bindParam(":student", $student, PDO::PARAM_INT);
        $fallas->execute();
        return $fallas->fetchObject();
    }

     public function totolFallasPeriodo2()
    {
        $student = $this->getIdEstudiante();
        $fallas = $this->db->prepare("SELECT COUNT(f.id) AS 'total' FROM falla f
            INNER JOIN estudiante e ON e.id = f.id_estudiante_f
            WHERE e.id = :student AND f.id_periodo_f = 2");
        $fallas->bindParam(":student", $student, PDO::PARAM_INT);
        $fallas->execute();
        return $fallas->fetchObject();
    }

     public function totolFallasPeriodo3()
    {
        $student = $this->getIdEstudiante();
        $fallas = $this->db->prepare("SELECT COUNT(f.id) AS 'total' FROM falla f
            INNER JOIN estudiante e ON e.id = f.id_estudiante_f
            WHERE e.id = :student AND f.id_periodo_f = 3");
        $fallas->bindParam(":student", $student, PDO::PARAM_INT);
        $fallas->execute();
        return $fallas->fetchObject();
    }

    # Metodo para obtener datos del director de grado, del grado y del estudiante
    public function datosDocenteEstudianteGrado($grado)
    {
        $estudiante_id = $this->getIdEstudiante();
        $datos = $this->db->prepare("SELECT e.nombre_e, e.apellidos_e, e.img AS 'photo', do.nombre_d, do.apellidos_d, do.img, g.nombre_g FROM director d
            INNER JOIN docente do ON do.id = d.id_docente_dir
            INNER JOIN grado g ON g.id = d.id_grado_dir
            INNER JOIN estudiante e ON e.id_gradoE = g.id
            WHERE e.id = :estudiante AND g.id= :grado;");
        $datos->bindParam(":estudiante", $estudiante_id, PDO::PARAM_INT);
        $datos->bindParam(":grado", $grado, PDO::PARAM_INT);
        $datos->execute();
        return $datos->fetchObject();
    }

} # fin de la clase
