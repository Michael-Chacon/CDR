<!-- contenido de  la pagina -->
<!-- inicio del menu -->
<section class="container-fluid">
    <section class="row shadow titulo">
        <article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
            <h1 class="text-center config">
             Grado <?=$actual->nombre_g?>
         </h1>
     </article>
     <?php if (!isset($_SESSION['teacher'])): ?>
         <article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
            <acticle class="btn-group dropstart">
                <a class="" data-bs-toggle="dropdown" aria-expanded="false" type="button">
                    <i class="bi bi-list efecto_hover" style="font-size: 2rem; color: white;">
                    </i>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" data-bs-target="#CrearMateria" data-bs-toggle="modal" href="#"><i class="bi bi-book-half"></i>  Asignar materias</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" data-bs-target="#CreatHorario" data-bs-toggle="modal"  href="#"><i class="bi bi-calendar-week"></i> Asignar horario</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#director"><i class="bi bi-check2-square"></i> Asignar director</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#aula"><i class="bi bi-house"></i> Asignar Aula</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <?php if ($direc->rowCount() != 0):?>
                    <li><a class="dropdown-item" href="<?=base_url?>/Grado/eliminarGrado&id_grado=<?=$actual->id?>&name=<?=$actual->nombre_g?>&dir=<?=$direc->fetchObject()->id?>" onclick="return eliminarGrado()"><i class="bi bi-trash"></i>  Eliminar grado</a></li>
                <?php else: ?>
                    <li><a class="dropdown-item" href="<?=base_url?>/Grado/eliminarGrado&id_grado=<?=$actual->id?>&name=<?=$actual->nombre_g?>&dir=" onclick="return eliminarGrado()"><i class="bi bi-trash"></i>  Eliminar grado</a></li>
                <?php endif; ?>
                </ul>
            </acticle>
        </article>
    <?php endif;?>
</section>
<?php echo Utils::getAlert() ?>
    <?php Utils::borrar_error('alert');?>
<?php if (!isset($_SESSION['teacher'])): ?>
    <section class="row">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <article class="row">
            <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <section class="mt-3 mb-3 callout callout-primary ">
                    <?php if ($dir->rowCount() != 0): ?>
                        <span class="nombre-director">
                            <?php $director = $dir->fetchObject()?>
                            <?=$director->nombre_d?> <?=$director->apellidos_d?>
                        </span>
                    <?php else: ?>
                        <span class="badge bg-danger">No hay</span>
                    <?php endif;?>
                    <span class="director">
                        (Director)
                    </span>
                </section>
            </article>
            <article class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <section class="mt-3 mb-3 callout callout-success">
                    <?php if ($aula_grado->rowCount() != 0): ?>
                        <span class="nombre-director">
                            <?php $aula = $aula_grado->fetchObject()?>
                            <?=$aula->nombre?>
                        </span>
                    <?php else: ?>
                        <span class="badge bg-danger">No hay</span>
                    <?php endif;?>
                    <span class="director">
                        (Aula)
                    </span>
                </section>
            </article>
            </article>

        </article>
    </section>
