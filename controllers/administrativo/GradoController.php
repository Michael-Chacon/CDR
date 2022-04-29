<?php
require_once 'models/grados.php';
require_once 'models/materias.php';
class GradoController
{
    public function grado()
    {
        $lista_grados = new Grados();
        $datos = $lista_grados->allGrados();
        require_once 'views/administrativo/grado/grado.php';
    }

    public function guardarGrado()
    {
        if (isset($_POST)) {
            $numero = trim($_POST['grado']);
            $validacion = new Grados();
            $validacion->setGrado($numero);
            $retorno = $validacion->validar();
            if ($retorno) {
                $grado = new Grados();
                $grado->setGrado($numero);
                $resultado = $grado->guardar();
                if ($resultado) {
                    $_SESSION['guardar_grado'] = 'exito';
                } else {
                    $_SESSION['guardar_grado'] = 'fallo';
                }
            } else {
                $parametro = false;
                Utils::validarReturn($parametro, 'validarGrado');
            }
            header('Location: ' . base_url . 'Grado/grado');
        }
    }

    public function eliminarGrado()
    {
        $id_grado = $_GET['id_grado'];
        $eliminar = new Grados();
        $eliminar->setId($id_grado);
        $resultado = $eliminar->deleteGrado();
        Utils::validarReturn($resultado, 'eliminarGrado');
        header('Location: ' . base_url . 'Grado/grado');
    }

    # Generar pdf con el listado de los estudiantes del grado
    public function listadoEstudiante()
    {
        $grado = $_GET['grado'];
        $nombre_grado  = $_GET['nombreg'];
        $students = new Grados();
        $students->setGrado($grado);
        $listado_estudiantes = $students->EstudiantesGrado();
        require_once 'views/pdf/grados.php';
    }

}
