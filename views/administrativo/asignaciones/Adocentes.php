<section class="container-fluid">
	<section class="row shadow titulo">
        <article class="col-xs-12col-sm-12col-md-12 col-lg-12">
            <h1 class="text-center config">
                Asignación de grados y materias.
            </h1>
        </article>
    </section>
    <h2 class="text-center mt-4 mb-4 espezor">
        <i class="bi bi-clipboard-check"></i>
        Docentes
    </h2>
<section class="row">
    <?php echo Utils::getAlert() ?>
    <?php Utils::borrar_error('alert');?>
    <article class="row justify-content-center">
        <?php if (isset($listado) && $listado->rowCount() != 0):
         while ($docentes = $listado->fetchObject()): ?>
           <article class="col-md-4 mb-4">
        <div class="card shadow">
          <div class="card-body">
            <h5 class="card-title">
                <div class="row">
                    <div class="col-md-3">
                        <?php if ($docentes->img == null): ?>
                            <img alt="" class="avatar-docente" src="<?=base_url?>helpers/img/avatar.jpg"></img>
                        <?php else: ?>
                            <img alt="" class="avatar-docente" src="<?=base_url?>photos/docentes/<?=$docentes->img?>"></img>
                     <?php endif;?>
                </div>
                <div class="col-md-9 mt-3"><?=$docentes->nombre_d?> <?=$docentes->apellidos_d?></div>
            </div>
        </h5>
        <hr>
        <div class="d-grid gap-2">
          <a href="<?=base_url?>Asignaciones/vista_Agrados&id_docente=<?=$docentes->id?>" class="btn btn-outline-dark" type="button">Asignar grados</a>
          <a href="<?=base_url?>Asignaciones/vista_docenteGrados&id_docente=<?=$docentes->id?>" class="btn btn-outline-success" type="button">Asignar materias</a>
      </div>
        </div>
    </div>
    </article>
<?php endwhile;?>
<?php else: ?>
<div class="alert alert-danger" role="alert">
    Aún no hay docentes registrados.
</div>
<?php endif;?>
</article>
</section>
</section>