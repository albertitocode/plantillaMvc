<!-- <div class="mt-5">
    <h3 class="display-4">Registrar usuario</h3>
</div> -->


<div class="mt-5">

    <form action="<?php echo getUrl("Solicitud", "Solicitud", "postCreateAccidente"); ?>" method="post"
        id="formAccidente">

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

            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="card-tittle">
                            Registro Accidente
                        </div>
                    </div>
                    <div class="card-body">


                        <!-- <div class="col-md-4">
            <label for="usu_id">Id</label>
            <input type="text" name="usu_id" class="form-control" placeholder="Id">
            
        </div> -->
                        <div class="row">
                            <div class="alert alert-danger d-none" role="alert" id="errorAccidente">

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
                                <div class="row">

                                    <div class="col-md-6 col-lg-6">

                                        <div class="form-group mb-3">

                                            <label for="direccion" class="fw-bold">Dirección Accidente</label>
                                            <div class="row gx-2">
                                                <div class="col-6 col-md-4">
                                                    <select name="tipo_via" id="tipo_via" class="form-select mt-1">
                                                        <option value="">Tipo de vía...</option>
                                                        <?php

                                                        foreach ($vias as $via) {
                                                            echo "<option  value='" . $via['tipo_via_nombre']  . "'>" . $via['tipo_via_nombre'] . "</option>";
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <input type="text" name="num_via" id="num_via" class="form-control"
                                                        placeholder="Número vía">
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <select name="letra1" id="letra1" class="form-select mt-1">
                                                        <option value="">Letra...</option>
                                                        <?php
                                                        foreach ($letras as $letra) {
                                                            echo "<option  value='" .$letra['letra_via']  . "'>" . $letra['letra_via'] . "</option>";
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-6 col-md-4 mt-3 text-center">
                                                    <label for="bis" class="fw-bold">¿Es Bis?</label>
                                                    <input type="checkbox" id="bis" name="bis" value="Bis">
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <select name="orientacion" id="orientacion"
                                                        class="form-select mt-1">
                                                        <option value="">Orientación...</option>
                                                        <?php
                                                        foreach ($orientaciones as $orientacion) {
                                                            echo "<option  value='" .$orientacion['orientacion_nombre'] . "'>" . $orientacion['orientacion_nombre'] . "</option>";
                                                        }

                                                        ?>
                                                    </select>

                                                </div>

                                                <div class="col-6 col-md-4">
                                                    <input type="text" name="numero2" id="numero2" class="form-control"
                                                        placeholder="#">
                                                </div>
                                                <div class="col-6 col-md-4">
                                                    <select name="letra2" id="letra2" class="form-select mt-1">
                                                        <option value="">Letra...</option>
                                                        <?php
                                                        foreach ($letras as $letra) {
                                                            echo "<option  value='" .$letra['letra_via'] . "'>" . $letra['letra_via'] . "</option>";
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-6 col-md-4 ">
                                                    <input type="text" name="numero3" id="numero3" class="form-control"
                                                        placeholder="#">
                                                </div>
                                                <div class="col-6 col-md-4 ">
                                                    <select name="barrio" id="barrio" class="form-select mt-1">
                                                        <option value="">Barrio...</option>
                                                        <?php
                                                        foreach ($barrios as $barrio) {
                                                            echo "<option  value='" .  $barrio['barrio_nombre'] . "'>" . $barrio['barrio_nombre'] . "</option>";
                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group mb-3">
                                            <label for="observacion" class="fw-bold">Observación</label>
                                            <textarea name="observacion" id="solicitud_via_mal_estado_descripcion"
                                                class="form-control" placeholder="Describa el accidente"></textarea>
                                        </div>
                                    </div>


                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group mb-3">
                                            <label for="danio_id" class="fw-bold">Tipo de choque</label>
                                            <select name="tipo_choque" id="tipo_choque" class="form-select" data-url='<?php echo getUrl("Solicitud", "Solicitud", "getDetalleChoque", false, "ajax"); ?>'>

                                                <option value="">Seleccione...</option>
                                                <?php
                                                foreach ($choques as $choque) {
                                                    echo "<option  value='" . $choque['tipo_choque_id'] . "'>" . $choque['tipo_choque_nombre'] . "</option>";
                                                }

                                                ?>
                                            </select>
                                            <span class=" text-danger" id="tipoError"></span>
                                        </div>

                                        <?php 
                                         $class="form-group mb-3 d-none";
                                       
                                        
                                        ?>
                                        <?php 
                                       
                                         if(!empty($class))echo "<div class='$class' id='dc'>";
                                        ?>
                                            
                                            <label for="detalle_choque" class="fw-bold">Detalle de choque</label>
                                            <select name="detalle_choque" id="detalle_choque" class="form-select">
                                                <?php

                                                foreach ($detallesChoques as $detalle) {
                                                    echo "<option value='" . $detalle['choque_detalle_id'] . "'>" . $detalle['choque_detalle_descripcion'] . "</option>";
                                                }
                                                ?>

                                            </select>
                                            <span class="error" id="tipoError"></span>
                                       <?php
                                        echo "</div>";
                                        ?>
                                   
                                        <div class="form-group mb-3">
                                            <label for="bis" class="fw-bold">¿Hay lesionados?</label>
                                            <input type="checkbox" id="lesionados" name="lesionados"
                                                value="Con lesionados">

                                        </div>


                                        <div class="form-group mb-3">
                                            <label for="imagen" class="fw-bold">Imagen</label>
                                            <input type="file" name="imagen" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <!-- Botón de envío -->
                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn btn-success">Enviar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>