<!-- <div class="mt-5">
    <h3 class="display-4">Registrar usuario</h3>
</div> -->


<div class="mt-5">
    <div class="alert alert-danger d-none" role="alert" id="error">

    </div>

    <form action="<?php echo getUrl("Solicitud", "Solicitud", "postCreateReductorMalEstado"); ?>" method="post" id="form">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Registro</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="<?php echo getUrl("Solicitud", "Solicitud", "getSolicitud"); ?>">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Solicitudes</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Reductores en mal estado</a>
                </li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tittle">
                            Registro Solicitud Reductor
                        </div>
                    </div>
                    <div class="card-body">


                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="categoria_senal_id">Categoria de la señal</label>
                                    <select name="categoria_senal_id" id="" class="form-control">
                                        <option value="">Seleccione categoria...</option>
                                        <?php
                                        foreach ($categoria_reductores as $categoria) {
                                            echo "<option  value='" . $categoria['categoria_reductor_id'] . "'>" . $categoria['categoria_reductor_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="danio_id"> Daño</label>
                                    <select name="danio_id" id="" class="form-control">
                                        <option value="">Seleccione daño...</option>
                                        <?php
                                        foreach ($danio as $dani) {
                                            echo "<option  value='" . $dani['danio_id'] . "'>" . $dani['danio_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="olicitud_reductores_mal_estado_direccion" class="fw-bold">Direccion
                                        via</label>
                                    <div class="d-flex">

                                        <label for="carrera" class="mt-2 mx-2">carrera</label>
                                        <input type="text" name="carrera" id="carrera" class="form-control px-4"
                                            placeholder="carrera">

                                        <label for="calle" class="mt-2 mx-2">calle</label>
                                        <input type="text" name="calle" id="calle" class="form-control px-4"
                                            placeholder="calle">

                                        <label for="barrio" class="mt-2 mx-2">barrio</label>
                                        <input type="text" name="barrio" id="barrio" class="form-control px-4"
                                            placeholder="brario">

                                    </div>

                                </div>

                            </div>
                            <div class="col-md-6 col-lg-4">
                               
                                <div class="form-group">
                                    <label for="solicitud_reductores_mal_estado_descripcion"> Describa el daño</label>
                                    <input type="text" name="solicitud_reductores_mal_estado_descripcion" id="" class="form-control" placeholder="Describa el estado de la señal">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="reductor_id">Nombre del Reductor</label>
                                    <select name="reductor_id" id="" class="form-control">
                                        <option value="">Seleccione reductor...</option>
                                        <?php
                                        foreach ($reductores as $reductor) {
                                            echo "<option  value='" . $reductor['reductor_id'] . "'>" . $reductor['reductor_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="d-block">Imagen del reductor dañado</label>
                                    <input type="file" name="solicitud_reductores_mal_estado_imagen">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Usuarios id se va coger desde sesion_start -->

        <div class="mt-5">
            <input type="submit" value="Enviar" class="btn btn-success">
        </div>
    </form>
</div>