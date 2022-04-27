<?php
require_once 'models/observador.php';

class ObservadorController
{
    public function vista_observador()
    {
        if (!isset($_GET['id']) || !isset($_GET['g']) || !isset($_GET['name'])) {
            Utils::Error404();
        } elseif (empty(Utils::decryption($_GET['id'])) || empty(Utils::decryption($_GET['g'])) || empty($_GET['name'])) {
            Utils::Error404();
        } else {
            $estudiante = Utils::decryption($_GET['id']);
            $observaciones = new Observador();
            $observaciones->setEstudiante($estudiante);
            $listado_observaciones = $observaciones->getObservation();
            require_once 'views/docente/observador.php';
        }
    }

    public function guardar_observacion()
    {
        $estudiante = $_POST['id_estudiante'];
        $nombre_e = $_POST['estudiante'];
        $grado = $_POST['grado'];
        $fecha = $_POST['fecha'];
        $docente = $_POST['docente'];
        $observacion = $_POST['observacion'];
        $acciones = $_POST['acciones_compromisos'];

        $observador = new Observador();
        $observador->setEstudiante($estudiante);
        $observador->setFecha($fecha);
        $observador->setGrado($grado);
        $observador->setDocente($docente);
        $observador->setNombreE($nombre_e);
        $observador->setObservacion($observacion);
        $observador->setAcciones($acciones);
        $respuesta = $observador->saveWatcher();

        Utils::validarReturn($respuesta, 'guardar_observacion');
        header('Location: ' . base_url . 'Observador/vista_observador&id=' . Utils::encryption($estudiante) . '&name=' . $nombre_e . '&g=' . Utils::encryption($grado));
    }
}
