<section class="container-fluid">
    <section class="row shadow titulo">
        <article class="col-xs-11 col-sm-11 col-md-12 col-lg-11">
            <h1 class="text-center config">
                Documentos
            </h1>
        </article>
    </section>
</section>
<section class="container-fluid mt-5">
    <section class="row">
        <?php if($documentos->rowCount() != 0 ): ?>
            <?php while($documento = $documentos->fetchObject()): ?>
                <article class="col-md-3">
                    <div class="card border-success mb-3 shadow" style="max-width: 18rem;">
                      <div class="card-body text-success">
                        <h5 class="card-title"><?=$documento->nombre?></h5>
                        <p class="card-text"><?=$documento->descripcion?></p>
                      </div>
                      <div class="card-footer bg-transparent border-success text-center ">
                        <a download="<?=$documento->nombre?>" href="<?=base_url?>documentos/<?=$documento->nombre?>">
                            <i class="bi bi-download icono_docu"> Descargar</i>
                        </a>
                      </div>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else:?>
            <p class="text-center mt-3"><span class="badge bg-warning text-dark">No hay documentos.</span></p>
        <?php endif; ?>
    </section>
</section>
