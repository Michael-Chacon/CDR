<section class="container-fluid">
	<section class="row shadow titulo">
            <article class="col-xs-12col-sm-12col-md-12 col-lg-12">
                <h1 class="text-center config">
			Docentes
                </h1>
            </article>
        </section>
	 	<h2 class="text-center mt-4 mb-4 espezor">
            <i class="bi bi-clipboard-check"></i>
            Asignaciones de grados y materias.
        </h2>
	<section class="row">
        <?php echo Utils::general_alerts('grado_docente', 'Asignación de grados exitosa.', 'Algo salió mal al asignar los grados al docente, inténtelo nuevamente.'); ?>
        <?php Utils::borrar_error('grado_docente');?>
        		<article class="row justify-content-center">
                <?php if (isset($listado)):
  			  while ($docentes = $listado->fetchObject()): ?>
	                    <article class="col-md-5">
                            <ul class="list-group shadow seccionD">
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg2">
                                            <img alt="" class="avatar-docente nombreD" src="<?=base_url?>helpers/img/obito.png">
                                            </img>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                                            <h6 class="nombreD">
                                               <?=$docentes->nombre_d?> <?=$docentes->apellidos_d?>
                                            </h6>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <a href="<?=base_url?>Asignaciones/vista_Agrados&id_docente=<?=$docentes->id?>" class="btn btn-outline-dark" type="button">
                                                Asignar grados
                                            </a>
                                        </div>
                                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                            <a href="<?=base_url?>Asignaciones/vista_docenteGrados&id_docente=<?=$docentes->id?>" class="btn btn-outline-success" type="button">
                                                Asignar materias
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </article>    
	                	<?php endwhile;
			endif;?>
			</article>
                    </section>
</section>