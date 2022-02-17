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
    <?php echo Utils::general_alerts('guardarDocu', 'Documento guardado con éxito.', 'Algo salió mal al subir el documento, inténtelo de nuevo.') ?>
    <?php echo Utils::general_alerts('eliminarDocu', 'Documento eliminado con éxito.', 'Algo salió mal al eliminar el documento, inténtelo de nuevo.') ?>
    <?php Utils::borrar_error('guardarDocu'); 
    					Utils::borrar_error('eliminarDocu');?>
    <!-- inicio de la  tabla con los documentos -->
    <section class="row justify-content-center mt-5">
    	<article class="col-md-10">
    		<div>
	    		<table class="table shadow table-hover">
	    			<thead >
	    				<tr>
	    					<th class="th-documents">#</th>
	    					<th class="th-documents">Nombre</th>
	    					<th class="th-documents">Descripcion</th>
	    					<th class="text-center ">Descargar</th>
	    					<th class="text-center ">Eliminar</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				<?php 

	    				$c= 1;
	    				while($documento = $documentos->fetchObject()): ?>
	    					<tr>
	    						<td class="text-document " style="border-right: 5px solid #8F09EB;"><?=$c++?></td>
	    						<td class="text-document"><?=$documento->nombre?></td>
	    						<td class="text-document"><?=$documento->descripcion?></td>
	    						<td class="text-center"><a download="<?=$documento->nombre?>" href="<?=base_url?>documentos/<?=$documento->nombre?>"><i class="bi bi-download icono_docu" style="font-size: 1.5rem;"></i></a>
	    						</td>
	    						<td class="text-center"><a href="<?=base_url?>Documento/eliminar&id=<?=$documento->id?>&nombre=<?=$documento->nombre?>" onclick="return confirm('Esta seguro de eliminar el archivo?');"><i class="bi bi-trash icono_docu" style="font-size: 1.5rem;"></i></a>
	    						</td>
	    					</tr>
	    				<?php endwhile; ?>
	    			</tbody>
	    		</table>
    		</div>
    	</article>
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
							<div class="form-floating">
							  <textarea class="form-control" placeholder="Leave a comment here" id="descripcion" name="descripcion"></textarea>
							  <label for="descripcion">Descripción:</label>
							   <div id="emailHelp" class="form-text">Máximo 100 caracteres.</div>
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