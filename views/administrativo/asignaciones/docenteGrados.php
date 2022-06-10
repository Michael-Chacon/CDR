<!-- vista donde se listan los grados en los que estan matriculados los docentes, para asignarle materias -->
<section class="container-fluid">
	<section class="row shadow titulo mb-3">
        <article class="col-xs-12col-sm-12col-md-12 col-lg-12">
            <h1 class="text-center config">
                Grados asignados
            </h1>
        </article>
    </section>
	 <article class="row justify-content-center">
	 	<article class="col-xs-12 col-sm-6 col-md-3 col-xl-3 mb-2">
	 		<!-- <?php $docente = $_GET['id_docente']?> -->
	 		<?php if (isset($lista) && $lista->rowCount() !=0):
	 		while ($grados = $lista->fetchObject()): ?>
	 			<div class="card text-center shadow option">
	 				<div class="card-body contenido-card">
	 					<h2 class="mt-2 grados">
	 						<?=$grados->nombre_g?>°
	 					</h2>
	 					<hr class="hr-perfil"/>
	 					<a class="stretched-link" href="<?=base_url?>Asignaciones/vista_Amaterias&id_grado=<?=$grados->id?>&nombre=<?=$grados->nombre_g?> &docente=<?=$docente?>">
	 					</a>
	 				</div>
	 			</div>
	 		<?php endwhile;?>
	 	<?php else: ?>
	 		<div class="alert alert-danger text-center" role="alert">
	 			El docente no tiene grados asignados
	 		</div>
	 	<?php endif;?>
	 </article>
	</article>
</section>