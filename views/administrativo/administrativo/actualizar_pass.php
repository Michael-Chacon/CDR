<section class="container-fluid">
	<section class="row shadow titulo">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="text-center config">
            	Cambiar contraseña
            </h1>
        </article>
    </section>
	<article class="row justify-content-center mt-5">
		<div class="col-md-5">
			<form action="<?=base_url?>Administrativo/cambiarPass" method="post">
				<div class="mb-3">
					<input type="text" hidden name="id" value="<?=$_GET['id']?>">
					<label for="pass" class="form-label">Nueva contraseña</label>
					<input type="password" class="form-control" id="pass" name="new_pass">
				</div>
				<div class="d-grid gap-2">
					<button class="btn btn-outline-success" type="submit">Actualizar</button>
				</div>
			</form>
		</div>
	</article>
</section>