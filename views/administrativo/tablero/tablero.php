<section class="container-fluid">
	<section class="row shadow titulo">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h1 class="text-center config">
				Tablero de actividades
			</h1>
		</article>
	</section>
	<section class="row justify-content-center mt-4">
		<article class="col-md-6">
			<div class="form shadow">
				<form action="<?=base_url?>Tablero/guardarActividad" method="post">
					<article class="row">
						<article class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
							<article class="form-floating mb-3">
								<input type="text" class="form-control" id="titulo" placeholder="Título" name="titulo">
								<label for="titulo">Título de la actividad:</label>
							</article>
						</article>
						<article class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<article class="form-floating mb-3">
								<input type="date" class="form-control" id="fecha" placeholder="name@example.com" name="fecha">
								<label for="fecha">Fecha:</label>
							</article>
						</article>
					</article>
					<article class="row">
						<article class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
							<article class="form-floating">
								<textarea class="form-control" placeholder="Descripción de la actividad:" id="descripcion" style="height: 70px" name="descripcion"></textarea>
								<label for="descripcion">Descripción de la actividad:</label>
							</article>
						</article>
						<article class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
							<article class="form-floating mb-3">
								<input type="color" class="form-control" id="color" placeholder="name@example.com" name="color">
								<label for="color">Color:</label>
							</article>
						</article>
					</article>
					<div class="d-grid gap-2 mt-3">
						<button class="btn btn-primary btn-sm" type="submit">Guardar actividad</button>
					</div>
				</form>
			</div>
		</article>
	</section>
	<hr>
	<section class="row">
		<article class="col-md-4">
			<div class="card border-light mb-3 shadow">
				<div class="card-header text-center" style="background-color: teal!important; color:white;"><span>02/22/2020</span></div>
				<div class="card-body">
					<h5 class="card-title" style="color:teal;">Light card title</h5>
					<p class="card-text" s>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
			</div>
		</article>
		<article class="col-md-4">
			<div class="card border-light mb-3 shadow">
				<div class="card-header text-center" style="background-color: #7DFF4C!important; color:white;"></div>
				<div class="card-body">
					<h5 class="card-title" style="color:#7DFF4C;">Light card title</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
			</div>
		</article>
		<article class="col-md-4">
			<div class="card border-light mb-3 shadow">
				<div class="card-header text-center" style="background-color: #EF4CFF!important; color:white;"></div>
				<div class="card-body">
					<h5 class="card-title" style="color:#EF4CFF;">Light card title</h5>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				</div>
			</div>
		</article>
	</section>
</section>