<?php endif;?>
</section>
<!-- fin del menu -->
<!-- inicio del contenedor principal -->
<section class="container-fluid">
<a href="<?=base_url?>Grado/listadoEstudiante&grado=<?=$grado?>&nombreg=<?=$actual->nombre_g?>" type="button" class="btn btn-success btn-sm">Listado de estudianes (PDF)</a>
 <!-- inicio pills  -->
 <article class="col-md-12 mt-3">
    <article class="row">
        <ul class="nav nav-pills mb-3 titulos-pills " id="pills-tab" role="tablist">
            <li class="nav-item opciones" role="presentation">
                <button aria-controls="pills-home" aria-selected="true" class="nav-link active boton-opciones" data-bs-target="#pills-materias" data-bs-toggle="pill" id="pills-home-tab" role="tab" type="button">
                    Materias
                </button>
            </li>
            <li class="nav-item opciones" role="presentation">
                <button aria-controls="pills-profile" aria-selected="false" class="nav-link boton-opciones" data-bs-target="#pills-estudiantes" data-bs-toggle="pill" id="pills-profile-tab" role="tab" type="button">
                    Estudiantes
                </button>
            </li>
            <li class="nav-item opciones" role="presentation">
                <button aria-controls="pills-contact" aria-selected="false" class="nav-link boton-opciones" data-bs-target="#pills-horario" data-bs-toggle="pill" id="pills-contact-tab" role="tab" type="button">
                    Horario
                </button>
            </li>
        </ul>
        <section class="tab-content" id="pills-tabContent">
            <section aria-labelledby="pills-home-tab" class="tab-pane fade show active" id="pills-materias" role="tabpanel">
                <!-- inicio materias -->
                <section class="row">
                    <?php if (isset($_SESSION['guardar_materia'])): ?>
                        <div class="alert alert-dismissible fade show text-center alerta-ok" role="alert">
                          <?=$_SESSION['guardar_materia']?>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                  <?php endif;?>
                  <?php Utils::borrar_error('guardar_materia')?>
                  <h3 class="text-center mb-2 mt-3 titulo-perfil">
                    Materias
                </h3>
                <?php if (isset($datos) && $datos->rowCount() != 0):
    while ($materias = $datos->fetchObject()): ?>
	                   <article class="col-xs-12 col-sm-6 col-md-4 col-xl-4 mb-2">
	                       <div class="card text-center shadow option">
	                           <div class="card-body contenido-card materias">
	                               <i class="<?=$materias->icono?>" style="font-size: 3rem;">
	                               </i>
	                               <hr class="hr-perfil"/>
	                               <h5 class="mt-2">
	                                   <?=$materias->nombre_mat?>
	                               </h5>
	                               <?php if (isset($_SESSION['teacher'])): ?>
	                                   <a class="stretched-link" href="<?=base_url?>Director/vista_director&subject=<?=Utils::encryption($materias->id)?>&degree=<?=Utils::encryption($actual->id)?>&name=<?=$materias->nombre_mat?>&nombreg=<?=$actual->nombre_g?>">
	                                   </a>
	                               <?php else: ?>
                                <a class="stretched-link" href="<?=base_url?>PanelMateria/homeMateria&ide=<?=Utils::encryption($materias->id)?>&name=<?=$materias->nombre_mat?>&degree=<?=Utils::encryption($actual->id)?>&nombreg=<?=$actual->nombre_g?>">
                                </a>
                            <?php endif;?>
                        </div>
                    </div>
                </article>
            <?php endwhile?>
            <?php else: ?>
                <div class="alert alert-danger text-center" role="alert">
                    No hay materias asignadas a este grado
                </div>
            <?php endif;?>
        </section>
        <!-- fin materias -->
    </section>
    <section aria-labelledby="pills-profile-tab" class="tab-pane fade" id="pills-estudiantes" role="tabpanel">
        <!-- inicio  estudiantes-->
        <section class="row justify-content-center">
            <h3 class="text-center mb-2 mt-3 mb-3 titulo-perfil">
                Estudiantes matriculados
            </h3>
            <article class="col-md-8">
             <ul class="list-group mb-4 padre">
                <li class="list-group-item ">
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            #
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            Foto
                        </div>
                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            Nombre
                        </div>
                    </div>
                </li>
            </ul>
            <?php if (isset($estudi) && $estudi->rowCount() != 0):
    $c = 1;
    while ($estudiantes = $estudi->fetchObject()): ?>
	              <ul class="list-group mb-1 ">
	               <li class="list-group-item fila-estudiante">
	                       <a class="stretched-link" href="<?=base_url?>Estudiante/perfilEstudiante&x=<?=$estudiantes->id?>&y=<?=$estudiantes->id_familia_e?>&z=<?=$estudiantes->id_grado?>">
	                       </a>
	                   <div class="row">
	                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 nombre-apellidos-numero">
	                        <?=$c++?>
	                    </div>
	                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                            <?php if ($estudiantes->img == null): ?>
                                <img alt="" class="avatar-tabla circulo" src="<?=base_url?>helpers/img/avatar.jpg"></img>
                            <?php else: ?>
                               <img alt="" class="avatar-tabla circulo" src="<?=base_url?>photos/estudiantes/<?=$estudiantes->img?>"></img>
                           <?php endif;?>
                       </div>
	                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 nombre-apellidos-numero">
	                    <?=$estudiantes->apellidos_e?>
	                    <?=$estudiantes->nombre_e?>
	                </div>
	            </div>
	        </li>
	    </ul>
	<?php endwhile?>
<?php else: ?>
    <div class="alert alert-danger text-center" role="alert">
        No hay estudiantes registrados en este grado.
    </div>
