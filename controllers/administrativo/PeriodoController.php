<?php
require_once 'models/periodos.php';
class PeriodoController
{
    public function vista_config()
    {
        $lista_periodos = new Periodos();
        $listado = $lista_periodos->listar();
        require_once 'views/administrativo/periodo/periodo.php';
    }

    public function vista_actualizar()
    {
        $periodo_id = $_GET['id_periodo'];
        $datos = new Periodos();
        $datos->setId($periodo_id);
        $info_periodo = $datos->onePeriodo();
        require_once 'views/administrativo/periodo/actualizarPeriodo.php';
    }

    public function actualizarPeriodo()
    {
        if (isset($_POST) && !empty($_POST)) {
            $id_periodo = trim($_POST['id_periodo']);
            $inicio = trim($_POST['inicio']);
            $fin = trim($_POST['fin']);
            echo $id_periodo;

            if (empty($_POST['estado'])) {
                $estado = 'Inactivo';
            } else {
                $estado = 'Activo';
            }

            // $validar_fechas = new Periodos();
            // $validar_fechas->setFechaFin($fin);
            // $validar_fechas->setFechaInicio($inicio);
            // $resultado = $validar_fechas->ValidarFechas();

            // if ($resultado) {
            $guardar = new Periodos();
            $guardar->setNumero($id_periodo);
            $guardar->setFechaInicio($inicio);
            $guardar->setFechaFin($fin);
            $guardar->setEstado($estado);
            $retorno = $guardar->guardarPeriodo();
            Utils::validarReturn($retorno, 'periodo');
            // } else {
            //     Utils::validarReturn($resultado, 'validacion_fechas');
            // }

        } # fin del post
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
