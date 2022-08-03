<section class="container-fluid">
	    <section class="row  titulo mb-5">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="text-center config">
             Auditoria estados del boletín
            </h1>
        </article>
    </section>
    <section class="row justify-content-center mb-5">
    	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
            <?php if(isset($listado) && $listado->rowCount() != 0): ?>
    		<div class="table-responsive p-3">
    		<table class="table caption-top">
    			<caption>Historial de cambios del estado del boletín</caption>
    			<thead>
    				<tr class="text-center">
    					<th scope="col">#</th>
    					<th scope="col">Administrativo</th>
    					<th scope="col">Estado</th>
    					<th scope="col">Fecha eliminación</th>
    				</tr>
    			</thead>
    			<tbody>

    				<?php
    					$c=1;
    					while($auditoria = $listado->fetchObject()):
    				?>
    				<tr class="text-center">
    					<th scope="row"><?=$c++?></th>
    					<td><?=$auditoria->nombre_admin_hb?></td>
    					<td><span class="badge <?=$auditoria->estado_hb?>"><?=$auditoria->estado_hb?></span></td>
    					<td><span class="badge bg-light text-dark"><?=$auditoria->fecha_modificacion_hb?></span></td>
    				</tr>
    			<?php endwhile; ?>
    			</tbody>
    		</table>
    		</div>
        <?php else: ?>
            <div class="alert alert-danger text-center" role="alert">
              No hay estudiantes eliminados
          </div>
        <?php endif; ?>
    	</article>
    </section>
</section>
