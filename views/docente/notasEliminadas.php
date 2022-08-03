<section class="container-fluid">
	    <section class="row  titulo mb-5">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="text-center config">
             Notas eliminadas a <?php echo $nombre; ?>
            </h1>
        </article>
    </section>
    <section class="row justify-content-center mb-5">
    	<article class="col-xs-12 col-sm-12 col-md-12 col-lg-10">
            <?php if (isset($listado) && $listado->rowCount() != 0): ?>
    		<div class="table-responsive p-3">
    		<table class="table caption-top">
    			<caption>Listado de notas eliminadas</caption>
    			<thead>
    				<tr class="text-center">
    					<th scope="col">#</th>
    					<th scope="col">Docente</th>
    					<th scope="col">Activida</th>
                        <th scope="col">Nota</th>
    					<th scope="col">Periodo</th>
    					<th scope="col">Materia</th>
    					<th scope="col">Grado</th>
    					<th scope="col">Fecha eliminación</th>
    				</tr>
    			</thead>
    			<tbody>

    				<?php
                        $c = 1;
                        while ($auditoria = $listado->fetchObject()):
                    ?>
                        <tr class="text-center">
    					   <th scope="row"><?=$c++?></th>
    					   <td><?=$auditoria->apellidos_d.' '. $auditoria->nombre_d?></td>
                           <td><?=$auditoria->actividad?></td>
                           <td><?=$auditoria->nota_dn?></td>
    					   <td class=""><?=$auditoria->periodo_dn?></td>
    					   <td><?=$auditoria->materia_dn?></td>
    					   <td><?=$auditoria->grado_dn?></td>
    					   <td><span class="badge bg-light text-dark"><?=$auditoria->fecha_eliminacion_dn?></span></td>
    				    </tr>
    			     <?php endwhile;?>
    			</tbody>
    		</table>
    		</div>
        <?php else: ?>
            <div class="alert alert-danger text-center" role="alert">
              Aún no hay registros
          </div>
        <?php endif;?>
    	</article>
    </section>
</section>
