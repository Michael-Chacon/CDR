<?php

class Usuarios
{
    public $id;
    public $padres;
    public $nombre;
    public $apellidos;
    public $nacimiento;
    public $edad;
    public $genero;
    public $tipo_docu;
    public $numero_docu;
    public $lugar_expedi;
    public $fecha_expedi;
    public $direccion;
    public $telefono;
    public $correo;
    public $religion;
    public $incapacidad;
    public $grupo;
    public $rh;
    public $fecha_posesion;
    public $numero_acta_posesion;
    public $numero_resolucion_posesion;
    public $pregrado;
    public $nombre_pregrado;
    public $posgrado;
    public $nombre_posgrado;
    public $cargo;
    public $img;

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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     *
     * @return self
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    /**
     * @param mixed $nacimiento
     *
     * @return self
     */
    public function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * @param mixed $edad
     *
     * @return self
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param mixed $genero
     *
     * @return self
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoDocu()
    {
        return $this->tipo_docu;
    }

    /**
     * @param mixed $tipo_docu
     *
     * @return self
     */
    public function setTipoDocu($tipo_docu)
    {
        $this->tipo_docu = $tipo_docu;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroDocu()
    {
        return $this->numero_docu;
    }

    /**
     * @param mixed $numero_docu
     *
     * @return self
     */
    public function setNumeroDocu($numero_docu)
    {
        $this->numero_docu = $numero_docu;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLugarExpedi()
    {
        return $this->lugar_expedi;
    }

    /**
     * @param mixed $lugar_expedi
     *
     * @return self
     */
    public function setLugarExpedi($lugar_expedi)
    {
        $this->lugar_expedi = $lugar_expedi;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaExpedi()
    {
        return $this->fecha_expedi;
    }

    /**
     * @param mixed $fecha_expedi
     *
     * @return self
     */
    public function setFechaExpedi($fecha_expedi)
    {
        $this->fecha_expedi = $fecha_expedi;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     *
     * @return self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     *
     * @return self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     *
     * @return self
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getReligion()
    {
        return $this->religion;
    }

    /**
     * @param mixed $religion
     *
     * @return self
     */
    public function setReligion($religion)
    {
        $this->religion = $religion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIncapacidad()
    {
        return $this->incapacidad;
    }

    /**
     * @param mixed $incapacidad
     *
     * @return self
     */
    public function setIncapacidad($incapacidad)
    {
        $this->incapacidad = $incapacidad;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * @param mixed $grupo
     *
     * @return self
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRh()
    {
        return $this->rh;
    }

    /**
     * @param mixed $rh
     *
     * @return self
     */
    public function setRh($rh)
    {
        $this->rh = $rh;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaPosesion()
    {
        return $this->fecha_posesion;
    }

    /**
     * @param mixed $fecha_posesion
     *
     * @return self
     */
    public function setFechaPosesion($fecha_posesion)
    {
        $this->fecha_posesion = $fecha_posesion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroActaPosesion()
    {
        return $this->numero_acta_posesion;
    }

    /**
     * @param mixed $numero_acta_posesion
     *
     * @return self
     */
    public function setNumeroActaPosesion($numero_acta_posesion)
    {
        $this->numero_acta_posesion = $numero_acta_posesion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroResolucionPosesion()
    {
        return $this->numero_resolucion_posesion;
    }

    /**
     * @param mixed $numero_resolucion_posesion
     *
     * @return self
     */
    public function setNumeroResolucionPosesion($numero_resolucion_posesion)
    {
        $this->numero_resolucion_posesion = $numero_resolucion_posesion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPregrado()
    {
        return $this->pregrado;
    }

    /**
     * @param mixed $pregrado
     *
     * @return self
     */
    public function setPregrado($pregrado)
    {
        $this->pregrado = $pregrado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombrePregrado()
    {
        return $this->nombre_pregrado;
    }

    /**
     * @param mixed $nombre_pregrado
     *
     * @return self
     */
    public function setNombrePregrado($nombre_pregrado)
    {
        $this->nombre_pregrado = $nombre_pregrado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPosgrado()
    {
        return $this->posgrado;
    }

    /**
     * @param mixed $posgrado
     *
     * @return self
     */
    public function setPosgrado($posgrado)
    {
        $this->posgrado = $posgrado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombrePosgrado()
    {
        return $this->nombre_posgrado;
    }

    /**
     * @param mixed $nombre_posgrado
     *
     * @return self
     */
    public function setNombrePosgrado($nombre_posgrado)
    {
        $this->nombre_posgrado = $nombre_posgrado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param mixed $cargo
     *
     * @return self
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPadres()
    {
        return $this->padres;
    }

    /**
     * @param mixed $padres
     *
     * @return self
     */
    public function setPadres($padres)
    {
        $this->padres = $padres;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     *
     * @return self
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }
}
