<div class="container">
	<div class="error404 text-center" style="background-image: url(<?=base_url?>helpers/img/4042.png);">
		<?php if (isset($_SESSION['user'])): ?>
			<a class="btn btn-danger" href="<?=base_url?>Login/homeAdministrativo">
				<h1 class="text-center mensaje404">Volver</h1>
			</a>
		<?php elseif (isset($_SESSION['teacher'])): ?>
			<a class="btn btn-danger" href="<?=base_url?>Teacher/homeDocente">
				<h1 class="text-center mensaje404">Volver</h1>
			</a>
		<?php else: ?>
			<a class="btn btn-danger" href="<?=base_url?>Student/homeEstudiante">
				<h1 class="text-center mensaje404 ">Volver</h1>
			</a>
		<?php endif;?>
	</div>
</div>