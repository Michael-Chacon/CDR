<?php

class Login
{
    protected $usuario;
    protected $password;
    protected $estado;
    protected $rol;
    protected $id_usuario;

    public $db;
    public function __construct()
    {
        $this->db = Database::conectar();
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
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     *
     * @return self
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    #mis metodos

    # validar usuario
    public function validar_user()
    {
        $user = $this->getUsuario();
        $pass = $this->getPassword();
        $validar = $this->db->prepare("SELECT * FROM credenciales WHERE usuario = ?");
        $validar->execute(array($user));
        if ($validar && $validar->rowCount() == 1) {
            $datos = $validar->fetchObject();
            if ($datos->password == $pass) {
                if ($datos->estado == 'activo') {
                    return $datos;
                } else {
                    return 'Usuario inactivo';
                }
            } else {
                return 'Contraseña incorrecta';
            }
        } else {
            return 'El usuario no existe';
        }
    }

    #obtener los datos del usuario que inicia sesion
    public function obtenerDatos($rol, $id_user)
    {
        $usuario = $this->getIdUsuario();
        $consulta = $this->db->prepare("SELECT * FROM $rol WHERE $id_user = :id");
        $consulta->bindParam('id', $usuario, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetchObject();

    }

}
