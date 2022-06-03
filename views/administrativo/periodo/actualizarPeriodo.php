<section class="container-fluid">
    <section class="row  titulo mb-5">
        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1 class="text-center config">
                <i class="bi bi-calendar2-range"></i>
                Modificar periodo académico
            </h1>
        </article>
    </section>
	<article class="row justify-content-center mt-5">
		<div class="col-6">
			<h3 class="text-center"><?=$_GET['name']?></h3>
			<form action="<?=base_url?>Periodo/actualizarPeriodo" method="post">
				<input type="text" hidden name="id_periodo" value="<?=$_GET['id_periodo']?>">
                                <div class="row mt-3 mb-3">
                                    <div class="col-4">
                                        <div class="form-check form-switch">
                                            <?php if ($info_periodo->estado == 'Inactivo'): ?>
                                            <input class="form-check-input" id="estado" name="estado" type="checkbox">
                                        <?php else: ?>
                                            <input class="form-check-input" id="estado" name="estado" type="checkbox" checked="">
                                        <?php endif?>
                                                <label class="form-check-label" for="estado">
                                                    Estado
                                                </label>
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="floatingInput" name="inicio" placeholder="Fecha de inicio" type="date" value="<?=$info_periodo->fecha_inicio?>">
                                                <label for="floatingInput">
                                                    Fecha de inicio:
                                                </label>
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="floatingInput" name="fin" type="date" value="<?=$info_periodo->fecha_fin?>">
                                                <label for="floatingInput">
                                                    Fecha de fin:
                                                </label>
                                            </input>
                                        </div>
                                    </div>
		                            <button class="btn btn-primary" type="submit">
		                                Guardar cambios
		                            </button>
                                </div>
                     </form>
		</div>
	</article>
	<!-- <article class="row justify-content-center mt-3">
		<div class="col-6">
			<h3 class="text-center">Modificar el estado</h3>
		</div>
	</article> -->
</section>