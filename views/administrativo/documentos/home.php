<section class="container-fluid">
	<!-- inicio del container -->
	<section class="row shadow titulo">
        <article class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
	        <h1 class="text-center config">
	            Documetos y plantillas
	        </h1>
        </article>
        <article class="col-xs-1 col-sm-1 col-md-1 col-lg-1 config icono-menu text-center">
            <a data-bs-target="#nuevoDocumento" data-bs-toggle="modal"  type="button">
                <i class="bi bi-plus-lg efecto_hover" style="font-size: 2rem; color: white;">
                </i>
            </a>
		 </article>
    </section>
    <?php echo Utils::getAlert(); ?>
    <?php Utils::borrar_error('alert');?>
    <!-- inicio de la  tabla con los documentos -->
    <section class="row justify-content-center mt-5">
    	<section class="col-md-6">
    		<article class="row">
    			<span class="valor_item text-center mb-3">Documentos de los docentes</span>
    			<?php if ($documentos_teacher->rowCount() != 0): ?>
    				<?php while ($documento = $documentos_teacher->fetchObject()): ?>
    					<section class="col-md-6 mb-2">
    						<div class="card shadow">
    							<div class="card-body">
    								<h6 class="card-subtitle mb-2 text-muted "><?=$documento->nombre?></h6>
    								<p class="card-text "><?=$documento->descripcion?></p>
    								<div class="row text-center">
    									<div class="col-md-6">
    										<a href="<?=base_url?>Documento/eliminar&id=<?=$documento->id?>&nombre=<?=$documento->nombre?>" onclick="return confirm('Esta seguro de eliminar el archivo?');" class="card-link"><i class="bi bi-trash icono_docu" style="font-size: 1.5rem;"></i></a>
    									</div>
    									<div class="col-md-6">
    										<a download="<?=$documento->nombre?>" href="<?=base_url?>documentos/<?=$documento->nombre?>" class="card-link"><i class="bi bi-download icono_docu" style="font-size: 1.5rem;"></i></a>
    									</div>
    								</div>
    							</div>
    						</div>
    					</section>
    				<?php endwhile;?>
    			<?php else: ?>
    				<div class="alert alert-danger text-center" role="alert">
    					No hay documentos registrados.
    				</div>
    			<?php endif;?>
    		</article>
    	</section>
    	<section class="col-md-6" style="border-left: 1px solid black;">
    		<article class="row">
    			<span class="valor_item text-center mb-3">Documentos de los estudiantes</span>
    			<?php if ($documentos_students->rowCount() != 0): ?>
    				<?php while ($documento = $documentos_students->fetchObject()): ?>
    					<section class="col-md-6 mb-2">
    						<div class="card shadow">
    							<div class="card-body">
    								<h6 class="card-subtitle mb-2 text-muted "><?=$documento->nombre?></h6>
    								<p class="card-text "><?=$documento->descripcion?></p>
    								<div class="row text-center">
    									<div class="col-md-6">
    										<a href="<?=base_url?>Documento/eliminar&id=<?=$documento->id?>&nombre=<?=$documento->nombre?>" onclick="return confirm('Esta seguro de eliminar el archivo?');" class="card-link"><i class="bi bi-trash icono_docu" style="font-size: 1.5rem;"></i></a>
    									</div>
    									<div class="col-md-6">
    										<a download="<?=$documento->nombre?>" href="<?=base_url?>documentos/<?=$documento->nombre?>" class="card-link"><i class="bi bi-download icono_docu" style="font-size: 1.5rem;"></i></a>
    									</div>
    								</div>
    							</div>
    						</div>
    					</section>
    				<?php endwhile;?>
    			<?php else: ?>
    				<div class="alert alert-danger text-center" role="alert">
    					No hay documentos registrados.
    				</div>
    			<?php endif;?>
    		</article>
    	</section>
    </section>
    <!-- fin de la tabla con los documentos -->
    <!-- fin del container -->
</section>

<!-- Button trigger modal -->
<!-- Modal -->
<section class="modal fade" id="nuevoDocumento" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<section class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Nuevo docume</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="<?=base_url?>Documento/guardar" enctype="multipart/form-data" method="post">
				<div class="modal-body">
					<div class="mb-3">
						<label for="documento" class="form-label">Selecciona el documento</label>
						<input class="form-control" name="documento" type="file" id="documento">
					</div>
					<div class="form-floating mb-3">
						<textarea class="form-control" placeholder="Leave a comment here" id="descripcion" name="descripcion"></textarea>
						<label for="descripcion">Descripción:</label>
						<div id="emailHelp" class="form-text">Máximo 100 caracteres.</div>
					</div>
					<h6>Destinatario:</h6>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="destinatario" id="inlineRadio1" value="estudiante">
						<label class="form-check-label" for="inlineRadio1">Estudiantes</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="destinatario" id="inlineRadio2" value="docente">
						<label class="form-check-label" for="inlineRadio2">Docentes</label>
					</div>
					<div class="form-check form-check-inline">
						<input class="form-check-input" type="radio" name="destinatario" id="inlineRadio3" value="estudianteDocente">
						<label class="form-check-label" for="inlineRadio3">Estudiantes y docentes</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-success">Guardar</button>
				</div>
			</form>
		</div>
	</section>
</section>