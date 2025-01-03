<!-- <div class="mt-5">
    <h3 class="display-4">Registrar usuario</h3>
</div> -->


<div class="mt-5">


    <form action="<?php echo getUrl("Reportes", "Reportes", "postReporteReductorMalEstado"); ?>" method="post"
        id="formReductorM">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Reporte</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="<?php echo getUrl("Reportes", "Reportes", "getReporte"); ?>">
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
                    <a href="#">Nuevas señales</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="alert alert-danger d-none" role="alert" id="errorReductorMalEstado">

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
                            Reporte Solicitud Señal
                        </div>
                    </div>
                    <div class="card-body">


                        <div class="row">

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="categoria_reductor_id">Categoria de la señal</label>
                                    <select name="categoria_reductor_id" id="categoria_reductor_id" class="form-control" 
                                    >
                                        <option value="">Seleccione categoria...</option>
                                        <?php
                                        foreach ($categoria_reductores as $categoria) {
                                            echo "<option  value='" . $categoria['categoria_reductor_id'] . "'>" . $categoria['categoria_reductor_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                               
                                <!-- <div class="form-group">
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

                                </div> -->

                            </div>
                          
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group mb-3 d-none" id="reduct">
                                    <label for="senial_id">Nombre del Reductor</label>
                                    <select name="senial_id" id="senial_id" class="form-control">
                                        <option value="">Seleccione la señal...</option>
                                        <?php
                                        foreach ($reductores as $reductor) {
                                            echo "<option  value='" . $reductor['reductor_id'] . "'>" . $reductor['reductor_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
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