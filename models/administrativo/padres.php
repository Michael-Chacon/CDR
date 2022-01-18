<?php

class Padres
{
    # datos de la madre
    private $id;
    private $nombre_m;
    private $apellidos_m;
    private $nacimiento_m;
    private $edad_m;
    private $tipo_m;
    private $numero_m;
    private $lugar_expedi_m;
    private $fecha_expedi_m;
    private $telefono_m;
    private $ocupacion_m;

    # datos del padre
    private $nombre_p;
    private $apellidos_p;
    private $nacimiento_p;
    private $edad_p;
    private $tipo_p;
    private $numero_p;
    private $lugar_expedi_p;
    private $fecha_expedi_p;
    private $telefono_p;
    private $ocupacion_p;

    private $direccion;
    private $correo;

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
    public function getNombreM()
    {
        return $this->nombre_m;
    }

    /**
     * @param mixed $nombre_m
     *
     * @return self
     */
    public function setNombreM($nombre_m)
    {
        $this->nombre_m = $nombre_m;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellidosM()
    {
        return $this->apellidos_m;
    }

    /**
     * @param mixed $apellidos_m
     *
     * @return self
     */
    public function setApellidosM($apellidos_m)
    {
        $this->apellidos_m = $apellidos_m;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNacimientoM()
    {
        return $this->nacimiento_m;
    }

    /**
     * @param mixed $nacimiento_m
     *
     * @return self
     */
    public function setNacimientoM($nacimiento_m)
    {
        $this->nacimiento_m = $nacimiento_m;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEdadM()
    {
        return $this->edad_m;
    }

    /**
     * @param mixed $edad_m
     *
     * @return self
     */
    public function setEdadM($edad_m)
    {
        $this->edad_m = $edad_m;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoM()
    {
        return $this->tipo_m;
    }

    /**
     * @param mixed $tipo_m
     *
     * @return self
     */
    public function setTipoM($tipo_m)
    {
        $this->tipo_m = $tipo_m;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroM()
    {
        return $this->numero_m;
    }

    /**
     * @param mixed $numero_m
     *
     * @return self
     */
    public function setNumeroM($numero_m)
    {
        $this->numero_m = $numero_m;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLugarExpediM()
    {
        return $this->lugar_expedi_m;
    }

    /**
     * @param mixed $lugar_expedi_m
     *
     * @return self
     */
    public function setLugarExpediM($lugar_expedi_m)
    {
        $this->lugar_expedi_m = $lugar_expedi_m;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaExpediM()
    {
        return $this->fecha_expedi_m;
    }

    /**
     * @param mixed $fecha_expedi_m
     *
     * @return self
     */
    public function setFechaExpediM($fecha_expedi_m)
    {
        $this->fecha_expedi_m = $fecha_expedi_m;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOcupacionM()
    {
        return $this->ocupacion_m;
    }

    /**
     * @param mixed $ocupacion_m
     *
     * @return self
     */
    public function setOcupacionM($ocupacion_m)
    {
        $this->ocupacion_m = $ocupacion_m;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombreP()
    {
        return $this->nombre_p;
    }

    /**
     * @param mixed $nombre_p
     *
     * @return self
     */
    public function setNombreP($nombre_p)
    {
        $this->nombre_p = $nombre_p;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getApellidosP()
    {
        return $this->apellidos_p;
    }

    /**
     * @param mixed $apellidos_p
     *
     * @return self
     */
    public function setApellidosP($apellidos_p)
    {
        $this->apellidos_p = $apellidos_p;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNacimientoP()
    {
        return $this->nacimiento_p;
    }

    /**
     * @param mixed $nacimiento_p
     *
     * @return self
     */
    public function setNacimientoP($nacimiento_p)
    {
        $this->nacimiento_p = $nacimiento_p;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEdadP()
    {
        return $this->edad_p;
    }

    /**
     * @param mixed $edad_p
     *
     * @return self
     */
    public function setEdadP($edad_p)
    {
        $this->edad_p = $edad_p;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoP()
    {
        return $this->tipo_p;
    }

    /**
     * @param mixed $tipo_p
     *
     * @return self
     */
    public function setTipoP($tipo_p)
    {
        $this->tipo_p = $tipo_p;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumeroP()
    {
        return $this->numero_p;
    }

    /**
     * @param mixed $numero_p
     *
     * @return self
     */
    public function setNumeroP($numero_p)
    {
        $this->numero_p = $numero_p;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLugarExpediP()
    {
        return $this->lugar_expedi_p;
    }

    /**
     * @param mixed $lugar_expedi_p
     *
     * @return self
     */
    public function setLugarExpediP($lugar_expedi_p)
    {
        $this->lugar_expedi_p = $lugar_expedi_p;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaExpediP()
    {
        return $this->fecha_expedi_p;
    }

    /**
     * @param mixed $fecha_expedi_p
     *
     * @return self
     */
    public function setFechaExpediP($fecha_expedi_p)
    {
        $this->fecha_expedi_p = $fecha_expedi_p;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOcupacionP()
    {
        return $this->ocupacion_p;
    }

    /**
     * @param mixed $ocupacion_p
     *
     * @return self
     */
    public function setOcupacionP($ocupacion_p)
    {
        $this->ocupacion_p = $ocupacion_p;

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
    public function getTelefonoM()
    {
        return $this->telefono_m;
    }

    /**
     * @param mixed $telefono_m
     *
     * @return self
     */
    public function setTelefonoM($telefono_m)
    {
        $this->telefono_m = $telefono_m;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefonoP()
    {
        return $this->telefono_p;
    }

    /**
     * @param mixed $telefono_p
     *
     * @return self
     */
    public function setTelefonoP($telefono_p)
    {
        $this->telefono_p = $telefono_p;

        return $this;
    }

    public function guardarPadres($accion)
    {
        try {

            # madre
            $n_m = $this->getNombreM();
            $a_m = $this->getApellidosM();
            $nacimi_m = $this->getNacimientoM();
            $ed_m = $this->getEdadM();
            $t_m = $this->getTipoM();
            $nu_m = $this->getNumeroM();
            $lu_m = $this->getLugarExpediM();
            $fec_m = $this->getFechaExpediM();
            $te_m = $this->getTelefonoM();
            $o_m = $this->getOcupacionM();
            # padre
            $n_p = $this->getNombreP();
            $a_p = $this->getApellidosP();
            $nacimi_p = $this->getNacimientoP();
            $ed_p = $this->getEdadP();
            $t_p = $this->getTipoP();
            $nu_p = $this->getNumeroP();
            $lu_p = $this->getLugarExpediP();
            $fec_p = $this->getFechaExpediP();
            $te_p = $this->getTelefonoP();
            $o_p = $this->getOcupacionP();

            $dir = $this->getDireccion();
            $co = $this->getCorreo();
            $id_padres = $this->getId();

            if ($accion == 'guardar') {
                $registro = $this->db->prepare("INSERT INTO padres VALUES(null, :nombre_m, :apellidos_m, :fecha_nacimiento_m, :edad_m, :tipo_identificacion_m, :numero_m, :lugar_expedicion_m, :fecha_expedi_m, :telefono_m, :ocupacion_m, :nombre_p, :apellidos_p, :fecha_nacimiento_p, :edad_p, :tipo_identificacion_p, :numero_p, :lugar_expedicion_p, :fecha_expedi_p, :telefono_p, :ocupacion_p, :dir, :co)");

            } elseif ($accion == 'actualizar') {
                $registro = $this->db->prepare("UPDATE padres SET nombre_m = :nombre_m, apellidos_m = :apellidos_m, fecha_nacimiento_m = :fecha_nacimiento_m, edad_m = :edad_m, tipo_identificacion_m = :tipo_identificacion_m , numero_m = :numero_m, lugar_expedicion_m = :lugar_expedicion_m, fecha_expedicion_m = :fecha_expedi_m, telefono_m = :telefono_m, ocupacion_m = :ocupacion_m, nombre_p = :nombre_p, apellidos_p = :apellidos_p, fecha_nacimiento_p = :fecha_nacimiento_p, edad_p = :edad_p, tipo_identificacion_p = :tipo_identificacion_p, numero_p = :numero_p, lugar_expedicion_p = :lugar_expedicion_p, fecha_expedicion_p = :fecha_expedi_p, telefono_p = :telefono_p, ocupacion_p = :ocupacion_p, direccion = :dir, correo = :co WHERE id = :id_padres");
                $registro->bindParam(":id_padres", $id_padres, PDO::PARAM_INT);
            }
            # madre
            $registro->bindParam(':nombre_m', $n_m, PDO::PARAM_STR);
            $registro->bindParam(':apellidos_m', $a_m, PDO::PARAM_STR);
            $registro->bindParam(':fecha_nacimiento_m', $nacimi_m, PDO::PARAM_STR);
            $registro->bindParam(':edad_m', $ed_m, PDO::PARAM_INT);
            $registro->bindParam(':tipo_identificacion_m', $t_m, PDO::PARAM_STR);
            $registro->bindParam(':numero_m', $nu_m, PDO::PARAM_INT);
            $registro->bindParam(':lugar_expedicion_m', $lu_m, PDO::PARAM_STR);
            $registro->bindParam(':fecha_expedi_m', $fec_m, PDO::PARAM_STR);
            $registro->bindParam(':telefono_m', $te_m, PDO::PARAM_INT);
            $registro->bindParam(':ocupacion_m', $o_m, PDO::PARAM_STR);
            # padre
            $registro->bindParam(':nombre_p', $n_p, PDO::PARAM_STR);
            $registro->bindParam(':apellidos_p', $a_p, PDO::PARAM_STR);
            $registro->bindParam(':fecha_nacimiento_p', $nacimi_p, PDO::PARAM_STR);
            $registro->bindParam(':edad_p', $ed_p, PDO::PARAM_INT);
            $registro->bindParam(':tipo_identificacion_p', $t_p, PDO::PARAM_STR);
            $registro->bindParam(':numero_p', $nu_p, PDO::PARAM_INT);
            $registro->bindParam(':lugar_expedicion_p', $lu_p, PDO::PARAM_STR);
            $registro->bindParam(':fecha_expedi_p', $fec_p, PDO::PARAM_STR);
            $registro->bindParam(':telefono_p', $te_p, PDO::PARAM_INT);
            $registro->bindParam(':ocupacion_p', $o_p, PDO::PARAM_STR);
            $registro->bindParam(':dir', $dir, PDO::PARAM_STR);
            $registro->bindParam(':co', $co, PDO::PARAM_STR);

            return $registro->execute();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function idPadres()
    {
        return $this->db->lastInsertId();
    }

    # seleccionar el id del padre cuando ya esta registrado en la db y se va a matricular ha un segundo hijo
    public function padresExistentes()
    {
        $cedula = $this->getNumeroM();
        $seleccion = $this->db->prepare("SELECT id FROM padres WHERE numero_m = :cedula OR numero_p = :cedula");
        $seleccion->bindParam(":cedula", $cedula, PDO::PARAM_INT);
        $seleccion->execute();
        return $seleccion->fetchObject()->id;

    }
} # Fin de la clase
