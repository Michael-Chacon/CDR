<section class="container-fluid">
	<section class="row shadow titulo">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1 class="text-center config">
				Boletín de notas
			</h1>
		</article>
	</section>
</section>
<section class="container-fluid">
	<article class="row  mt-5 mb-5">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			  <ul class="nav nav-pills mb-3 titulos-pills " id="pills-tab" role="tablist">
                <li class="nav-item opciones" role="presentation">
                    <button aria-controls="pills-home" aria-selected="true" class="nav-link active boton-opciones" data-bs-target="#periodo1" data-bs-toggle="pill" id="periodo1-tab" role="tab" type="button">
                        Periodo 1
                    </button>
                </li>
                <li class="nav-item opciones" role="presentation">
                    <button aria-controls="pills-profile" aria-selected="false" class="nav-link boton-opciones" data-bs-target="#periodo2" data-bs-toggle="pill" id="periodo2-tab" role="tab" type="button">
                        Periodo 2
                    </button>
                </li>
                <li class="nav-item opciones" role="presentation">
                    <button aria-controls="pills-contact" aria-selected="false" class="nav-link boton-opciones" data-bs-target="#perodo3" data-bs-toggle="pill" id="perodo3-tab" role="tab" type="button">
                        Periodo 3
                    </button>
                </li>
            </ul>
            <!-- inicio contenido -->
            <section class="tab-content" id="pills-tabContent">
            	<article class="tab-pane fade show active" id="periodo1" role="tabpanel" aria-labelledby="pills-home-tab">
            		<section class="row">
            			<article class="col-lg-12">
            				<?php if($listado_materias->rowCount() != 0): ?>
            				<div class="table-responsive shadow">
            				<table class="table table-bordered mt-3 mb-3">
            					<thead class="text-center">
            						<tr>
            							<th>Materias</th>
            							<th>Observaciones</th>
            							<th>Docente</th>
            							<th>R</th>
            							<th>P1</th>
            							<th>P2</th>
            							<th>P3</th>
            							<th>Pro</th>
            							<th>Desempeño</th>
            							<th>Fallas</th>
            						</tr>
            					</thead>
            					<tbody>
            						<?php while($nota_materia = $listado_materias->fetchObject()): ?>
            							<tr>
            								<td><?=$nota_materia->nombre_materia?></td>
            								<td><?=$nota_materia->observaciones?></td>
            								<td><?=$nota_materia->nombre_docente?></td>
            								<td class="text-center"><?=$nota_materia->recuperacion_nota?></td>
            								<td class="text-center"><?=$nota_materia->nota_periodo1?></td>
            								<td class="text-center"><?=$nota_materia->nota_periodo2?></td>
            								<td class="text-center"><?=$nota_materia->nota_periodo3?></td>
            								<td class="text-center"><?=$nota_materia->promedio_materia?></td>
            								<td></td>
            								<td class="text-center"><?=$nota_materia->total_fallas_periodo?></td>
            							</tr>
            						<?php endwhile; ?>
            					</tbody>
            				</table>
            				</div>
            			<?php else: ?>
            				<div class="alert alert-danger text-center mt-5 mb-5" role="alert">
            					El boletín de notas del primer periodo aún no se ha generado
            				</div>
            			<?php endif; ?>
            			</article>
            		</section>
            	</article>
            	<article class="tab-pane fade" id="periodo2" role="tabpanel" aria-labelledby="pills-profile-tab">periodo 2 </article>
            	<article class="tab-pane fade" id="perodo3" role="tabpanel" aria-labelledby="pills-contact-tab">periodo 3</article>
            </section>
            <!-- fin contenido -->
		</article>
	</article>
</section>