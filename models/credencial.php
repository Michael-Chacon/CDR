<?php

class Credencial
{
    protected $id;
    protected $id_administrativo;
    protected $id_estudiante;
    protected $id_docente;
    protected $rol;
    protected $usuario;
    protected $password;
    protected $estado;

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
    public function getIdAdministrativo()
    {
        return $this->id_administrativo;
    }

    /**
     * @param mixed $id_administrativo
     *
     * @return self
     */
    public function setIdAdministrativo($id_administrativo)
    {
        $this->id_administrativo = $id_administrativo;

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
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * @param mixed $rol
     *
     * @return self
     */
    public function setRol($rol)
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     *
     * @return self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     *
     * @return self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    # crear la credencial para el  estudiante
    public function credenciales_usuario($id_usuario, $rol_usuario)
    {
        // $id_estudiante = $this->db->lastInsertId();
        $user = $this->getUsuario();
        $pass = $this->getPassword();
        $rol_u = $this->getRol();
        $estado = $this->getEstado();

        if ($rol_usuario == 'estudiante') {
            $estudiante = $id_usuario;
            $administrativo = null;
            $docente = null;
        } elseif ($rol_usuario == 'docente') {
            $docente = $id_usuario;
            $estudiante = null;
            $administrativo = null;
        } elseif ($rol_usuario == 'administrativo') {
            $administrativo = $id_usuario;
            $docente = null;
            $estudiante = null;
        }

        $credenciales = $this->db->prepare("INSERT INTO credenciales VALUES(null, :administrativo, :estudiante, :docente, :rol, :usuario, :pass, :estado)");
        $credenciales->bindParam(':administrativo', $administrativo, PDO::PARAM_INT);
        $credenciales->bindParam(':estudiante', $estudiante, PDO::PARAM_INT);
        $credenciales->bindParam(':docente', $docente, PDO::PARAM_INT);
        $credenciales->bindParam(':rol', $rol_u, PDO::PARAM_STR);
        $credenciales->bindParam(":usuario", $user, PDO::PARAM_STR);
        $credenciales->bindParam(":pass", $pass, PDO::PARAM_STR);
        $credenciales->bindParam(':estado', $estado, PDO::PARAM_STR);

        return $credenciales->execute();

    }

    # metodo para cambiar la contraseña
    public function updatePassword()
    {
        $rol_user = $this->getRol();
        $id_user = $this->getId();
        $pass = $this->getPassword();
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
        echo $pass_hash;
        exit;

        $actualizar = $this->db->prepare("UPDATE credenciales SET password = :pass WHERE $rol_user = :id");
        $actualizar->bindParam(":pass", $pass, PDO::PARAM_STR);
        $actualizar->bindParam(":id", $id_user, PDO::PARAM_INT);
        return $actualizar->execute();
    }

} # fin de la clase
