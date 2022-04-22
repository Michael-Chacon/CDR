<?php
require_once 'usuarios.php';
class Estudiante extends Usuarios
{
    private $grado_e;
    private $trasporte;
    private $pae;

    public $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    /**
     * @return mixed
     */
    public function getGradoE()
    {
        return $this->grado_e;
    }

    /**
     * @param mixed $grado_e
     *
     * @return self
     */
    public function setGradoE($grado_e)
    {
        $this->grado_e = $grado_e;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTrasporte()
    {
        return $this->trasporte;
    }

    /**
     * @param mixed $trasporte
     *
     * @return self
     */
    public function setTrasporte($trasporte)
    {
        $this->trasporte = $trasporte;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPae()
    {
        return $this->pae;
    }

    /**
     * @param mixed $pae
     *
     * @return self
     */
    public function setPae($pae)
    {
        $this->pae = $pae;

        return $this;
    }

    # registrar o actualizar informacion del estudiante
    public function registroEstudiantes($id_padres, $accion)
    {
        try {

            $id_e = $this->getId();
            $no = $this->getNombre();
            $ap = $this->getApellidos();
            $fn = $this->getNacimiento();
            $ed = $this->getEdad();
            $gra = $this->getGradoE();
            $gen = $this->getGenero();
            $ti = $this->getTipoDocu();
            $nu = $this->getNumeroDocu();
            $le = $this->getLugarExpedi();
            $fe = $this->getFechaExpedi();
            $di = $this->getDireccion();
            $te = $this->getTelefono();
            $co = $this->getCorreo();
            $re = $this->getReligion();
            $in = $this->getIncapacidad();
            $gr = $this->getGrupo();
            $r_h = $this->getRh();
            $tr = $this->getTrasporte();
            $pa = $this->getPae();
            $imagen = $this->getImg();

            # validar la accion a ejecutar
            if ($accion == 'guardar') {
                $registro = $this->db->prepare("INSERT INTO estudiante VALUES(null, :grado, :familia, :nombre, :apellidos, :fe_na, :edad, :sexo, :tipo_id, :numero, :lugar_ex, :fe_ex, :dir, :tel, :correo, :reli, :incapacidad, :grupo, :rh, :trasporte, :pae, :img)");
                $registro->bindParam(":grado", $gra, PDO::PARAM_INT);
                $registro->bindParam(':familia', $id_padres, PDO::PARAM_INT);
                $registro->bindParam(":img", $imagen, PDO::PARAM_STR);

            } elseif ($accion == 'actualizar') {
                $registro = $this->db->prepare("UPDATE estudiante SET nombre_e = :nombre, apellidos_e = :apellidos, fecha_nacimiento_e = :fe_na, edad_e = :edad, sexo_e = :sexo, tipo_identificacion_e = :tipo_id, numero_e = :numero, lugar_expedicion_e = :lugar_ex, fecha_expedicion_e = :fe_ex, direccion_e = :dir, telefono_e = :tel, correo_e = :correo, religion_e = :reli, incapacidad_medica_e = :incapacidad, grupo_sanguineo_e = :grupo, rh_e = :rh, transporte = :trasporte, pae = :pae WHERE id = :id_estudiante");
                $registro->bindParam(":id_estudiante", $id_e, PDO::PARAM_INT);
            }
            $registro->bindParam(":nombre", $no, PDO::PARAM_STR);
            $registro->bindParam(":apellidos", $ap, PDO::PARAM_STR);
            $registro->bindParam(':fe_na', $fn, PDO::PARAM_STR);
            $registro->bindParam(':edad', $ed, PDO::PARAM_INT);
            $registro->bindParam(':sexo', $gen, PDO::PARAM_STR);
            $registro->bindParam(':tipo_id', $ti, PDO::PARAM_STR);
            $registro->bindParam(':numero', $nu, PDO::PARAM_INT);
            $registro->bindParam(':lugar_ex', $le, PDO::PARAM_STR);
            $registro->bindParam(':fe_ex', $fe, PDO::PARAM_STR);
            $registro->bindParam(':dir', $di, PDO::PARAM_STR);
            $registro->bindParam(':tel', $te, PDO::PARAM_INT);
            $registro->bindParam(':correo', $co, PDO::PARAM_STR);
            $registro->bindParam(':reli', $re, PDO::PARAM_STR);
            $registro->bindParam(':incapacidad', $in, PDO::PARAM_STR);
            $registro->bindParam(':grupo', $gr, PDO::PARAM_STR);
            $registro->bindParam(':rh', $r_h, PDO::PARAM_STR);
            $registro->bindParam(':trasporte', $tr, PDO::PARAM_STR);
            $registro->bindParam(':pae', $pa, PDO::PARAM_STR);

            return $registro->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    # crear la credencial para el  estudiante
    public function idEstudiante()
    {
        $id_estudiante = $this->db->lastInsertId();
        return $id_estudiante;
    }

    # asignar las materias del grado en que se matriculo al estudiantes
    public function materiasEstudiante($estudiante)
    {
        # obtener todas las materias correspodientes al grado
        $grado = $this->getGradoE();
        $vinculo = '';
        $materias = $this->db->prepare("SELECT id FROM materia WHERE id_grado_mat = :grado");
        $materias->bindParam(':grado', $grado, PDO::PARAM_INT);
        $materias->execute();
        #asignar las materias al estudiante
        while ($materia = $materias->fetchObject()) {
            $vinculo = $this->db->prepare("INSERT INTO estudiantemateria VALUES(:estudiante, :materia)");
            $vinculo->bindParam(':estudiante', $estudiante, PDO::PARAM_INT);
            $vinculo->bindParam(':materia', $materia->id, PDO::PARAM_INT);
            $vinculo->execute();
        }
        return $vinculo;
    }

    # obtener todos los estudiantes
    public function allEstudiantes()
    {
        $estudiantes = $this->db->prepare("SELECT e.*, g.nombre_g, g.id AS 'id_grado' FROM estudiante e INNER JOIN grado g ON g.id = e.id_gradoE ORDER BY id ASC;");
        $estudiantes->execute();
        return $estudiantes;
    }

    # obtener datos de un estudiante en especifico y de sus padres
    public function datosEstudiante()
    {
        $estudiante_id = $this->getId();
        $grade = $this->getGradoE();
        $padres = $this->getPadres();
        $estudiante = $this->db->prepare("SELECT gr.nombre_g, e.id AS 'estudiante_id', e.*, p.id AS 'padres', p.* FROM estudiante e
                                                                INNER JOIN padres p ON p.id = e.id_familia_e
                                                                INNER JOIN grado gr ON gr.id = e.id_gradoE
                                                                WHERE e.id = :estudiante AND p.id = :padres AND e.id_gradoE = :grado;");
        $estudiante->bindParam(":estudiante", $estudiante_id, PDO::PARAM_INT);
        $estudiante->bindParam(":padres", $padres, PDO::PARAM_INT);
        $estudiante->bindParam(":grado", $grade, PDO::PARAM_INT);
        $estudiante->execute();
        return $estudiante->fetchObject();
    }

    # cambiar la foto de perfil

    public function imgPerfil()
    {
        $id_estudiante = $this->getId();
        $foto = $this->getImg();

        $newphoto = $this->db->prepare("UPDATE estudiante SET img = :foto WHERE id = :id");
        $newphoto->bindParam(":foto", $foto, PDO::PARAM_STR);
        $newphoto->bindParam(":id", $id_estudiante, PDO::PARAM_INT);
        return $newphoto->execute();
    }

    # seleccionar los datos de un solo estudiante (este metodo sera utilizado en NotasController)
    public function selectOneStudent()
    {
        $id_student = $this->getId();
        $datos = $this->db->prepare("SELECT id, nombre_e, apellidos_e, id_gradoE, img FROM estudiante WHERE id = :estudiante");
        $datos->bindParam(":estudiante", $id_student, PDO::PARAM_INT);
        $datos->execute();
        return $datos->fetchObject();
    }

    # Actualizar los datos del estudiante en el controlador StudentController
    public function actualizarEstudiante()
    {
        $id_estudiante = $_SESSION['student']['id_estudiante'];
        $tel = $this->getTelefono();
        $dir = $this->getDireccion();
        $co = $this->getCorreo();
        $acutalizar = $this->db->prepare("UPDATE estudiante SET telefono_e = :telefono,  direccion_e = :dir, correo_e = :cor WHERE id = :id_estudiante");
        $acutalizar->bindParam(":telefono", $tel, PDO::PARAM_INT);
        $acutalizar->bindParam(":dir", $dir, PDO::PARAM_STR);
        $acutalizar->bindParam(":cor", $co, PDO::PARAM_STR);
        $acutalizar->bindParam(":id_estudiante", $id_estudiante, PDO::PARAM_INT);
        return $acutalizar->execute();
    }

} # fin de la clase
