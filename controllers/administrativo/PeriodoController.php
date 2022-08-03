<?php
require_once 'models/periodos.php';
require 'models/auditoria.php';
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

    public function auditarPeriodos()
    {
        $auditar = new Auditoria();
        $modificaciones = $auditar->periodoAcademicos();
        require_once 'views/administrativo/periodo/auditoriaPeriodo.php';
    }

    public function actualizarPeriodo()
    {
        if (isset($_POST) && !empty($_POST)) {
            $id_periodo = trim($_POST['id_periodo']);
            $inicio = trim($_POST['inicio']);
            $fin = trim($_POST['fin']);

            if (empty($_POST['estado'])) {
                $estado = 'Inactivo';
            } else {
                $estado = 'Activo';
            }
            # auditar actualización del los periodos academicos
            $auditar = new auditoria();
            $auditar->auditarPeriodo($id_periodo, $inicio, $fin, $estado);
            # Registrar periodo
            $guardar = new Periodos();
            $guardar->setNumero($id_periodo);
            $guardar->setFechaInicio($inicio);
            $guardar->setFechaFin($fin);
            $guardar->setEstado($estado);
            $retorno = $guardar->guardarPeriodo();
            Utils::alertas($retorno, 'Periodo académico registrado con éxito.', 'Algo salió mal al registrar el periodo académico, inténtelo de nuevo.');

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
            Utils::alertas($resultado, 'El periodo fue eliminado con éxito.', 'Algo salió mal al eliminar el periodo.');
        }
        header("Location: " . base_url . 'Periodo/vista_config');
    }
} # fin de la clase
