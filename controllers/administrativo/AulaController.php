<?php
require_once 'models/grados.php';

class AulaController
{
    public function asignarAula()
    {
        $grado = $_POST['grado'];
        $aula = $_POST['aula'];
        $asignador = new Grados();
        $asignador->setAula($aula);
        $asignador->setGrado($grado);
        $respuesta = $asignador->assignedClassroomToDeegre();
        if ($respuesta) {
            $asignador->updateStateOfClassroom();
        }
        Utils::validarReturn($respuesta, 'asignarAula');
        header('Location:' . base_url . 'Materias/vista&id_grado=' . $grado);
    }
}
