<?php
# Clase para registrar las actualizaciones y las eliminaciones de datos
class Auditoria
{
    public $administrativo;
    public $fecha;
    public $db;

    public function __construct()
    {
        $this->db = Database::conectar();
        $this->administrativo = $_SESSION['user']->nombre_a . ' ' . $_SESSION['user']->apellidos_a;
        $this->fecha = date("Y-m-d h:i:s:a");
    }

    # Metodo para auditar la actualizacion de los periodos
    public function auditarPeriodo($periodo, $inicio, $fin, $estado)
    {
        $auditar = $this->db->prepare("INSERT INTO update_periodo VALUES (null, :admin, :periodo, :inicio, :fin, :estado, :fecha)");
        $auditar->bindParam(":admin", $this->administrativo, PDO::PARAM_STR);
        $auditar->bindParam(":periodo", $periodo, PDO::PARAM_INT);
        $auditar->bindParam(":inicio", $inicio, PDO::PARAM_STR);
        $auditar->bindParam(":fin", $fin, PDO::PARAM_STR);
        $auditar->bindParam(":estado", $estado, PDO::PARAM_STR);
        $auditar->bindParam(":fecha", $this->fecha, PDO::PARAM_STR);
        $auditar->execute();
    }

    # Metodo para auditar la actualizacion de los datos de los estudiantes
    public function auditarActualizacionEstudiante($nombre, $apellidos, $identificacion)
    {
        $estudiante = $this->db->prepare("INSERT INTO actualizar_estudiante VALUES (null, :admin, :nombre, :apellidos, :id, :fecha)");
        $estudiante->bindParam(":admin", $this->administrativo, PDO::PARAM_STR);
        $estudiante->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $estudiante->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
        $estudiante->bindParam(":id", $identificacion, PDO::PARAM_INT);
        $estudiante->bindParam(":fecha", $this->fecha, PDO::PARAM_STR);
        $estudiante->execute();
    }

    # Metodo para auditar la actualizacion de los datos de los docentes
    public function auditarActualizacionDocentes($nombre, $apellidos, $identificacion)
    {
        $boletin = $this->db->prepare("INSERT INTO actualizar_docente VALUES (null, :admin, :nombre, :apellidos, :id, :fecha)");
        $boletin->bindParam(":admin", $this->administrativo, PDO::PARAM_STR);
        $boletin->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        $boletin->bindParam(":apellidos", $apellidos, PDO::PARAM_STR);
        $boletin->bindParam(":id", $identificacion, PDO::PARAM_INT);
        $boletin->bindParam(":fecha", $this->fecha, PDO::PARAM_STR);
        $boletin->execute();
    }

    # Metodo para auditar la actualizacion del estado del boletin
    public function auditarEstadoBoletin($estado)
    {
        $boletin = $this->db->prepare("INSERT INTO habilitacion_boletin VALUES (null, :admin, :estado, :fecha)");
        $boletin->bindParam(":admin", $this->administrativo, PDO::PARAM_STR);
        $boletin->bindParam(":estado", $estado, PDO::PARAM_STR);
        $boletin->bindParam(":fecha", $this->fecha, PDO::PARAM_STR);
        $boletin->execute();
    }

    # Metodo para auditar la actualizacion del estado del boletin
    public function auditarCredenciales($usuario, $rol)
    {
        $credenciales = $this->db->prepare("INSERT INTO actualizar_credenciales VALUES (null, :admin, :usuario, :rol, :fecha)");
        $credenciales->bindParam(":admin", $this->administrativo, PDO::PARAM_STR);
        $credenciales->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $credenciales->bindParam(":rol", $rol, PDO::PARAM_STR);
        $credenciales->bindParam(":fecha", $this->fecha, PDO::PARAM_STR);
        $credenciales->execute();
    }

    # Metodo para auditar las subidas de los boletines

}
