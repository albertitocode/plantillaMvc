<!-- <div class="mt-5">
    <h3 class="display-4">Registrar usuario</h3>
</div> -->


<div class="mt-5">
    <div class="alert alert-danger d-none" role="alert" id="error">

    </div>

    <form action="<?php echo getUrl("Solicitud", "Solicitud", "postCreateVia"); ?>" method="post" id="form">
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
                    <a href="#">Registro Solicitudes</a>
                </li>
            </ul>
        </div>
        <div class="row">
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
                            Registro Solicitud Vias
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- <div class="col-md-4">
            <label for="usu_id">Id</label>
            <input type="text" name="usu_id" class="form-control" placeholder="Id">
            
        </div> -->
                        <div class="row">


                            <div class="col-md-6 col-lg-6">
                                
                                <div class="form-group">
                                    <label for="solicitud_via_mal_estado_direccion" class="fw-bold">Direccion
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



                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="danio_id" class="fw-bold">Daño</label>
                                    <select name="danio_id" id="danio_id" class="form-control">
                                        <option value="">Seleccione...</option>
                                        <?php
                                        foreach ($danios as $danio) {
                                            echo "<option  value='" . $danio['danio_id'] . "'>" . $danio['danio_nombre'] . "</option>";
                                        }

                                        ?>
                                    </select>
                                </div>
                              
                            </div>

                            <div class="mt-3">
                                <input type="submit" value="Enviar" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>