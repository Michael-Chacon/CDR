<section class="container-fluid">
	<section class="row shadow titulo">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1 class="text-center config">
				Boletín de notas periodo <?=$periodo?>
			</h1>
		</article>
	</section>
</section>
<section class="container-fluid">
     <section class="row mt-5 mb-5">
        <article class="col-md-4 mb-3">
            <div class="card shadow" >
              <div class="card-body">
                 <div class="text-center">
                    <img src="<?=base_url?>/photos/estudiantes/<?=$informacionUsuarios->photo?>" class="avatar circulo" alt="">
                    <h5 class="card-title mt-3 titulo-boletin"><?=$informacionUsuarios->nombre_e?> <?=$informacionUsuarios->apellidos_e?></h5>
                    <h6 class="card-subtitle mb-2 subtitulo">Estudiante</h6>
                </div>
                <div class="row mt-3 mb-2">
                    <div class="col-md-4 text-center">
                        <h5 class="card-title titulo-boletin"><?=date("Y")?></h5>
                        <h6 class="card-subtitle mb-2 subtitulo">Año escolar</h6>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5 class="card-title titulo-boletin"><?=$informacionUsuarios->nombre_g?></h5>
                        <h6 class="card-subtitle mb-2 subtitulo">Grado</h6>
                    </div>
                    <div class="col-md-4 text-center">
                        <h5 class="card-title titulo-boletin"><?=Utils::validarPeriodoAcademico(date("Y-m-d"))?></h5>
                        <h6 class="card-subtitle mb-2 subtitulo">Periodo</h6>
                    </div>
                </div>
            </div>
        </div>
        </article>
        <article class="col-md-4 mb-3">
            <div class="card shadow" >
              <div class="card-body">
                <div class="text-center mt-4 mb-3">
                    <img src="<?=base_url?>/photos/docentes/<?=$informacionUsuarios->img?>" class="avatar circulo" alt="">
                    <h5 class="card-title mt-3 titulo-boletin"><?=$informacionUsuarios->nombre_d?> <?=$informacionUsuarios->apellidos_d?></h5>
                    <h6 class="card-subtitle mb-2 subtitulo">Director(a) de grupo</h6>
                    <br/>
                </div>
            </div>
        </div>
        </article>
        <article class="col-md-4 mb-3">
            <div class="card shadow">
              <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-center titulo-boletin">P1</th>
                                <th class="text-center titulo-boletin">P2</th>
                                <th class="text-center titulo-boletin">P3</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th style="font-weight: 400;">PUESTO EN EL GRUPO</th>
                                <td class="text-center">
                                    <?php if(!empty($infoBoletinPeriodo1->puesto)):?>
                                        <?=$infoBoletinPeriodo1->puesto?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($infoBoletinPeriodo2->puesto)):?>
                                        <?=$infoBoletinPeriodo2->puesto?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($infoBoletinPeriodo3->puesto)):?>
                                        <?=$infoBoletinPeriodo3->puesto?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="font-weight: 400;">PROMEDIO ESTUDIANTE</th>
                                <td class="text-center">
                                    <?php if(!empty($infoBoletinPeriodo1->promedio)):?>
                                        <?=$infoBoletinPeriodo1->promedio?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($infoBoletinPeriodo2->promedio)):?>
                                        <?=$infoBoletinPeriodo2->promedio?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($infoBoletinPeriodo3->promedio)):?>
                                        <?=$infoBoletinPeriodo3->promedio?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="font-weight: 400;">ASIGNATURAS PERDIDAS</th>
                                 <td class="text-center">
                                    <?php if(!empty($perdidasPeriodo1->perdidas1)):?>
                                        <?=$perdidasPeriodo1->perdidas1?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($perdidasPeriodo2->perdidas1)):?>
                                        <?=$perdidasPeriodo2->perdidas1?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($perdidasPeriodo3->perdidas1)):?>
                                        <?=$perdidasPeriodo3->perdidas1?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="font-weight: 400;">TOTAL DE FALLAS</th>
                                <td class="text-center">
                                    <?php if(!empty($fallasPeriodo1->total)):?>
                                        <?=$fallasPeriodo1->total?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($fallasPeriodo2->total)):?>
                                        <?=$fallasPeriodo2->total?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                                <td class="text-center">
                                    <?php if(!empty($fallasPeriodo3->total)):?>
                                        <?=$fallasPeriodo3->total?>
                                    <?php else: ?>
                                        0
                                    <?php endif ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </article>
    </section>
            <!-- inicio contenido -->
            		<section class="row mb-5">
            			<article class="col-lg-12">
            				<?php if ($periodox->rowCount() != 0): ?>
                                <?php if(!isset($_SESSION['student'])): ?>
                                <a type="button" href="<?=base_url?>Boletin/verBoletin&student=<?=Utils::encryption($estudiante)?>&degree=<?=Utils::encryption($grado)?>&period=<?=Utils::encryption($periodo)?>&pdf=b" class="btn btn-outline-success"><i class="bi bi-cloud-arrow-down"></i> Descargar boletín
                                </a>
                            <?php endif ?>
            				<div class="table-responsive">
            				<table class="table table-bordered mt-3 mb-3 shadow">
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
            						<?php while ($boletin = $periodox->fetchObject()): ?>
            							<tr>
            								<td><?=$boletin->nombre_materia?></td>
            								<td><?=$boletin->observaciones?></td>
            								<td><?=$boletin->nombre_docente?></td>
            								<td class="text-center"><?=$boletin->recuperacion_nota?></td>
            								<td class="text-center"><?=$boletin->nota_periodo1?></td>
            								<td class="text-center"><?=$boletin->nota_periodo2?></td>
            								<td class="text-center"><?=$boletin->nota_periodo3?></td>
            								<td class="text-center"><?=$boletin->promedio_materia?></td>
            								<td class="text-center">
                                                <?php if ($boletin->nota_periodo1 >= 0 && $boletin->nota_periodo1 <= 31): ?>
                                                BAJO
                                                <?php elseif ($boletin->nota_periodo1 >= 32 && $boletin->nota_periodo1 <= 39): ?>
                                                BÁSICO
                                                <?php elseif ($boletin->nota_periodo1 >= 40 && $boletin->nota_periodo1 <= 45): ?>
                                                ALTO
                                                <?php elseif ($boletin->nota_periodo1 >= 46 && $boletin->nota_periodo1 <= 50): ?>
                                                SUPERIOR
                                                <?php endif;?>
                                            </td>
            								<td class="text-center"><?=$boletin->total_fallas_periodo?></td>
            							</tr>
            						<?php endwhile;?>
            					</tbody>
            				</table>
            				</div>
            			<?php else: ?>
            				<div class="alert alert-danger text-center mt-5 mb-5" role="alert">
            					El boletín de notas del periodo  <?=$periodo?> aún no se ha generado
            				</div>
            			<?php endif;?>
            			</article>
            		</section>
            <!-- fin contenido -->

</section>