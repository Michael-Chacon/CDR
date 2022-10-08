<?php
require_once 'models/grados.php';
require_once 'models/materias.php';
require_once 'models/auditoria.php';
require_once 'models/docente.php';
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
            $numero = trim(strtoupper(Utils::clearStrings($_POST['grado'])));

            $validacion = new Grados();
            $validacion->setGrado($numero);
            $retorno = $validacion->validar();
            if ($retorno) {
                $grado = new Grados();
                $grado->setGrado($numero);
                $resultado = $grado->guardar();
                Utils::alertas($resultado, 'Grado registrado con exito.', 'Algo salio mal al registrar el grado.');
            } else {
                $parametro = false;
                Utils::alertas($parametro, '', 'El  grado que intenta registrar ya existe.');
            }
            header('Location: ' . base_url . 'Grado/grado');
        }
    }

       # Generar pdf con el listado de los estudiantes del grado
    public function listadoEstudiante()
    {
        $grado = $_GET['grado'];
        $nombre_grado = $_GET['nombreg'];
        $students = new Grados();
        $students->setGrado($grado);
        $listado_estudiantes = $students->EstudiantesGrado();
        require_once 'views/pdf/estudiantesgrado.php';
    }

    public function eliminarGrado()
    {
        $id_director =$_GET['dir'];
        $id_grado = $_GET['id_grado'];
        $grado = $_GET['name'];
        print_r($id_director);
        if (!empty($id_director)) {
            # Desvincular el grado con el docente director
            $director = new Docente();
            $director->setId($id_director);
            $director->uptadeDirector('no');
        }
        # Registrar datos de la eliminación dle grado
        $auditar = new Auditoria();
        $auditar->auditarEliminacionGrado($grado);
        # Eliminar el grado
        $eliminar = new Grados();
        $eliminar->setId($id_grado);
        $resultado = $eliminar->deleteGrado();

        Utils::alertas($resultado, 'El grado se eliminó con éxito.', 'El grado se eliminó con éxito.');
        header('Location: ' . base_url . 'Grado/grado');
    }
}