<?php endif;?>
</article >
</section>
<!-- fin estudiantes -->
</section>
<section aria-labelledby="pills-contact-tab" class="tab-pane fade" id="pills-horario" role="tabpanel">
    <!--inicion del horario  -->
    <section class="row">
        <h3 class="text-center mb-2 mt-3 titulo-perfil">
            Horario de clase
        </h3>
        <article class="col-md-4 text-center">
            <span class="dia">
                Lunes
            </span>
            <hr/>
            <?php if ($lista_lunes->rowCount() != 0): ?>
                <div>
                    <table class="table shadow text-center table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">
                                    Inicio
                                </th>
                                <th scope="col">
                                    Fin
                                </th>
                                <th scope="col">
                                    Materia
                                </th>
                                <?php if (isset($_SESSION['user'])): ?>
                                    <th scope="col">
                                        <i class="bi bi-trash"></i>
                                    </th>
                                <?php endif;?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($lunes = $lista_lunes->fetchObject()): ?>
                                <tr>
                                    <td>
                                        <?=$lunes->inicio?>
                                    </td>
                                    <td>
                                        <?=$lunes->fin?>
                                    </td>
                                    <td>
                                        <?=$lunes->nombre_mat?>
                                    </td>
                                    <?php if (isset($_SESSION['user'])): ?>
                                        <td>
                                            <a href="<?=base_url?>Horario/eliminarHora&id_horario=<?=$lunes->dia?>&dia=lunes&grado=<?=$_GET['id_grado']?>" onclick="return confirmar()">
                                                <i class="bi bi-trash delete-horario" style="color: #7C368F;"></i>
                                            </a>
                                        </td>
                                    <?php endif;?>
                                </tr>
                            <?php endwhile;?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay materias asignadas.</span></p>
            <?php endif;?>
            <hr/>
        </article>
        <article class="col-md-4 text-center">
            <span class="dia">
                Martes
            </span>
            <hr/>
            <?php if ($lista_martes->rowCount() != 0): ?>
                <div>
                    <table class="table shadow text-center table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">
                                    Inicio
                                </th>
                                <th scope="col">
                                    Fin
                                </th>
                                <th scope="col">
                                    Materia
                                </th>
                                <?php if (isset($_SESSION['user'])): ?>
                                    <th scope="col">
                                        <i class="bi bi-trash"></i>
                                    </th>
                                <?php endif;?>
                            </tr>
                        </thead>
                        <tbody>
                           <?php while ($martes = $lista_martes->fetchObject()): ?>
                            <tr>
                                <td>
                                    <?=$martes->inicio?>
                                </td>
                                <td>
                                    <?=$martes->fin?>
                                </td>
                                <td>
                                    <?=$martes->nombre_mat?>
                                </td>
                                <?php if (isset($_SESSION['user'])): ?>
                                    <td>
                                        <a href="<?=base_url?>Horario/eliminarHora&id_horario=<?=$martes->dia?>&dia=martes&grado=<?=$_GET['id_grado']?>" onclick="return confirmar()">
                                            <i class="bi bi-trash delete-horario" style="color: #7C368F;"></i>
                                        </a>
                                    </td>
                                <?php endif;?>
                            </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay materias asignadas.</span></p>
        <?php endif;?>
        <hr/>
    </article>
    <article class="col-md-4 text-center">
        <span class="dia">
            Miércoles
        </span>
        <hr/>
        <?php if ($lista_miercoles->rowCount() != 0): ?>
            <div>
                <table class="table shadow text-center table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">
                                Inicio
                            </th>
                            <th scope="col">
                                Fin
                            </th>
                            <th scope="col">
                                Materia
                            </th>
                            <?php if (isset($_SESSION['user'])): ?>
                                <th scope="col">
                                    <i class="bi bi-trash"></i>
                                </th>
                            <?php endif;?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($miercoles = $lista_miercoles->fetchObject()): ?>
                            <tr>
                                <td>
                                    <?=$miercoles->inicio?>
                                </td>
                                <td>
                                    <?=$miercoles->fin?>
                                </td>
                                <td>
                                    <?=$miercoles->nombre_mat?>
                                </td>
                                <?php if (isset($_SESSION['user'])): ?>
                                    <td>
                                        <a href="<?=base_url?>Horario/eliminarHora&id_horario=<?=$miercoles->dia?>&dia=miercoles&grado=<?=$_GET['id_grado']?>" onclick="return confirmar()">
                                            <i class="bi bi-trash delete-horario" style="color: #7C368F;"></i>
                                        </a>
                                    </td>
                                <?php endif;?>
                            </tr>
                        <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay materias asignadas.</span></p>
        <?php endif;?>
        <hr/>
    </article>
    <article class="col-md-4 text-center">
        <span class="dia">
            Jueves
        </span>
        <hr/>
        <?php if ($lista_jueves->rowCount() != 0): ?>
            <div>
                <table class="table shadow text-center table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">
                                Inicio
                            </th>
                            <th scope="col">
                                Fin
                            </th>
                            <th scope="col">
                                Materia
                            </th>
                            <?php if (isset($_SESSION['user'])): ?>
                                <th scope="col">
                                    <i class="bi bi-trash"></i>
                                </th>
                            <?php endif;?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($jueves = $lista_jueves->fetchObject()): ?>
                         <tr>
                            <td>
                                <?=$jueves->inicio?>
                            </td>
                            <td>
                                <?=$jueves->fin?>
                            </td>
                            <td>
                                <?=$jueves->nombre_mat?>
                            </td>
                            <?php if (isset($_SESSION['user'])): ?>
                                <td>
                                    <a href="<?=base_url?>Horario/eliminarHora&id_horario=<?=$jueves->dia?>&dia=jueves&grado=<?=$_GET['id_grado']?>" onclick="return confirmar()">
                                        <i class="bi bi-trash delete-horario" style="color: #7C368F;"></i>
                                    </a>
                                </td>
                            <?php endif;?>
                        </tr>
                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay materias asignadas.</span></p>
    <?php endif;?>
    <hr/>
