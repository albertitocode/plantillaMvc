<!-- <div class="mt-5">
    <h3 class="display-4">Registrar usuario</h3>
</div> -->


<div class="mt-5">


    <form action="<?php echo getUrl("Solicitud", "Solicitud", "postCreateReductorNuevo"); ?>" method="post"
        id="formNuevoReductor">
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
                    <a href="#">Nuevos reductores</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="alert alert-danger d-none" role="alert" id="errorNuevoreductor">

            </div>
            <?php
            if (isset($_SESSION['errores'])) {
                echo "<div class='alert alert-danger' role='alert'>";
                foreach ($_SESSION['errores'] as $error) {
                    echo $error . "<br>";
                }
                echo "</div>";
                unset($_SESSION['errores']);
            }

            ?>
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
                                    <label for="categoria_reductor_id">Categoria de la señal</label>
                                    <select name="categoria_reductor_id" id="categoria_reductor_id" class="form-control" data-url='<?php echo
                                        getUrl(
                                            "Solicitud",
                                            "Solicitud",
                                            "getNombreReductor",
                                            false,
                                            "ajax"
                                        ); ?>'>
                                        <option value="">Seleccione categoria...</option>
                                        <?php
                                        foreach ($categoria_reductores as $categoria) {
                                            echo "<option  value='" . $categoria['categoria_reductor_id'] . "'>" . $categoria['categoria_reductor_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger" id="error_categoria_reductor_id"></span>
                                </div>

                                <div class="form-group">
                                    <label for="solicitud_reductor_nuevo_direccion" class="fw-bold">Direccion
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
                                    <label for="solicitud_reductor_nuevo_descripcion"> Describa el caso</label>
                                    <input type="text" name="solicitud_reductor_nuevo_descripcion" id=""
                                        class="form-control" placeholder="Describa el estado de la señal">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group mb-3 d-none" id="reduct">
                                    <label for="reductor_id">Nombre del Reductor</label>
                                    <select name="reductor_id" id="reductor_id" class="form-control">
                                        <option value="">Seleccione reductor...</option>
                                        <?php
                                        foreach ($reductores as $reductor) {
                                            echo "<option  value='" . $reductor['reductor_id'] . "'>" . $reductor['reductor_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <span class="text-danger" id="error_reductor_id"></span>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="d-block">Imagen del reductor dañado</label>
                                    <input type="file" name="solicitud_reductor_nuevo_imagen">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--Usuarios id se va coger desde sesion_start -->

        <div class="mt-5">
            <input type="submit" id="btnReductorN" value="Enviar" class="btn btn-success">
        </div>
    </form>
</div>