<!-- <div class="mt-5">
    <h3 class="display-4">Registrar usuario</h3>
</div> -->


<div class="mt-5">

    <!-- <form action="<?php echo getUrl("Reportes", "Reportes", "postReportes"); ?>" method="post"
        id="formAccidente"> -->
        <form action="<?php echo getUrl("Reportes", "Reportes", "postReportes"); ?>" method="post"
        id="formreportAcci">
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
                    <a href="#">Reporte Solicitudes</a>
                </li>
            </ul>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                        <div class="card-tittle">
                            Reporte Accidente
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

                                    <!--     <div class="form-group mb-3">

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
                                                <span class=" text-danger" id="error_direccion"></span>

                                            </div>
                                        </div> -->
                                        <div class="form-group">
            <label for="startDate">Fecha de Inicio:</label>
            <input type="date" id="startDate" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="endDate">Fecha de Fin:</label>
            <input type="date" id="endDate" class="form-control" required>
        </div>

        <fieldset class="form-group">
            <legend>Frecuencia:</legend>
            <div class="form-check">
                <input type="radio" name="frequency" value="day" class="form-check-input" checked>
                <label class="form-check-label">Día a Día</label>
            </div>
            <div class="form-check">
                <input type="radio" name="frequency" value="month" class="form-check-input">
                <label class="form-check-label">Mes a Mes</label>
            </div>
            <div class="form-check">
                <input type="radio" name="frequency" value="year" class="form-check-input">
                <label class="form-check-label">Año a Año</label>
            </div>
        </fieldset>

                                      
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
                                            <span class=" text-danger" id="error_tipo_choque"></span>
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
                                            <span class=" text-danger" id="error_detalle_choque"></span>
                                       <?php
                                       
                                        echo "</div>";
                                        ?>
                                   
                                        <div class="form-group mb-3">
                                            <label for="bis" class="fw-bold">¿Hay lesionados?</label>
                                            <input type="checkbox" id="lesionados" name="lesionados"
                                                value="Con lesionados">

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