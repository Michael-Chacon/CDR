<?php
require_once 'usuarios.php';

class Administrativo extends Usuarios
{
    public $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    # Registrar docentes
    public function guardarAdministrativo($accion)
    {
        try {
            $id = $this->getId();
            $no = $this->getNombre();
            $ap = $this->getApellidos();
            $fe_na = $this->getNacimiento();
            $gen = $this->getGenero();
            $car = $this->getCargo();
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

            if ($accion == 'guardar') {
                $ed = Utils::hallarEdad($fe_na);
                $registro = $this->db->prepare("INSERT INTO administrativo VALUES(null, :nombre, :apellidos, :fe_na, :edad, :genero, :cargo, :tipo_id, :numeroid, :lu_ex, :fe_ex, :dir, :tel, :co, :reli, :incapacidad, :grupo_s, :rh, :fe_po, :nu_acta, :nu_resolucion, :pre, :no_pre, :pos, :no_pos);");
            } elseif ($accion == 'actualizar') {
                $registro = $this->db->prepare("UPDATE administrativo SET nombre_a = :nombre, apellidos_a = :apellidos, fecha_nacimiento_a = :fe_na, edad_a = :edad, sexo_a = :genero, cargo_a = :cargo, tipo_identificacion_a = :tipo_id, numero_a = :numeroid, lugar_expedicion_a = :lu_ex, fecha_expedicion_a = :fe_ex, direccion_a = :dir, telefono_a = :tel, correo_a = :co, religion_a = :reli, incapacidad_medica_a = :incapacidad, grupo_sanguineo_a = :grupo_s, rh_a = :rh, fecha_posesion_a = :fe_po, numero_acta_posesion_a = :nu_acta, numero_resolucion_posesion_a = :nu_resolucion, pregrado_a = :pre, nombre_pregrado_a = :no_pre, posgrado_a = :pos, nombre_posgrado_a = :no_pos WHERE id_admin = :id");
                $registro->bindParam(":id", $id, PDO::PARAM_INT);
            }
            $registro->bindParam(':nombre', $no, PDO::PARAM_STR);
            $registro->bindParam(':apellidos', $ap, PDO::PARAM_STR);
            $registro->bindParam(':fe_na', $fe_na, PDO::PARAM_STR);
            $registro->bindParam(':edad', $ed, PDO::PARAM_INT);
            $registro->bindParam(':genero', $gen, PDO::PARAM_STR);
            $registro->bindParam(':cargo', $car, PDO::PARAM_STR);
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

    # crear la credencial para el  administrativo
    public function idAdministrativo()
    {
        $di_administrativo = $this->db->lastInsertId();
        return $di_administrativo;
    }

    # obtener el listado de  todos los administrativos
    public function listarAdministrativos()
    {
        $lista = $this->db->prepare("SELECT * FROM administrativo");
        $lista->execute();
        return $lista;
    }

    # obtener info de un administrativo en especifico
    public function unAdministrativo()
    {
        $id_admin = $this->getId();
        $obtener = $this->db->prepare("SELECT * FROM administrativo WHERE id_admin = :id");
        $obtener->bindParam(":id", $id_admin, PDO::PARAM_INT);
        $obtener->execute();
        return $obtener->fetchObject();
    }
}
