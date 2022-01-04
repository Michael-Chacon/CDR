<?php
require_once 'usuarios.php';

class Personal extends Usuarios
{
    public $db;

    public function __construct()
    {
        $this->db = Database::conectar();
    }

    # Registrar docentes
    public function guardarPersonal()
    {
        $no = $this->getNombre();
        $ap = $this->getApellidos();
        $fe_na = $this->getNacimiento();
        $ed = $this->getEdad();
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

        $registro = $this->db->prepare("INSERT INTO personal VALUES(null, :nombre, :apellidos, :fe_na, :edad, :genero, :cargo, :tipo_id, :numeroid, :lu_ex, :fe_ex, :dir, :tel, :co, :reli, :incapacidad, :grupo_s, :rh, :fe_po, :nu_acta, :nu_resolucion, :pre, :no_pre, :pos, :no_pos);");
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
    }

    public function listarPersonal()
    {
        $lista = $this->db->prepare("SELECT * FROM personal");
        $lista->execute();
        return $lista;
    }

} # fin de la clase
