 <section class="container-fluid">
                    <section class="row shadow titulo">
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h1 class="text-center config">
                                Actualizar información del administrativo
                            </h1>
                        </article>
                    </section>
                    <form action="<?=base_url?>Administrativo/registrarAdministrativo" method="post">
                        <section class="row justify-content-center mt-5">
                            <input type="text" hidden name="actualizarAdministrativo" value="<?=$info->id?>">
                            <section class="col-md-8 shadow">
                                <section class="row">
                                    <div class="col-md-6 ">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Nombres:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" type="text" name="nombres" value="<?=$info->nombre_a?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Fecha de nacimiento:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" type="date" name="nacimiento" value="<?=$info->fecha_nacimiento_a?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Apellidos:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" type="text" name="apellidos" value="<?=$info->apellidos_a?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Edad:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="edad" type="text" value="<?=$info->edad_a?>">
                                            </input>
                                        </div>
                                    </div>
                                </section>
                                <hr/>
                                <section class="row">
                                    <div class="col-md-6 ">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Tipo:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="tipo" type="text" value="<?=$info->tipo_identificacion_a?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Lugar de expedición:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="expedicion" type="text" value="<?=$info->lugar_expedicion_a?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Genero:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="sexo" type="text" value="<?=$info->sexo_a?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Numero:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="numero" type="number" value="<?=$info->numero_a?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Fecha de expedición:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="fecha" type="date" value="<?=$info->fecha_expedicion_a?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Cargo:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="cargo" type="text" value="<?=$info->cargo_a?>">
                                            </input>
                                        </div>
                                    </div>
                                </section>
                                <hr/>
                                <section class="row">
                                    <div class="col-md-6 ">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Dirección:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="direccion" type="text" value="<?=$info->direccion_a?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Correo electronico:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="correo" type="text" value="<?=$info->correo_a?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Número de celular:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="telefono" type="number" value="<?=$info->telefono_a?>">
                                            </input>
                                        </div>
                                    </div>
                                </section>
                                <hr/>
                                <section class="row">
                                    <div class="col-md-6 ">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Religión:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="religion" type="text" value="<?=$info->religion_a?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Grupo sanguíneo:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="grupo" type="text" value="<?=$info->grupo_sanguineo_a?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Incapacidad médica:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput"  name="incapacidad" type="text" value="<?=$info->incapacidad_medica_a?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Rh:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="rh" type="text" value="<?=$info->rh_a?>">
                                            </input>
                                        </div>
                                    </div>
                                </section>
                                <hr/>
                                <section class="row">
                                    <div class="col-md-6 ">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Fecha de posesión:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="fecha_posesion" type="date" value="<?=$info->fecha_posesion_a?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Número resolución de posesión:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="resolucion_posesion" type="number"value="<?=$info->numero_resolucion_posesion_a?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Número acta de posesión:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="acta_posesion" type="number" value="<?=$info->numero_acta_posesion_a?>">
                                            </input>
                                        </div>
                                    </div>
                                </section>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Título de pregrado:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="pregrado" type="text" value="<?=$info->pregrado_a?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Título de posgrado:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="posgrado" type="text" value="<?=$info->posgrado_a?>">
                                            </input>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput">
                                                Nombre del título  de pregrado:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput" name="nombre_pregrado" type="text" value="<?=$info->nombre_pregrado_a?>">
                                            </input>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="formGroupExampleInput2">
                                                Nombre del título de posgrado:
                                            </label>
                                            <input class="form-control" id="formGroupExampleInput2" name="nombre_posgrado" type="text" value="<?=$info->nombre_posgrado_a?>">
                                            </input>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="d-grid gap-2 mb-3">
                                    <button class="btn btn-outline-success" type="submit">
                                        Actualizar
                                    </button>
                                </div>
                            </section>
                        </section>
                    </form>
                </section>
                <!-- fin del contenido de la pagina -->