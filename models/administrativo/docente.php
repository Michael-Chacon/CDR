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
            $ed = $this->getEdad();
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
            echo $img;
            if ($accion == 'guardar') {
                $registro = $this->db->prepare("INSERT INTO docente VALUES(null, :nombre, :apellidos, :fe_na, :edad, :genero, :tipo_id, :numeroid, :lu_ex, :fe_ex, :dir, :tel, :co, :reli, :incapacidad, :grupo_s, :rh, :fe_po, :nu_acta, :nu_resolucion, :pre, :no_pre, :pos, :no_pos, :img);");
            } elseif ($accion == 'actualizar') {
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
            $registro->bindParam(':img', $img, PDO::PARAM_STR);

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

} #FIN DE LA CLASE
