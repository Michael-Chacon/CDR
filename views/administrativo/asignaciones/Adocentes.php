<section class="container-fluid">
	<section class="row shadow titulo">
            <article class="col-xs-12col-sm-12col-md-12 col-lg-12">
                <h1 class="text-center config">
			Docentes
                </h1>
            </article>
        </section>
	<h2 class="text-center">
	</h2>
	<section class="row">
        <?php echo Utils::general_alerts('grado_docente', 'Asignación de grados exitosa.', 'Algo salió mal al asignar los grados al docente, inténtelo nuevamente.'); ?>
        <?php Utils::borrar_error('grado_docente');?>
                <?php if (isset($listado)):
  			  while ($docentes = $listado->fetchObject()): ?>
	                        <article class="col-xs-12 col-sm-12 col-md-4 col-xl-4 mb-2 ">
	                            <div class="card text-center shadow ">
	                                <div class="card-body contenido-card">
	                                    <div class="row">
	                                        <div class="col-xs-3 col-sm-12 col-md-12 col-lg-3">
	                                            <img alt="" class="avatar circulo" src="<?=base_url?>helpers/img/obito.png">
	                                            </img>
	                                        </div>
	                                        <div class="col-xs-9 col-sm-12 col-md-12 col-lg-9">
	                                              <h4> <?=$docentes->nombre_d?> <?=$docentes->apellidos_d?></h4>
	                                                <small class="carrera">
	                                                    <?=$docentes->nombre_pregrado_d?>
	                                                </small>
	                                            <div class="row">
	                                                <div class="col-6">
	                                                    <a class="btn btn-primary btn-sm" href="<?=base_url?>Asignaciones/vista_Agrados&id_docente=<?=$docentes->id?>" type="button">
	                                                        <small>
	                                                            Registrar grados
	                                                        </small>
	                                                    </a>
	                                                </div>
	                                                <div class="col-6">
	                                                    <a class="btn btn-info btn-sm text-dark" href="<?=base_url?>Asignaciones/vista_docenteGrados&id_docente=<?=$docentes->id?>" type="button">
	                                                        <small>
	                                                            Registrar materias
	                                                        </small>
	                                                    </a>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </article>
	                	<?php endwhile;
			endif;?>
                    </section>
</section>