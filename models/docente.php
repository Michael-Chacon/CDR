<?php
require_once 'usuarios.php';

class Docente extends Usuarios
{
    public $db;
    public function __construct()
    {
        $this->db = Database::conectar();
    }

    # Registrar docentes
    public function guardarDocentes($accion)
    {
        try {

            $id_d = $this->getId();
            $no = $this->getNombre();
            $ap = $this->getApellidos();
            $fe_na = $this->getNacimiento();
            $gen = $this->getGenero();
            $ti_docu = $this->getTipoDocu();
            $num_docu = $this->getNumeroDocu();
            $lu = $this->getLugarExpedi();
            $fe_ex = $this->getFechaExpedi();
            $dir = $this->getDireccion();
            $tel = $this->getTelefono();
            $co = $this->getCorreo();
            $reli = $this->getReligion();
            $in = $this->getIncapacidad();
            $gr = $this->getGrupo();
            $rh_d = $this->getRh();
            $fe_po = $this->getFechaPosesion();
            $num_acta = $this->getNumeroActaPosesion();
            $num_resolucion = $this->getNumeroResolucionPosesion();
            $pre = $this->getPregrado();
            $no_pre = $this->getNombrePregrado();
            $pos = $this->getPosgrado();
            $no_pos = $this->getNombrePosgrado();
            $img = $this->getImg();
            $director = 'no';
            echo $img;
            if ($accion == 'guardar') {
                $ed = Utils::hallarEdad();
                $registro = $this->db->prepare("INSERT INTO docente VALUES(null, :nombre, :apellidos, :fe_na, :edad, :genero, :tipo_id, :numeroid, :lu_ex, :fe_ex, :dir, :tel, :co, :reli, :incapacidad, :grupo_s, :rh, :fe_po, :nu_acta, :nu_resolucion, :pre, :no_pre, :pos, :no_pos, :img, :director);");
                $registro->bindParam(':img', $img, PDO::PARAM_STR);
                $registro->bindParam(':director', $director, PDO::PARAM_STR);
            } elseif ($accion == 'actualizar') {
                $ed = $this->getEdad();
                $registro = $this->db->prepare("UPDATE docente SET nombre_d = :nombre, apellidos_d = :apellidos, fecha_nacimiento_d = :fe_na, edad_d = :edad, sexo_d = :genero, tipo_identificacion_d = :tipo_id, numero_d = :numeroid, lugar_expedicion_d = :lu_ex, fecha_expedicion_d = :fe_ex, direccion_d = :dir, telefono_d = :tel, correo_d = :co, religion_d = :reli, incapacidad_medica_d = :incapacidad, grupo_sanguineo_d = :grupo_s, rh_d = :rh, fecha_posesion_d = :fe_po, numero_acta_posesion_d = :nu_acta, numero_resolucion_posesion_d = :nu_resolucion, pregrado_d = :pre, nombre_pregrado_d = :no_pre, posgrado_d = :pos, nombre_posgrado_d = :no_pos WHERE id = :id");
                $registro->bindParam(":id", $id_d, PDO::PARAM_INT);
            }
            $registro->bindParam(':nombre', $no, PDO::PARAM_STR);
            $registro->bindParam(':apellidos', $ap, PDO::PARAM_STR);
            $registro->bindParam(':fe_na', $fe_na, PDO::PARAM_STR);
            $registro->bindParam(':edad', $ed, PDO::PARAM_INT);
            $registro->bindParam(':genero', $gen, PDO::PARAM_STR);
            $registro->bindParam(':tipo_id', $ti_docu, PDO::PARAM_STR);
            $registro->bindParam(':numeroid', $num_docu, PDO::PARAM_INT);
            $registro->bindParam(':lu_ex', $lu, PDO::PARAM_STR);
            $registro->bindParam(':fe_ex', $fe_ex, PDO::PARAM_STR);
            $registro->bindParam(':dir', $dir, PDO::PARAM_STR);
            $registro->bindParam(':tel', $tel, PDO::PARAM_INT);
            $registro->bindParam(':co', $co, PDO::PARAM_STR);
            $registro->bindParam(':reli', $reli, PDO::PARAM_STR);
            $registro->bindParam(':incapacidad', $in, PDO::PARAM_STR);
            $registro->bindParam(':grupo_s', $gr, PDO::PARAM_STR);
            $registro->bindParam(':rh', $rh_d, PDO::PARAM_STR);
            $registro->bindParam(':fe_po', $fe_po, PDO::PARAM_STR);
            $registro->bindParam(':nu_acta', $num_acta, PDO::PARAM_INT);
            $registro->bindParam(':nu_resolucion', $num_resolucion, PDO::PARAM_INT);
            $registro->bindParam(':pre', $pre, PDO::PARAM_STR);
            $registro->bindParam(':no_pre', $no_pre, PDO::PARAM_STR);
            $registro->bindParam(':pos', $pos, PDO::PARAM_STR);
            $registro->bindParam(':no_pos', $no_pos, PDO::PARAM_STR);
            return $registro->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    # crear la credencial para el  estudiante
    public function idDocente()
    {
        $id_docente = $this->db->lastInsertId();
        return $id_docente;
    }

    public function allDocentes()
    {
        $consulta = $this->db->prepare("SELECT id, nombre_d, apellidos_d, nombre_pregrado_d, telefono_d, numero_d, correo_d, img FROM docente");
        $consulta->execute();
        return $consulta;
    }

    # obtener informacion de un solo docente
    public function obtenerPerfil()
    {
        $id_docente = $this->getId();
        $datos = $this->db->prepare("SELECT * FROM docente WHERE id = :id");
        $datos->bindParam(":id", $id_docente, PDO::PARAM_INT);
        $datos->execute();
        return $datos->fetchObject();
    }

    public function uptdateImgPerfil()
    {
        $docente = $this->getId();
        $foto = $this->getImg();

        $newphoto = $this->db->prepare("UPDATE docente SET img = :foto WHERE id = :id");
        $newphoto->bindParam(":foto", $foto, PDO::PARAM_STR);
        $newphoto->bindParam(":id", $docente, PDO::PARAM_INT);
        return $newphoto->execute();
    }

    # Metodo para asignar director a un grado
    public function asignarDirector()
    {
        $docente = $this->getId();
        $grado = $this->getGrupo();

        $asignar = $this->db->prepare("INSERT INTO director VALUES(null, :docente, :grado)");
        $asignar->bindParam(":docente", $docente, PDO::PARAM_INT);
        $asignar->bindParam(":grado", $grado, PDO::PARAM_INT);
        return $asignar->execute();
    }

    # Metodo para actualizar el campo director a "si"en la tabla docente
    public function uptadeDirector($estado)
    {
        $docente = $this->getId();
        $director = $this->db->prepare("UPDATE docente SET director = :dir WHERE id = :docente");
        $director->bindParam(":dir", $estado, PDO::PARAM_STR);
        $director->bindParam(":docente", $docente, PDO::PARAM_INT);
        $director->execute();
    }

    # Seleccionando los docentes que NO han sido asignados como directores
    public function docenteDirector($estado)
    {
        $noDirector = $this->db->prepare("SELECT * FROM docente WHERE director = :estado");
        $noDirector->bindParam(":estado", $estado, PDO::PARAM_STR);
        $noDirector->execute();
        return $noDirector;
    }

    # Seleccionar los docentes y el grado donde son directores
    public function directoresGrados()
    {
        $estado = 'si';
        $directores = $this->db->prepare("SELECT d.id AS 'id_docente', d.nombre_d, d.apellidos_d, .d.img,  g.nombre_g FROM director dir
            INNER JOIN grado g ON g.id = dir.id_grado_dir
            INNER JOIN docente d ON d.id = dir.id_docente_dir
            WHERE d.director = :estado");
        $directores->bindParam(":estado", $estado, PDO::PARAM_STR);
        $directores->execute();
        return $directores;
    }

    # Eliminar la asignacion como director a un docente
    public function deleteDirector()
    {
        $docente = $this->getId();
        $eliminar = $this->db->prepare("DELETE FROM director WHERE id_docente_dir = :docente");
        $eliminar->bindParam(":docente", $docente, PDO::PARAM_INT);
        return $eliminar->execute();
    }

    # seleccionar el director
    public function seleccionarDirector()
    {
        $grado = $this->getGrupo();
        $director = $this->db->prepare("SELECT d.id, d.nombre_d, d.apellidos_d FROM docente d
            INNER JOIN director dir ON dir.id_docente_dir = d.id
            WHERE dir.id_grado_dir = :grado");
        $director->bindParam(":grado", $grado, PDO::PARAM_INT);
        $director->execute();
        return $director;
    }

    # seleccionar el grado en enl que el docente es director
    public function seleccionarGradoDirector()
    {
        $docente = $this->getId();
        $grado = $this->db->prepare("SELECT g.* FROM grado g
            INNER JOIN director d ON d.id_grado_dir = g.id
            WHERE d.id_docente_dir = :id;");
        $grado->bindParam(":id", $docente, PDO::PARAM_INT);
        $grado->execute();
        return $grado;
    }

    # Eliminar docente
    public function deleteTeacher()
    {
        $id_docente = $this->getId();
        $eliminar = $this->db->prepare("DELETE FROM docente WHERE id = :docente");
        $eliminar->bindParam(":docente", $id_docente, PDO::PARAM_INT);
        return $eliminar->execute();
    }

    # Metodo para que el docente actulice los datos que le estan permitido actualizar.
    public function actualizarDocente()
    {
        $id_docente = $_SESSION['teacher']->id;
        $tel = $this->getTelefono();
        $dir = $this->getDireccion();
        $co = $this->getCorreo();
        $acutalizar = $this->db->prepare("UPDATE docente SET telefono_d = :telefono,  direccion_d = :dir, correo_d = :cor WHERE id = :id_docente");
        $acutalizar->bindParam(":telefono", $tel, PDO::PARAM_INT);
        $acutalizar->bindParam(":dir", $dir, PDO::PARAM_STR);
        $acutalizar->bindParam(":cor", $co, PDO::PARAM_STR);
        $acutalizar->bindParam(":id_docente", $id_docente, PDO::PARAM_INT);
        return $acutalizar->execute();
    }

} #FIN DE LA CLASE
