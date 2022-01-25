<?php

class Utils
{

    # Borrar los errores
    public static function borrar_error($entidad)
    {
        if (isset($_SESSION[$entidad])) {
            unset($_SESSION[$entidad]);
        }
    }

    #  Validar la existencia de la session
    public static function is_user()
    {
        if (!isset($_SESSION['user'])) {
            header("Location:" . base_url);
        }
    }

    # Validar el éxito de una accion sobre la base de datos  para pasarle la session al metodo {general_alerts()}
    public static function validarReturn($variable, $entidad)
    {
        if ($variable) {
            $_SESSION[$entidad] = 'exito';
        } else {
            $_SESSION[$entidad] = 'fallo';
        }
    }

    # Imprimir las alertas  generadas en toda la plataforma.
    public static function general_alerts($alert, $bien, $mal)
    {
        $alerta = '';
        if (isset($_SESSION[$alert]) && $_SESSION[$alert] == 'exito') {
            $alerta = "<div class='alert alert-dismissible fade show text-center alerta-ok mt-2' role='alert'><strong><i class='bi bi-check2' style='font-size:1.5rem; color:white;'></i> </strong>" . $bien .
                "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        } elseif (isset($_SESSION[$alert]) && $_SESSION[$alert] == 'fallo') {
            $alerta = "<div class='alert alert-danger alert-dismissible fade show text-center mt-2' role='alert'>
                            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='exclamation-triangle-fill'/></svg>
                                    <i class='bi bi-x-octagon' style='font-size:1.4rem; color:red;'></i> <strong>Error!</strong> " . $mal .
                "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
        }
        return $alerta;
    }

    public static function validarExistenciaUsuario($documento, $tabla, $campo)
    {
        $db = Database::conectar();
        $sql = $db->prepare("SELECT $campo FROM $tabla WHERE $campo = :documento ");
        $sql->bindParam(':documento', $documento, PDO::PARAM_INT);
        $resultado = $sql->execute();
        return $numero_resultados = $sql->rowCount();
    }

    public static function validarExisenciaDocumentos($tabla, $campo, $variable, $campo2,$materia)
    {
        $db = Database::conectar();
        $sql = $db->prepare("SELECT $campo FROM $tabla WHERE $campo = :variable AND $campo2  = :materia");
        $sql->bindParam(':variable', $variable, PDO::PARAM_STR);
        $sql->bindParam(':materia', $materia, PDO::PARAM_INT);
        $sql->execute();

        if ($sql->rowCount() == 0) {
            return true;
        } else {
            return false;
        }
    }

} #fin de la clase