</article>
<article class="col-md-4 text-center ">
    <span class="dia">
        Viernes
    </span>
    <hr/>
    <?php if ($lista_viernes->rowCount() != 0): ?>
        <div>
            <table class="table shadow text-center table-bordered table-hover ">
                <thead>
                    <tr>
                        <th scope="col">
                            Inicio
                        </th>
                        <th scope="col">
                            Fin
                        </th>
                        <th scope="col">
                            Materia
                        </th>
                        <?php if (isset($_SESSION['user'])): ?>
                            <th scope="col">
                                <i class="bi bi-trash"></i>
                            </th>
                        <?php endif;?>
                    </tr>
                </thead>
                <tbody>
                   <?php while ($viernes = $lista_viernes->fetchObject()): ?>
                     <tr>
                        <td>
                            <?=$viernes->inicio?>
                        </td>
                        <td>
                            <?=$viernes->fin?>
                        </td>
                        <td>
                            <?=$viernes->nombre_mat?>
                        </td>
                        <?php if (isset($_SESSION['user'])): ?>
                            <td>
                                <a href="<?=base_url?>Horario/eliminarHora&id_horario=<?=$viernes->dia?>&dia=viernes&grado=<?=$_GET['id_grado']?>" onclick="return confirmar()">
                                    <i class="bi bi-trash delete-horario" style="color: #7C368F;"></i>
                                </a>
                            </td>
                        <?php endif;?>
                    </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
<?php else: ?>
 <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay materias asignadas.</span></p>
