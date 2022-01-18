<?php
require_once 'models/administrativo/periodos.php';
class PeriodoController
{
    public function vista_config()
    {
        $lista_periodos = new Periodos();
        $listado = $lista_periodos->listar();
        require_once 'views/administrativo/periodo/periodo.php';
    }
    public function registrarPeriodo()
    {
        if (isset($_POST) && !empty($_POST)) {
            $numero = trim($_POST['numero']);
            $inicio = trim($_POST['inicio']);
            $fin = trim($_POST['fin']);

            if (empty($_POST['estado'])) {
                $estado = 'Inactivo';
            } else {
                $estado = 'Activo';
            }

            $validar_numero = new Periodos();
            $validar_numero->setNumero($numero);
            $resultado_numero = $validar_numero->validarNumero();

            if ($resultado_numero) {
                $validar_fechas = new Periodos();
                $validar_fechas->setFechaFin($fin);
                $validar_fechas->setFechaInicio($inicio);
                $resultado = $validar_fechas->ValidarFechas();

                if ($resultado) {
                    $guardar = new Periodos();
                    $guardar->setNumero($numero);
                    $guardar->setFechaInicio($inicio);
                    $guardar->setFechaFin($fin);
                    $guardar->setEstado($estado);
                    $retorno = $guardar->guardarPeriodo();
                    Utils::validarReturn($retorno, 'periodo');
                } else {
                    Utils::validarReturn($resultado, 'validacion_fechas');
                }
            } else {
                Utils::validarReturn($resultado_numero, 'validacion_numero');
            }

        }
        header("Location: " . base_url . 'Periodo/vista_config');
    }

    public function eliminarPeriodo()
    {
        if (!empty($_GET['id_periodo'])) {
            $periodo = $_GET['id_periodo'];
            $eliminar = new Periodos();
            $eliminar->setId($periodo);
            $resultado = $eliminar->deletePeriodo();
            Utils::validarReturn($resultado, 'eliminarPeriodo');
        }
        header("Location: " . base_url . 'Periodo/vista_config');
    }
} # fin de la clase
