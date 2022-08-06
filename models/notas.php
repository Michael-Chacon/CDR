<?php
class Notas
{
    protected $id;
    protected $materia;
    protected $estudiante;
    protected $periodo;
    protected $item;
    protected $nota;
    protected $porcentaje;
    protected $cognitivo;
    protected $evaluacion;
    protected $trimestral;
    protected $procedimental;
    protected $Tindividual;
    protected $Tcolaborativo;
    protected $actitudinal;
    protected $apreciativa;
    protected $autoevaluacion;
    protected $promedio;
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

    /**
     * @return mixed
     */
    public function getCognitivo()
    {
        return $this->cognitivo;
    }

    /**
     * @param mixed $cognitivo
     *
     * @return self
     */
    public function setCognitivo($cognitivo)
    {
        $this->cognitivo = $cognitivo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEvaluacion()
    {
        return $this->evaluacion;
    }

    /**
     * @param mixed $evaluacion
     *
     * @return self
     */
    public function setEvaluacion($evaluacion)
    {
        $this->evaluacion = $evaluacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrimestral()
    {
        return $this->trimestral;
    }

    /**
     * @param mixed $trimestral
     *
     * @return self
     */
    public function setTrimestral($trimestral)
    {
        $this->trimestral = $trimestral;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getProcedimental()
    {
        return $this->procedimental;
    }

    /**
     * @param mixed $procedimental
     *
     * @return self
     */
    public function setProcedimental($procedimental)
    {
        $this->procedimental = $procedimental;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTindividual()
    {
        return $this->Tindividual;
    }

    /**
     * @param mixed $Tindividual
     *
     * @return self
     */
    public function setTindividual($Tindividual)
    {
        $this->Tindividual = $Tindividual;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTcolaborativo()
    {
        return $this->Tcolaborativo;
    }

    /**
     * @param mixed $Tcolaborativo
     *
     * @return self
     */
    public function setTcolaborativo($Tcolaborativo)
    {
        $this->Tcolaborativo = $Tcolaborativo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getActitudinal()
    {
        return $this->actitudinal;
    }

    /**
     * @param mixed $actitudinal
     *
     * @return self
     */
    public function setActitudinal($actitudinal)
    {
        $this->actitudinal = $actitudinal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApreciativa()
    {
        return $this->apreciativa;
    }

    /**
     * @param mixed $apreciativa
     *
     * @return self
     */
    public function setApreciativa($apreciativa)
    {
        $this->apreciativa = $apreciativa;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAutoevaluacion()
    {
        return $this->autoevaluacion;
    }

    /**
     * @param mixed $autoevaluacion
     *
     * @return self
     */
    public function setAutoevaluacion($autoevaluacion)
    {
        $this->autoevaluacion = $autoevaluacion;

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

    # Metodo para registrar las notas de x actividad a un estudiatne.
    public function saveAllNotes($estudiante, $materia, $periodo, $criterio, $notas, $actividad)
    {
        $nota = $this->db->prepare("INSERT INTO $actividad VALUES(null, :estudiante, :materia, :periodo, :criterio, :nota)");
        $nota->bindParam(":estudiante", $estudiante, PDO::PARAM_INT);
        $nota->bindParam(":materia", $materia, PDO::PARAM_INT);
        $nota->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $nota->bindParam(":criterio", $criterio, PDO::PARAM_INT);
        $nota->bindParam(":nota", $notas, PDO::PARAM_INT);
        return $nota->execute();
    }

    /*
    Lo siguientes 6 metodos seleccionan la informacion de  todas las actividades (evaluaciones, trimestrales, trabajos individuales y colaborativos,  apreciativa, y autoevaluaciones)  por separado.
    - Los metodos estan desarrollados de esta forma porque necesito tener los datos de las actividades por separado, para consultar la informacion de los 3 periodos academicos solo variando el parametro periodo.
     */
    public function notaEvaluacionPeriodox($periodo)
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $evaluacion = $this->db->prepare("SELECT  * FROM evaluacion
            WHERE id_estudiante_e = :student AND id_materia_e = :materia AND id_periodo_e = :periodo;");
        $evaluacion->bindParam(":materia", $subject, PDO::PARAM_INT);
        $evaluacion->bindParam(":student", $student, PDO::PARAM_INT);
        $evaluacion->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $evaluacion->execute();
        return $evaluacion->fetchObject();
    }

    public function notaTrimestralPeriodox($periodo)
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $trimestral = $this->db->prepare("SELECT  * FROM trimestral
            WHERE id_estudiante_t = :student AND id_materia_t = :materia AND id_periodo_t = :periodo;");
        $trimestral->bindParam(":materia", $subject, PDO::PARAM_INT);
        $trimestral->bindParam(":student", $student, PDO::PARAM_INT);
        $trimestral->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $trimestral->execute();
        return $trimestral->fetchObject();
    }

    public function notaTindividualPeriodox($periodo)
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $individual = $this->db->prepare("SELECT * FROM tindividual
            WHERE id_estudiante_Tindividual = :student AND id_materia_Tindividual = :materia AND id_periodo_Tindividual = :periodo;");
        $individual->bindParam(":materia", $subject, PDO::PARAM_INT);
        $individual->bindParam(":student", $student, PDO::PARAM_INT);
        $individual->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $individual->execute();
        return $individual->fetchObject();
    }

    public function notaTcolaborativoPeriodox($periodo)
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $colaborativo = $this->db->prepare("SELECT * FROM tcolaborativo t
            WHERE id_estudiante_Tcolaborativo = :student AND id_materia_Tcolaborativo = :materia AND id_periodo_Tcolaborativo = :periodo;");
        $colaborativo->bindParam(":materia", $subject, PDO::PARAM_INT);
        $colaborativo->bindParam(":student", $student, PDO::PARAM_INT);
        $colaborativo->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $colaborativo->execute();
        return $colaborativo->fetchObject();
    }

    public function notaApreciativaPeriodox($periodo)
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $apreciativa = $this->db->prepare("SELECT * FROM apreciativa
            WHERE id_estudiante_apreciativa = :student AND id_materia_apreciativa = :materia AND id_periodo_apreciativa = :periodo;");
        $apreciativa->bindParam(":materia", $subject, PDO::PARAM_INT);
        $apreciativa->bindParam(":student", $student, PDO::PARAM_INT);
        $apreciativa->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $apreciativa->execute();
        return $apreciativa->fetchObject();
    }

    public function notaAutoevaluacionPeriodox($periodo)
    {
        $subject = $this->getMateria();
        $student = $this->getEstudiante();
        $autoevaluacion = $this->db->prepare("SELECT * FROM autoevaluacion a
            WHERE id_estudiante_autoevaluacion = :student AND id_materia_autoevaluacion = :materia AND id_periodo_autoevaluacion = :periodo;");
        $autoevaluacion->bindParam(":materia", $subject, PDO::PARAM_INT);
        $autoevaluacion->bindParam(":student", $student, PDO::PARAM_INT);
        $autoevaluacion->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $autoevaluacion->execute();
        return $autoevaluacion->fetchObject();
    }

    /*
    En los siguientes 3 metodos obtengo los porcentajes de los 3 criterios academicos junto a los porcetajes de sus actividades, para hallar las notas definitvas
     */
    public function dataCognitivo()
    {
        $cognitivo = $this->db->prepare("SELECT * FROM cognitivo");
        $cognitivo->execute();
        return $cognitivo->fetchObject();
    }

    public function dataProcedimental()
    {
        $procedimental = $this->db->prepare("SELECT * FROM procedimental");
        $procedimental->execute();
        return $procedimental->fetchObject();
    }

    public function dataActitudinal()
    {
        $actitudinal = $this->db->prepare("SELECT * FROM actitudinal");
        $actitudinal->execute();
        return $actitudinal->fetchObject();
    }

    /*
    Los siguientes 3 metodos tienen la función de actualizar los porcetajes de los 3 criterios de evaluacion "cognitivo, procedimental y actitudinal".
     */
    public function updateCognitivo()
    {
        $criterio_cognitivo = $this->getCognitivo();
        $evaluaciones = $this->getEvaluacion();
        $trimestrales = $this->getTrimestral();

        $validacion = $this->db->prepare('SELECT * FROM cognitivo');
        $validacion->execute();
        $resultado = $validacion->rowCount();

        if ($resultado == 0) {
            $actualizacion = $this->db->prepare('INSERT INTO cognitivo VALUES(null, :cognitivo, :evaluacion, :trimestral)');
        } else {
            $actualizacion = $this->db->prepare("UPDATE cognitivo SET porcentaje_cognitivo = :cognitivo, porcentaje_evaluacion = :evaluacion, porcentaje_trimestral = :trimestral");
        }

        $actualizacion->bindParam(":cognitivo", $criterio_cognitivo, PDO::PARAM_INT);
        $actualizacion->bindParam(":evaluacion", $evaluaciones, PDO::PARAM_INT);
        $actualizacion->bindParam(":trimestral", $trimestrales, PDO::PARAM_INT);
        return $actualizacion->execute();
    }

    public function updateProcedimental()
    {
        $criterio_procedimental = $this->getProcedimental();
        $individual = $this->getTindividual();
        $colaborativo = $this->getTcolaborativo();

        $validacion = $this->db->prepare('SELECT * FROM procedimental');
        $validacion->execute();
        $resultado = $validacion->rowCount();

        if ($resultado == 0) {
            $actualizacion = $this->db->prepare('INSERT INTO procedimental VALUES(null, :procedimental, :individual, :colaborativo)');
        } else {
            $actualizacion = $this->db->prepare("UPDATE procedimental SET porcentaje_procedimental = :procedimental, porcentaje_Tindividual = :individual, porcentaje_Tcolaborativo = :colaborativo");
        }
        $actualizacion->bindParam(":procedimental", $criterio_procedimental, PDO::PARAM_INT);
        $actualizacion->bindParam(":individual", $individual, PDO::PARAM_INT);
        $actualizacion->bindParam(":colaborativo", $colaborativo, PDO::PARAM_INT);
        return $actualizacion->execute();
    }

    public function updateActitudinal()
    {
        $criterio_atitudinal = $this->getActitudinal();
        $apreciativas = $this->getApreciativa();
        $autoevaluaciones = $this->getAutoevaluacion();

        $validacion = $this->db->prepare('SELECT * FROM actitudinal');
        $validacion->execute();
        $resultado = $validacion->rowCount();

        if ($resultado == 0) {
            $actualizacion = $this->db->prepare("INSERT INTO actitudinal VALUES(null, :actitudinal, :apreciativas, :autoevaluacion)");
        } else {
            $actualizacion = $this->db->prepare("UPDATE actitudinal SET porcentaje_actitudinal = :actitudinal, porcentaje_apreciativa = :apreciativas, porcentaje_autoevaluacion = :autoevaluacion");
        }

        $actualizacion->bindParam(":actitudinal", $criterio_atitudinal, PDO::PARAM_INT);
        $actualizacion->bindParam(":apreciativas", $apreciativas, PDO::PARAM_INT);
        $actualizacion->bindParam(":autoevaluacion", $autoevaluaciones, PDO::PARAM_INT);
        return $actualizacion->execute();
    }

    # metodo para allar promedio de las notas agrupadas por criterios
    public function calcularNota($nota1, $actividad1, $nota2, $actividad2, $criterio)
    {
        $notaActividad1 = ($actividad1 / $criterio) * $nota1;
        $notaActividad2 = ($actividad2 / $criterio) * $nota2;
        $resultado_criterio = $notaActividad1 + $notaActividad2;
        $definitiva = ($criterio / 100) * $resultado_criterio;
        $notas = array($resultado_criterio, $definitiva);
        return $notas;
    }

    # Metodo para sumar las notas de los 3 criterios evaluativos y asi hallar la nota definitiva de un periodo.
    public function definitivaPerido($uno, $dos, $tres)
    {
        return $uno + $dos + $tres;
    }

    # Metodo para validar que solo se ingrese una nota por periodo en cada actividad
    public function justANote($estudiante, $nota, $materia, $periodo, $actividad)
    {
        switch ($actividad) {
            case 'evaluacion':
                $db_estudiante = 'id_estudiante_e';
                $db_materia = 'id_materia_e';
                $db_periodo = 'id_periodo_e';
                break;
            case 'trimestral':
                $db_estudiante = 'id_estudiante_t';
                $db_materia = 'id_materia_t';
                $db_periodo = 'id_periodo_t';
                break;
            case 'tindividual':
                $db_estudiante = 'id_estudiante_Tindividual';
                $db_materia = 'id_materia_Tindividual';
                $db_periodo = 'id_periodo_Tindividual';
                break;
            case 'tcolaborativo':
                $db_estudiante = 'id_estudiante_Tcolaborativo';
                $db_materia = 'id_materia_Tcolaborativo';
                $db_periodo = 'id_periodo_Tcolaborativo';
                break;
            case 'apreciativa':
                $db_estudiante = 'id_estudiante_apreciativa';
                $db_materia = 'id_materia_apreciativa';
                $db_periodo = 'id_periodo_apreciativa';
                break;
            case 'autoevaluacion':
                $db_estudiante = 'id_estudiante_autoevaluacion';
                $db_materia = 'id_materia_autoevaluacion';
                $db_periodo = 'id_periodo_autoevaluacion';
                break;
        }
        $validacion = $this->db->prepare("SELECT * FROM $actividad WHERE $db_estudiante = :estudiante AND $db_materia = :materia AND $db_periodo = :periodo");
        $validacion->bindParam(":estudiante", $estudiante, PDO::PARAM_INT);
        $validacion->bindParam(":materia", $materia, PDO::PARAM_INT);
        $validacion->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $validacion->execute();
        $resultado = $validacion;
        if ($resultado->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }

    # Metodo para eliminar la nota de una actividad
    public function deleteNote()
    {
        $actividad = $this->getItem();
        $ide = $this->getId();

        switch ($actividad) {
            case 'evaluacion':
                $name_id = 'id_evaluacion';
                break;
            case 'trimestral':
                $name_id = 'id_trimestral';
                break;
            case 'tindividual':
                $name_id = 'id_Tindividual';
                break;
            case 'tcolaborativo':
                $name_id = 'id_Tcolaborativo';
                break;
            case 'apreciativa':
                $name_id = 'id_apreciativa';
                break;
            case 'autoevaluacion':
                $name_id = 'id_autoevaluacion';
                break;
        }
        $eliminar = $this->db->prepare("DELETE  FROM $actividad WHERE $name_id = :id");
        $eliminar->bindParam(":id", $ide, PDO::PARAM_INT);
        return $eliminar->execute();
    }

# Metodo para mantener acualizada la nota definitiva de una materia
    public function updateFinalNote($periodo)
    {
        try {
            $student = $this->getEstudiante();
            $subject = $this->getMateria();
            $note = $this->getNota();
            # Verificando si existe  nota o no.
            $existe = $this->db->prepare("SELECT  * FROM notasdefinitivas WHERE id_estudiante_nd = :estudiante AND id_materia_nd= :materia AND id_periodo_nd = :periodo");
            $existe->bindParam(":estudiante", $student, PDO::PARAM_INT);
            $existe->bindParam(":materia", $subject, PDO::PARAM_INT);
            $existe->bindParam(":periodo", $periodo, PDO::PARAM_INT);
            $existe->execute();
            $total_resultado = $existe;

            if ($total_resultado->rowCount() == 0) {
                # Sí no existe nota, entonces se registra
                $registrar = $this->db->prepare("INSERT INTO notasdefinitivas VALUES(null, :id_estudiante, :id_materia, :id_periodo, :nota, CURDATE(), CURTIME())");
                $registrar->bindParam(":id_estudiante", $student, PDO::PARAM_INT);
                $registrar->bindParam(":id_materia", $subject, PDO::PARAM_INT);
                $registrar->bindParam(":id_periodo", $periodo, PDO::PARAM_INT);
                $registrar->bindParam(":nota", $note, PDO::PARAM_INT);
                $registrar->execute();
            } else {
                # Sí ya existe nota, entonce se actualiza con la nueva nota cálculada
                $actualizar = $this->db->prepare("UPDATE notasdefinitivas SET nota_definitiva = :definitiva, fecha = CURDATE(), hora = CURTIME() WHERE id_estudiante_nd = :id_estudiante AND id_materia_nd = :id_materia AND id_periodo_nd = :id_periodo");
                $actualizar->bindParam(":id_estudiante", $student, PDO::PARAM_INT);
                $actualizar->bindParam(":id_materia", $subject, PDO::PARAM_INT);
                $actualizar->bindParam(":id_periodo", $periodo, PDO::PARAM_INT);
                $actualizar->bindParam(":definitiva", $note, PDO::PARAM_INT);
                $actualizar->execute();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    # Metodo para obtener la notas definitivas de todos los estudiantes de x materia
    public function listadoNotasDefinitvasXMateria()
    {
        $id_grado = $this->getId();
        $id_materia = $this->getMateria();
        $hoy = date("Y-m-d");
        $periodo = Utils::validarPeriodoAcademico($hoy);
        $listado = $this->db->prepare("SELECT e.nombre_e, e.apellidos_e, nd.nota_definitiva FROM estudiante e
            INNER JOIN notasdefinitivas nd ON nd.id_estudiante_nd = e.id
            INNER JOIN materia m ON m.id = nd.id_materia_nd
            WHERE e.id_gradoE = :grado AND m.id = :materia AND id_periodo_nd = :periodo
            ORDER BY nd.nota_definitiva DESC");
        $listado->bindParam(":grado", $id_grado, PDO::PARAM_INT);
        $listado->bindParam(":materia", $id_materia, PDO::PARAM_INT);
        $listado->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $listado->execute();
        return $listado;
    }

    /* Metodo para calcular y acutalizar el promedio general de un estudiante, este metodo se ejecuta
    cuando un docente realiza alcugan accion (eliminar o registrar) sobre las notas de un estudiante.
     */
    public function promedioEstudiante()
    {
        try {
            $id_estudiante = $this->getEstudiante();
            $id_periodo = $this->getPeriodo();
            $id_grado = $this->getId();
            # Validar si existen notas para generar el promedio
            $consultar_promedio = $this->db->prepare("SELECT * FROM promedioEstudiante WHERE id_estudiante_avg = :id_student AND id_periodo_avg = :id_period");
            $consultar_promedio->bindParam(":id_student", $id_estudiante, PDO::PARAM_INT);
            $consultar_promedio->bindParam(":id_period", $id_periodo, PDO::PARAM_INT);
            $consultar_promedio->execute();

            if ($consultar_promedio->rowCount() == 0) {
                # Sí no existen notas entonces se registra 0 en el promedio del estudiante
                $insertar_promedio = $this->db->prepare("INSERT INTO promedioEstudiante values(null, :estudiante, :periodo, :grado, 0)");
                $insertar_promedio->bindParam(":estudiante", $id_estudiante, PDO::PARAM_INT);
                $insertar_promedio->bindParam(":periodo", $id_periodo, PDO::PARAM_INT);
                $insertar_promedio->bindParam(":grado", $id_grado, PDO::PARAM_INT);
                $insertar_promedio->execute();

            } else {
                # Sí existen notas definitivas entonces se calcula el promedio general del estudiante con las notas que existen
                $calcular_promedio = $this->db->prepare("SELECT AVG(nd.nota_definitiva) AS 'promedio' FROM notasdefinitivas nd
                    INNER JOIN estudiante e ON e.id = nd.id_estudiante_nd
                    INNER JOIN periodo p ON p.id = nd.id_periodo_nd
                    WHERE e.id = :estudiante AND p.id = :periodo;");
                $calcular_promedio->bindParam(":estudiante", $id_estudiante, PDO::PARAM_INT);
                $calcular_promedio->bindParam(":periodo", $id_periodo, PDO::PARAM_INT);
                $calcular_promedio->execute();
                # Actualizar el promedio
                $avg = $calcular_promedio->fetchObject();
                $nota = number_format($avg->promedio, 2);
                # Se actuliza el promedio pormedio general
                $actualizar_promedio = $this->db->prepare("UPDATE promedioEstudiante SET promedio = :avg WHERE id_estudiante_avg = :student AND id_periodo_avg = :period");
                $actualizar_promedio->bindParam(":avg", $nota, PDO::PARAM_STR);
                $actualizar_promedio->bindParam(":student", $id_estudiante, PDO::PARAM_INT);
                $actualizar_promedio->bindParam(":period", $id_periodo, PDO::PARAM_INT);
                $actualizar_promedio->execute();
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    # Validar sí el estudiante ya tiene nota de comportamiento registrada.
    public function verificarNotaComportamiento()
    {
        $id_estudiante = $this->getEstudiante();
        $id_periodo = $this->getPeriodo();
        $validacion = $this->db->prepare("SELECT * FROM notacomportamiento WHERE id_estudiante_compor = :id_estudiante AND id_periodo_compor = :periodo");
        $validacion->bindParam(":id_estudiante", $id_estudiante, PDO::PARAM_INT);
        $validacion->bindParam(":periodo", $id_periodo, PDO::PARAM_INT);
        $validacion->execute();

        $resultado = $validacion->rowCount();
        if ($resultado == 0) {
            return true;
        }
        return false;
    }

    public function notaComportamiento()
    {
        $id_estudiante = $this->getEstudiante();
        $id_periodo = $this->getPeriodo();
        $observacion = $this->getItem();
        $calificacion = $this->getNota();

        $registro = $this->db->prepare("INSERT INTO notacomportamiento VALUES (null, :estudiante, :periodo, :observacion, :calificacion)");
        $registro->bindParam(":estudiante", $id_estudiante, PDO::PARAM_INT);
        $registro->bindParam(":periodo", $id_periodo, PDO::PARAM_INT);
        $registro->bindParam(":observacion", $observacion, PDO::PARAM_STR);
        $registro->bindParam(":calificacion", $calificacion, PDO::PARAM_INT);
        return $registro->execute();
    }

} # fin de la clase
