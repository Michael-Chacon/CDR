<?php
require_once 'models/grados.php';

class DirectorController
{
    # vista para los directores de grado
    public function vista_director()
    {
        if (!isset($_GET['subject']) || !isset($_GET['name']) || !isset($_GET['degree']) || !isset($_GET['nombreg'])) {
            Utils::Error404();
        } elseif (empty(Utils::decryption($_GET['subject'])) || empty(Utils::decryption($_GET['degree'])) || empty($_GET['name']) || empty($_GET['nombreg'])) {
            Utils::Error404();
        } else {
            $id_subject = Utils::decryption($_GET['subject']);
            $name_subject = $_GET['name'];
            $id_degree = Utils::decryption($_GET['degree']);
            $name_degree = $_GET['nombreg'];

            $listado = new Grados();
            $listado->setGrado($id_degree);
            $listado_estudiantes = $listado->EstudiantesGrado();

            require_once 'views/docente/homeDirector.php';
        }
    }
}
