<form action="<?=base_url?>Estudiante/registrarEstudiante" method="post">
                                <section class="modal-body">
                                    <h3 class="text-center mt-2">
                                        Estudiante
                                    </h3>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="edad" name="edad" placeholder="edad" required="" type="number" value="<?=$estudiantePadres->edad_e?>">
                                                    <label for="edad">
                                                        Edad:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                    <h5 class="text-center mt-5">
                                       <i class="bi bi-fingerprint"></i> Identificación
                                    </h5>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="tipo" required="">
                                                    <option value="cedula">
                                                        Cédula
                                                    </option>
                                                    <option value="tarjeta">
                                                        Tarjeta
                                                    </option>
                                                    <option value="contraseña">
                                                        Contraseña
                                                    </option>
                                                    <option value="otro">
                                                        Otro
                                                    </option>
                                                </select>
                                                <label for="incapacidad">
                                                    Tipo:
                                                </label>
                                            </div>
                                        </article>
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="numero" name="numero" placeholder="Numero" required="" type="number">
                                                    <label for="numero">
                                                        Número de identificación:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="expedicion" name="expedicion" placeholder="expedicion" required="" type="text">
                                                    <label for="expedicion">
                                                        Lugar de expedición:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="fecha" name="fecha" placeholder="fecha" required="" type="date" value="tal">
                                                    <label for="fecha">
                                                        Fecha de expedición:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                    <h5 class="text-center mt-5">
                                       <i class="bi bi-geo-alt"></i> Ubicación
                                    </h5>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="direccion" name="direccion" placeholder="direccion" required="" type="text">
                                                    <label for="direccion">
                                                        Dirección de tu casa:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="telefono" name="telefono" placeholder="telefono" required="" type="number">
                                                    <label for="telefono">
                                                        Número de celular:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="correo" name="correo" placeholder="correo"  type="email">
                                                    <label for="correo">
                                                        Correo electrónico:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                    <h5 class="text-center mt-5">
                                       <i class="bi bi-pen"></i> Otros
                                    </h5>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="religion" name="religion" placeholder="religion"  type="text">
                                                    <label for="religion">
                                                        Religión:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="incapacidad" name="incapacidad" placeholder="incapacidad" required="" type="text">
                                                    <label for="incapacidad">
                                                        Incapacidad médica:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="trasporte" required="">
                                                    <option>
                                                    </option>
                                                    <option value="si">
                                                        Si
                                                    </option>
                                                    <option value="no">
                                                        No
                                                    </option>
                                                </select>
                                                <label for="trasporte">
                                                    Trasporte:
                                                </label>
                                            </div>
                                        </article>
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="pae" required="">
                                                    <option>
                                                    </option>
                                                    <option value="si">
                                                        Si
                                                    </option>
                                                    <option value="no">
                                                        No
                                                    </option>
                                                </select>
                                                <label for="trasporte">
                                                    PAE:
                                                </label>
                                            </div>
                                        </article>
                                    </article>
                                    <h3 class="text-center mt-5">
                                       <i class="bi bi-people"></i> Información de la madre
                                    </h3>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="edad_m" name="edad_m" placeholder="Edad"  type="number">
                                                    <label for="edad_m">
                                                        Edad:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="telefono_m" name="telefono_m" placeholder="Telefono"  type="number">
                                                    <label for="telefono_m">
                                                        Telefono:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="tipo_m" >
                                                    <option value="cedula">
                                                        Cedula
                                                    </option>
                                                    <option value="tarjeta">
                                                        Tarjeta
                                                    </option>
                                                    <option value="contraseña">
                                                        Contraseña
                                                    </option>
                                                    <option value="otro">
                                                        Otro
                                                    </option>
                                                </select>
                                                <label for="incapacidad">
                                                    Tipo:
                                                </label>
                                            </div>
                                        </article>
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="numero_m" name="numero_m" placeholder="Número"  type="number">
                                                    <label for="numero_m">
                                                        Número identificación:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="lugar_expedicion_m" name="lugar_expedicion_m" placeholder="Lugar"  type="text">
                                                    <label for="lugar_expedicion_m">
                                                        Lugar de expedición del documento :
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="fecha_expedicion_m" name="fecha_expedicion_m" placeholder="Fecha de expedicion"  type="date">
                                                    <label for="fecha_expedicion_m">
                                                        Fecha de expedición del documento:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="ocupacion_m" name="ocupacion_m" placeholder="Ocupación"  type="text">
                                                    <label for="ocupacion_m">
                                                        Ocupación:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                    <h3 class="text-center mt-5">
                                       <i class="bi bi-people"></i> Información del padre
                                    </h3>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="edad_pa" name="edad_pa" placeholder="Edad"  type="number">
                                                    <label for="edad_pa">
                                                        Edad:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="telefono_pa" name="telefono_pa" placeholder="Telefono"  type="number">
                                                    <label for="telefono_pa">
                                                        Telefono:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <select aria-label=".form-select-lg example" class="form-select form-select-md mb-3" name="tipo_pa" >
                                                    <option value="cedula">
                                                        Cedula
                                                    </option>
                                                    <option value="tarjeta">
                                                        Tarjeta
                                                    </option>
                                                    <option value="contraseña">
                                                        Contraseña
                                                    </option>
                                                    <option value="otro">
                                                        Otro
                                                    </option>
                                                </select>
                                                <label for="incapacidad">
                                                    Tipo:
                                                </label>
                                            </div>
                                        </article>
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="numero_pa" name="numero_pa" placeholder="Número"  type="number">
                                                    <label for="numero_pa">
                                                        Número identificación:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="lugar_expedicion_pa" name="lugar_expedicion_pa" placeholder="Lugar"  type="text">
                                                    <label for="lugar_expedicion_pa">
                                                        Lugar de expedición del documento :
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="fecha_expedicion_pa" name="fecha_expedicion_pa" placeholder="Fecha expedicion"  type="date">
                                                    <label for="fecha_expedicion_pa">
                                                        Fecha de expedición del documento:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="ocupacion_pa" name="ocupacion_pa" placeholder="Ocupación"  type="text">
                                                    <label for="ocupacion_pa">
                                                        Ocupación:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                    <h5 class="text-center mt-5">
                                       <i class="bi bi-info"></i> Otros datos de madre y padre
                                    </h5>
                                    <article class="row">
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="direccion_mp" name="direccion_mp" placeholder="Dirección" required="" type="text">
                                                    <label for="direccion_mp">
                                                        Dirección:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                        <article class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="correo_mp" name="correo_mp" placeholder="Correo"  type="text">
                                                    <label for="correo_mp">
                                                        Correo electronico:
                                                    </label>
                                                </input>
                                            </div>
                                        </article>
                                    </article>
                                </section>
                                <div class="modal-footer">
                                    <button class="btn btn-danger btn-lg" data-bs-dismiss="modal" type="button">
                                        Cancelar
                                    </button>
                                    <button class="btn btn-primary btn-lg" type="submit">
                                        Registrar
                                    </button>
                                </div>
                            </form>