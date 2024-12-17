<div class="mt-2">
    <h4 class="display-4">Señales viales en mal Estado</h4>
</div>


<div class="mt-5">
    <div class="alert alert-danger d-none" role="alert" id="error">

    </div>
    <!--     
    //   if(isset($_SESSION['errores'])){
    //         echo "<div class='alert alert-danger' role='alert'>";
    //           foreach ($_SESSION['errores'] as $error) {
    //             echo $error."<br>";
    //           }
    //        echo "</div>";
    //        unset($_SESSION['errores']);
    //     }

    //  -->
    <form action="<?php echo getUrl("Solicitud", "Solicitud", "postCreateNuevaSenial"); ?>" method="post" id="form">
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
            <div class="alert alert-danger d-none" role="alert" id="errorSenialNueva">

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
                            Registro Solicitud Nueva señal
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
                                        foreach ($categoria_senal as $categoria) {
                                            echo "<option  value='" . $categoria['categoria_senial_id'] . "'>" . $categoria['categoria_senial_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="solicitud_senial_nueva_direccion" class="fw-bold">Direccion
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
                                    <label for="tipo_senal_id">Tipo de señal</label>
                                    <select name="tipo_senal_id" id="" class="form-control">
                                        <option value="">Seleccione señal...</option>
                                        <?php
                                        foreach ($tipo_senal as $tipo) {
                                            echo "<option  value='" . $tipo['tipo_senal_id'] . "'>" . $tipo['tipo_senal_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="solicitud_senial_nueva_descripcion"> Describa el motivo</label>
                                    <input type="text" name="solicitud_senial_nueva_descripcion" id="" class="form-control" placeholder="Motivo de la señal">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label for="senial_id">Nombre de la señal</label>
                                    <select name="senial_id" id="" class="form-control">
                                        <option value="">Seleccione categoria...</option>
                                        <?php
                                        foreach ($seniales as $senial) {
                                            echo "<option  value='" . $senial['senial_id'] . "'>" . $senial['senial_nombre'] . "</option>";
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