<section class="container-fluid">
	    <section class="row  titulo mb-5">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="text-center config">
             Historial periodos académicos
            </h1>
        </article>
    </section>
    <section class="row justify-content-center mb-5">
    	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
            <?php if(isset($modificaciones) && $modificaciones->rowCount() != 0): ?>
    		<div class="table-responsive p-3">
    		<table class="table caption-top">
    			<caption>Historial de modificaciones de los periodos académicos</caption>
    			<thead>
    				<tr class="text-center">
    					<th scope="col">#</th>
    					<th scope="col">Autor</th>
    					<th scope="col">Periodo</th>
    					<th scope="col">Fecha inicio</th>
    					<th scope="col">Fecha fin</th>
    					<th scope="col">Estado</th>
    					<th scope="col">Fecha modificación</th>
    				</tr>
    			</thead>
    			<tbody>

    				<?php
    					$c=1;
    					while($auditoria = $modificaciones->fetchObject()):
    				?>
    				<tr class="text-center">
    					<th scope="row"><?=$c++?></th>
    					<td><?=$auditoria->nombre_admin_up?></td>
    					<td class=""><?=$auditoria->nombre_periodo?></td>
    					<td><?=$auditoria->fecha_inicio_up?></td>
    					<td><?=$auditoria->fecha_fin_up?></td>
    					<td><span class="badge <?=$auditoria->estado_up?>"><?=$auditoria->estado_up?></span></td>
    					<td><span class="badge bg-light text-dark"><?=$auditoria->fecha_modificacion_up?></span></td>
    				</tr>
    			<?php endwhile; ?>
    			</tbody>
    		</table>
    		</div>
        <?php else: ?>
            <div class="alert alert-danger text-center" role="alert">
              Aún no hay registros
          </div>
        <?php endif; ?>
    	</article>
    </section>
</section>
