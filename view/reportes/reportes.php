<!-- <div class="mt-5">
    <h3 class="display-4">Registrar usuario</h3>
</div> -->


<div class="mt-5">
    <div class="alert alert-danger d-none" role="alert" id="error">

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
    <form action="" method="post" id="form">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Solicitudes</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Realizar reporte</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tittle">
                            Reporte
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <div class="col-md-4">
            <label for="usu_id">Id</label>
            <input type="text" name="usu_id" class="form-control" placeholder="Id">
            
        </div> -->
                        <div class="col-md-3 mt-4">
                            <!-- <label for="">Id</label>
                            <input type="text" name="id_solicitud" id="id_solicitud" class="form-control"
                                placeholder="Buscar por tipo de solcitud" data-url='
                         -->
                        <label for="">Tipo de solicitud</label>
                                <select name="id_reporte" id="id_reporte" class="form-select" data-url='<?php echo getUrl("Reportes", "Reportes", "selectReporte", false, "ajax");?>'>
                                    <option value="">Seleccione...</option>
                                    <?php
                                    foreach ($tipo_solicitudes as $tipo_s) {
                                        echo "<option  value='" . $tipo_s['tipo_solicitud_id'] . "'>" . $tipo_s['tipo_solicitud_nombre'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <a href="<?php echo getUrl("Reportes","Reportes","postReportes") ?>" class="btn btn-primary btn-round">Cargar prueba de grafica</a>
                                </div> 

                                <!-- <a id="toggleButton" class="btn btn-primary btn-round">Cambiar a Modo Oscuro</a> -->
                        <div id="formulariosReport">
                                
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>