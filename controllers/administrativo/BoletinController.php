<?php
require_once 'models/boletin.php';
require_once 'models/auditoria.php';
class BoletinController
{
    public function guardarBoletin()
    {
        # ver si el estudiante recupero
        if (isset($_POST['recuperacion']) && $_POST['recuperacion'] == 'yes') {
            $recuperacion = 'R';
        } else {
            $recuperacion = '';
        }

        $id_estudiante = $_POST['estudiante'];
        $id_materia = $_POST['materia'];
        $id_area = $_POST['area'];
        $id_periodo = $_POST['periodo'];
        $materia = $_POST['nombre_materia'];
        $estudiante = $_POST['nombre_estudiante'];
        $docente = $_POST['docente'];
        $fallas = $_POST['fallas'];
        $observacion = $_POST['observacion'];
        $periodo1 = $_POST['periodo1'];
        $periodo2 = $_POST['periodo2'];
        $periodo3 = $_POST['periodo3'];
        # Hallar el promedio
        switch ($id_periodo) {
            case '1':
                $promedio = $periodo1;
                break;
            case '2':
                $promedio = ($periodo1 + $periodo2) / 2;
                break;
            case '3':
                $promedio = ($periodo1 + $periodo2 + $periodo3) / 3;
                break;
        }
        # Instacia de boletin
        $boletin = new Boletin();
        $boletin->setIdEstudiante($id_estudiante);
        $boletin->setIdMateria($id_materia);
        $boletin->setArea($id_area);
        $boletin->setIdPeriodo($id_periodo);
        $boletin->setMateria($materia);
        $boletin->setEstudiante($estudiante);
        $boletin->setDocente($docente);
        $boletin->setObservacion($observacion);
        $boletin->setRecuperacion($recuperacion);
        $boletin->setPeriodo1($periodo1);
        $boletin->setPeriodo2($periodo2);
        $boletin->setPeriodo3($periodo3);
        $boletin->setPromedio($promedio);
        $boletin->setFallas($fallas);
        $respuesta = $boletin->saveBoletin();
        Utils::alertas($respuesta, 'La nota definitiva se ha enviado hacia el boletín con éxito', 'Algo salió mal al intentar enviar la nota definitiva al boletín, inténtelo de nuevo.');
        header("Location: " . base_url . 'Notas/homeNotas&student=' . Utils::encryption($id_estudiante) . '&materia=' . Utils::encryption($id_materia) . '&nGrado=' . $_POST['nGrado'] . '&event=bad');
    }

    # Ver el boletin
    public function verBoletin()
    {
        $estudiante = Utils::decryption($_GET['student']);
        $grado = Utils::decryption($_GET['degree']);
        $periodo = Utils::decryption($_GET['period']);
        $boletin = new Boletin();
        $boletin->setIdEstudiante($estudiante);
        $boletin->setIdPeriodo($periodo);

        # Calcular la nota del area y mostrar la materias que perteneces la area y sus respectivas notas
        #   MATEMATICAS
        $matematicas = $boletin->calcularArea('MATEMATICAS');
        $notaMatematicas = Utils::calcularNotaArea($matematicas);
        $areaMatermaticas = $boletin->obtenerMateriasXArea('MATEMATICAS');

        # HUMANIDADES, LENGUA CASTELLANA
        $humanidades = $boletin->calcularArea("HUMANIDADES, LENGUAJE CASTELLANO");
        $notaHumanidades = Utils::calcularNotaArea($humanidades);
        $areaHumanidades = $boletin->obtenerMateriasXArea('HUMANIDADES, LENGUAJE CASTELLANO');

        # CIENCIAS NATURALES Y EDUCACIÓN AMBIENTAL
        $ciencias = $boletin->calcularArea("CIENCIAS NATURALES Y EDUCACIÓN AMBIENTAL");
        $notaCiencias = Utils::calcularNotaArea($ciencias);
        $areaCiencias = $boletin->obtenerMateriasXArea('CIENCIAS NATURALES Y EDUCACIÓN AMBIENTAL');

        # ÁREA TÉCNICA
        $tecnica = $boletin->calcularArea("ÁREA TÉCNICA");
        $notaTecnica = Utils::calcularNotaArea($tecnica);
        $areaTecnica = $boletin->obtenerMateriasXArea("ÁREA TÉCNICA");

        # SIN ÁREA
        $sinArea = $boletin->obtenerMateriasXArea("SIN ÁREA");

        $infoBoletinPeriodo1 = $boletin->puestoPromedioPeriodoX('1');
        $infoBoletinPeriodo2 = $boletin->puestoPromedioPeriodoX('2');
        $infoBoletinPeriodo3 = $boletin->puestoPromedioPeriodoX('3');
        $perdidasPeriodo1 = $boletin->materiasPerdidasPeriodoX('1');
        $perdidasPeriodo2 = $boletin->materiasPerdidasPeriodoX('2');
        $perdidasPeriodo3 = $boletin->materiasPerdidasPeriodoX('3');
        $fallasPeriodo1 = $boletin->totolFallasPeriodoX('1');
        $fallasPeriodo2 = $boletin->totolFallasPeriodoX('2');
        $fallasPeriodo3 = $boletin->totolFallasPeriodoX('3');
        $docenteEstudiante = $boletin;
        $docenteEstudiante->setIdEstudiante($estudiante);
        $informacionUsuarios = $docenteEstudiante->datosDocenteEstudianteGrado($grado);

        # Nota de comportamiento
        $nota_comportamiento = $boletin->comportamiento();

        if (isset($_GET['pdf']) && $_GET['pdf'] == 'b') {
            require_once 'views/pdf/boletin.php';
        } else {
            require_once 'views/administrativo/boletin/boletin.php';
        }
    }

} # fin de la clase
