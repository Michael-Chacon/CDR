<?php
require_once 'models/docente.php';
require_once 'models/grados.php';
require_once 'models/asignaciones.php';

class AsignacionesController
{
    public function vista_asignaciones()
    {
        $docentes = new Docente();
        $listado = $docentes->allDocentes();
        require_once 'views/administrativo/asignaciones/Adocentes.php';
    }

    # listado de todos los grado disponibles para registrar a los docente en ellos
    public function vista_Agrados()
    {
        # listar los grados asignados
        $id_docente = $_GET['id_docente'];
        $grados_ya_asignados = new Asignaciones();
        $grados_ya_asignados->setIdDocente($id_docente);
        $asignados = $grados_ya_asignados->docenteGrados();
        #lostar todos los grados
        $listar_grados = new Grados();
        $listado = $listar_grados->allGrados();
        require_once 'views/administrativo/asignaciones/Agrados.php';
    }

    # grados que en los que va a dictar alguna materia el docente
    public function vista_docenteGrados()
    {
        $id_docente = $_GET['id_docente'];
        $grados_asignados = new Asignaciones();
        $grados_asignados->setIdDocente($id_docente);
        $lista = $grados_asignados->docenteGrados();
        require_once 'views/administrativo/asignaciones/docenteGrados.php';
    }

    # listado de materias sin asginar de un grado especifico
    public function vista_Amaterias()
    {
        $id_grado = $_GET['id_grado'];
        $nombre = $_GET['nombre'];
        $id_docente = $_GET['docente'];
        $materias_grado = new Asignaciones();
        $materias_grado->setIdDocente($id_docente);
        $materias_grado->setGrados($id_grado);
        $lista_m = $materias_grado->gradoMaterias();

        # obtener las materias asignadas
        $materias_asignadas = new Asignaciones();
        $materias_asignadas->setIdDocente($id_docente);
        $materias_asignadas->setGrados($id_grado);
        $listado_materias = $materias_asignadas->materiasAsignadas();
        require_once 'views/administrativo/asignaciones/Amaterias.php';
    }

    # asignale los grados en los cuales va a dictar clase un docente
    public function registrarGrados()
    {
        $id_docente = $_POST['id_docente'];
        $grados = $_POST['grados'];

        $docente_grados = new Asignaciones();
        $docente_grados->setIdDocente($id_docente);
        $docente_grados->setGrados($grados);
        $resultado = $docente_grados->guardarGrados();
        Utils::alertas($resultado, 'Asignación de grados exitosa.', 'Algo salió mal al asignar los grados al docente, inténtelo nuevamente.');
        header("Location: " . base_url . 'Asignaciones/vista_asignaciones');
    }

    # des asignar grados al docente
    public function desasignarGrados()
    {
        $id_docente = $_POST['id_docente'];
        $grados = $_POST['grados'];
        $eliminar = new Asignaciones();
        $eliminar->setIdDocente($id_docente);
        $eliminar->setGrados($grados);
        $resultado = $eliminar->EliminiarAsignacionDGrado();
        Utils::alertas($resultado, 'Los grados se ha des asignado con éxito.', 'Algo salió mal al des asignar los grados, inténtelo de nuevo.');
        header("Location: " . base_url . 'Asignaciones/vista_Agrados&id_docente=' . $id_docente);
    }

    # asignale materias de un determinado grado a un docente
    public function registrarMateriasADocente()
    {
        $materias = $_POST['materias'];
        $docente = $_POST['docente'];
        $docente_materias = new Asignaciones();
        $docente_materias->setIdDocente($docente);
        $docente_materias->setMateria($materias);
        $resultado = $docente_materias->docenteMateria();
        # camiar el campo "asignada" de la tabla materia para que al consultar las materias del grupo aparescan solo las que tengan "no" en campo asignada
        $actualizar_estado_materia = new Asignaciones();
        $actualizar_estado_materia->setMateria($materias);
        $estado = $actualizar_estado_materia->cambiarEstadoAsignacion(true);
        Utils::alertas($resultado, 'Materias asignadas.', 'en la asignación de las materias.');
        header("Location: " . base_url . 'Asignaciones/vista_Amaterias&id_grado=' . $_POST['grado'] . '&nombre=' . $_POST['nombre'] . '&docente=' . $docente);
    }

    # metodo para desasignar materias a docentes en caso de que se halla cometido un error
    public function desasignarMateriaHaDocentes()
    {
        $grado = trim($_POST['grado']);
        $docente = trim($_POST['docente']);
        $materias = $_POST['asignadas'];
        $eliminar = new Asignaciones();
        $eliminar->setMateria($materias);
        $eliminar->setIdDocente($docente);
        $resultado = $eliminar->eliminarAsignacionMaterias();
        if ($resultado) {
            # camibiar el estado de la materia a 'no'
            $actualizar_estado_materia = new Asignaciones();
            $actualizar_estado_materia->setMateria($materias);
            $estado = $actualizar_estado_materia->cambiarEstadoAsignacion(false);
        }
        Utils::alertas($resultado, 'Materias retirada con éxito', 'en la desasignación de las materias.');
        header("Location: " . base_url . 'Asignaciones/vista_Amaterias&id_grado=' . $_POST['grado'] . '&nombre=' . $_POST['nombre'] . '&docente=' . $docente);

    }
}
