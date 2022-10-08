<?php
require_once 'models/periodos.php';
require_once 'models/boletin.php';
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic;

class Utils
{
    # Fecha en formato de texto con la librería Carbon
    public static function fechaCarbon($fecha)
    {
        $date = Carbon::parse($fecha);
        return $date->locale('es')->isoFormat('MMMM DD YYYY');
    }

    # Fecha en formato de texto mes corto
    public static function fechaShortCarbon($fecha)
    {
        $date = Carbon::parse($fecha);
        return $date->locale('es')->isoFormat('MMM DD YYYY');
    }

    # Diferencia para humanos - fechas - librería Carbon
    public static function difernciaParaHumanos($fecha)
    {
        return Carbon::parse($fecha)->locale('es')->diffForHumans();
    }

    # Metodo para redimencionar y validar el tamaño de las imagenes
    public static function intevenirImagen($folder, $nombre, $tmp)
    {
        $carpeta = $folder . $nombre;
        $img = ImageManagerStatic::make($tmp);
        $size = $img->filesize();
        if ($size > 2097152) {
            return false;
        } else {
            $img->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($carpeta, 90);
            return true;
        }
    }

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

    # Limpiar las cadenas de texto
    public static function clearStrings($string)
    {
        $data = str_ireplace( array( '\'', '"', ';', '<', '>', '/', '{', '}', '[', ']' ), '', $string);
        return $data;
    }

    # Nuevo sistema de alertas
    public static function alertas($respuesta, $exito, $error)
    {
        if ($respuesta) {
            $_SESSION['alert'] = "<div class='alert alert-dismissible fade show text-center alerta-ok mt-2' role='alert'><strong><i class='bi bi-check2' style='font-size:1.5rem; color:white;'></i> </strong>" . $exito .
                "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        } else {
            $_SESSION['alert'] = "<div class='alert alerta-bad alert-dismissible fade show text-center mt-2' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='exclamation-triangle-fill'/></svg>
            <i class='bi bi-x-octagon' style='font-size:1.4rem; color:white;'></i> <strong>Error! </strong> " . $error .
                "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
        }

    }
    # Mostrar el mensaje de la alerta
    public static function getAlert()
    {
        if (isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
        }
    }

    public static function validarExistenciaUsuario($documento, $tabla, $campo)
    {
        $db = Database::conectar();
        $sql = $db->prepare("SELECT $campo FROM $tabla WHERE $campo = :documento ");
        $sql->bindParam(':documento', $documento, PDO::PARAM_INT);
        $resultado = $sql->execute();
        return $numero_resultados = $sql->rowCount();
    }

    public static function validarExistenciaDUnCampo($documento, $tabla, $campo)
    {
        $db = Database::conectar();
        $sql = $db->prepare("SELECT $campo FROM $tabla WHERE $campo = :documento ");
        $sql->bindParam(':documento', $documento, PDO::PARAM_STR);
        $resultado = $sql->execute();
        return $numero_resultados = $sql->rowCount();
    }

    public static function validarExisenciaDocumentos($tabla, $campo, $variable, $campo2, $materia)
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

    public static function formatearFecha($inicio, $fin)
    {
        $fechaInicio = date('Y-m-d', strtotime($inicio));
        $fechaFin = date('Y-m-d', strtotime($fin));
        return $fechas = array($fechaInicio, $fechaFin);
    }

    # validar el periodo academico
    public static function validarPeriodoAcademico($hoy)
    {
        $veliadar_periodo = new Periodos();

        $uno = $veliadar_periodo->periodoUno();
        $periodo1 = Utils::formatearFecha($uno->fecha_inicio, $uno->fecha_fin);

        $dos = $veliadar_periodo->periodoDos();
        $periodo2 = Utils::formatearFecha($dos->fecha_inicio, $dos->fecha_fin);

        $tres = $veliadar_periodo->periodoTres();
        $periodo3 = Utils::formatearFecha($tres->fecha_inicio, $tres->fecha_fin);

        if ($hoy >= $periodo1[0] && $hoy <= $periodo1[1]) {
            $periodo = $uno->id;
        } elseif ($hoy >= $periodo2[0] && $hoy <= $periodo2[1]) {
            $periodo = $dos->id;
        } elseif ($hoy >= $periodo3[0] && $hoy <= $periodo3[1]) {
            $periodo = $tres->id;
        }

        return $periodo;
    }

    public static function encryption($dato)
    {
        $output = false;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_encrypt($dato, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    public static function decryption($dato)
    {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_decrypt(base64_decode($dato), METHOD, $key, 0, $iv);
        return $output;
    }

    # metodo para hallar la edad
    public static function hallarEdad($fechaNacimiento)
    {
        list($año, $mes, $dia) = explode("-", $fechaNacimiento);
        $año_diferencia = date("Y") - $año;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0) {
            $año_diferencia--;
        }

        return $año_diferencia;
    }

    public static function Error404()
    {
        require_once 'views/layout/404.php';
    }

    public static function deleteFiles()
    {
        $files = glob('file/*.pdf'); //obtenemos todos los nombres de los ficheros
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
            }
        }
    }

    # Calcular las notas por area
    public static function calcularNotaArea($notas)
    {
        $resultado = 0;
        while ($area = $notas->fetchObject()) {
            $nota = ($area->porcentaje_materia / 100) * $area->nota_definitiva;
            $resultado += $nota;
        }
        return round($resultado, 0, PHP_ROUND_HALF_UP);
    }

    # revisar el estado del boletin para mostrar la alerta cuando este habilitado
    public static function estadoBoletinAlerta()
    {
        $boletin = new Boletin();
        $estadoBoletin = $boletin->estadoBoletin();
        $_SESSION['estadoBoletin'] = $estadoBoletin->estado;
    }
} #fin de la clase
