<?php
require_once 'models/grados.php';

class DirectorController
{
    # vista para los directores de grado
    public function vista_director()
    {
        $id_subject = Utils::decryption($_GET['subject']);
        $name_subject = $_GET['name'];
        $id_degree = Utils::decryption($_GET['degree']);
        $name_degree = $_GET['namede'];

        $listado = new Grados();
        $listado->setGrado($id_degree);
        $listado_estudiantes = $listado->EstudiantesGrado();

        require_once 'views/docente/homeDirector.php';
    }
}
