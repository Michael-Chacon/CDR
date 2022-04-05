<?php
require_once 'models/asignaciones.php';
class MisMateriasController
{
    public function misMaterias()
    {
        $id_grado = Utils::decryption($_GET['grado']);
        $nombre_grado = $_GET['nombre'];
        if (isset($_GET['idd'])) {
            $docente = $_GET['idd'];
        } else {
            $docente = $_SESSION['teacher']->id;
        }

        $materias = new Asignaciones();
        $materias->setGrados($id_grado);
        $materias->setIdDocente($docente);
        $allMaterias = $materias->materiasAsignadas();
        require_once 'views/docente/misMaterias.php';
    }
}