<?php endif;?>
<hr/>
</article>
</section>
<!-- fin del horario -->
</section>
</section>
</article>
</article>
<!-- fin pills -->
</section>
<!-- fin del contenedor principal -->
</section>
</main>
        <!-- ================================================
            ====================MODALES===================
            ===============================================-->
            <!-- asignar director -->
            <!-- Modal -->
            <section aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="director" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Asignar director de grado
                            </h5>
                            <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url?>Docente/directorGrado" method="post">
                                <input type="text" name="grado" value="<?=$actual->id?>" hidden />
                                <?php if ($docentes->rowCount() != 0): ?>
                                    <?php while ($docente = $docentes->fetchObject()): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" id="radio<?=$docente->id?>" name="director" value="<?=$docente->id?>" type="radio"/>
                                            <label class="form-check-label" for="radio<?=$docente->id?>">
                                                <?=$docente->nombre_d?> <?=$docente->apellidos_d?>
                                            </label>
                                        </div>
                                <?php endwhile;?>
                            <?php else: ?>
                                <div class="alert alert-danger text-center" role="alert">
                                    No hay docentes disponibles.
                                </div>
                            <?php endif;?>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-bs-dismiss="modal" type="button">
                                Cancelar
                            </button>
                            <button class="btn btn-primary" type="submit">
                                Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- fin de asignar director -->
        <!-- asignar aula -->
        <!-- Modal -->
        <section aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="aula" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Asignar aula al grado
                        </h5>
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url?>Aula/asignarAula" method="post">
                            <input type="text" name="grado" value="<?=$actual->id?>" hidden>
                            <?php if ($listado_aulas->rowCount() != 0): ?>
                                <?php while ($aula = $listado_aulas->fetchObject()): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" id="radio<?=$aula->id_aula?>" name="aula" value="<?=$aula->id_aula?>" type="radio">
                                        <label class="form-check-label" for="radio<?=$aula->id_aula?>">
                                            <h5>
                                                <?=$aula->nombre?>
                                            </h5>
                                        </label>
                                    </input>
                                </div>
                            <?php endwhile;?>
                        <?php else: ?>
                            <div class="alert alert-danger text-center" role="alert">
                                No hay aulas.
                            </div>
                        <?php endif;?>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button">
                            Cancelar
                        </button>
                        <button class="btn btn-primary" type="submit">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- fin de asignar aula -->
    <!-- Modal crear materia-->
    <section aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" data-bs-backdrop="static" id="CrearMateria" tabindex="-1">
        <section class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Selecciona las materias que vas a asignar a este grado
                    </h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    </button>
                </div>
                <form action="<?=base_url?>Materias/guardarMateria" method="post">
                    <div class="modal-body">
                     <input type="hidden" name="id_grado" id="" value="<?=$_GET['id_grado']?>">
                     <ul class="list-group">
                        <?php while($subjectss = $listado_materias->fetchObject()): ?>
                          <li class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" name="materia_area_iconos[]" value="<?=$subjectss->nombre_materia?>/<?=$subjectss->id_area_m?>/<?=$subjectss->icono?>/<?=$subjectss->porcentaje_materia_b?>" aria-label="...">
                            <i class="<?=$subjectss->icono?>"></i> <?=$subjectss->nombre_materia?>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">
                    Cancelar
                </button>
                <button class="btn btn-primary" type="submit">
                    Registrar
                </button>
            </div>
    </form>
</div>
</section>
</section>
<!-- fin Modal crear materia-->
<!-- Modal crear horario-->
<section aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" data-bs-backdrop="static" id="CreatHorario" tabindex="-1">
    <section class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Crea Horario
                </h5>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                </button>
            </div>
            <form action="<?=base_url?>Horario/registrarHorario" method="post">
                <input type="hidden" name="id_grado" id="" value="<?=$_GET['id_grado']?>">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <select aria-label=".form-select-lg example" class="form-select form-select-lg mb-3" name="id_materia" required="">
                            <option></option>
                            <?php while ($materia = $matter->fetchObject()): ?>
                                <option value="<?=$materia->id?>">
                                    <?=$materia->nombre_mat?>
                                </option>
                            <?php endwhile;?>
                        </select>
                        <label for="materia">
                            Materia:
                        </label>
                    </div>
                    <div class="form-floating mb-3">
                        <select aria-label=".form-select-lg example" class="form-select form-select-lg mb-3" name="dia">
                            <option selected="">
                            </option>
                            <option value="lunes">
                                Lunes
                            </option>
                            <option value="martes">
                                Martes
                            </option>
                            <option value="miercoles">
                                Miércoles
                            </option>
                            <option value="jueves">
                                Jueves
                            </option>
                            <option value="viernes">
                                Viernes
                            </option>
                        </select>
                        <label for="materia">
                            Día de la semana:
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input class="form-control" id="floatingInput" placeholder="Inicio" type="time" name="inicio">
                                <label for="floatingInput">
                                    Hora de inicio:
                                </label>
                            </input>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-3">
                            <input class="form-control" id="floatingInput" placeholder="Fin" type="time" name="fin">
                            <label for="floatingInput">
                                Hora de fin:
                            </label>
                        </input>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal" type="button">
                Cancelar
            </button>
            <button class="btn btn-primary" type="submit">
                Registrar
            </button>
        </div>
    </form>
</div>
</section>
</section>
<!-- fin Modal crear horario-->
