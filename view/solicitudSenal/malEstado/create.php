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
    <form action="<?php echo getUrl("Solicitud", "Solicitud", "postCreateSenal"); ?>" method="post" id="form">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Registro</h3>
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
                    <a href="#">Usuarios</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Registro señales en mal estado</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tittle">
                            Señal en mal estado
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
                                            echo "<option  value='" . $categoria['categoria_senal_id'] . "'>" . $categoria['categoria_senal_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="danio_id"> Daño</label>
                                    <select name="danio_id" id="" class="form-control">
                                        <option value="">Seleccione daño...</option>
                                        <?php
                                        foreach ($senial_id as $senial) {
                                            echo "<option  value='" . $categoria['danio_id'] . "'>" . $categoria['danio_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="solicitud_senial_mal_estado_direccion"> Direccion</label>
                                    <select name="dir1" id="" class="form-control">
                                        <option value="">Seleccione carrera...</option>
                                        <option value=""> Cra</option>
                                    </select>
                                    <select name="dir2" id="" class="form-control">
                                        <option value="">Seleccione calle...</option>
                                        <option value=""> Cra</option>
                                    </select>
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
                                <label for="solicitud_senial_mal_estado_descripcion"> Describa el daño</label>
                                <input type="text" name="solicitud_senial_mal_estado_descripcion" id="" class="form-control" placeholder="Describa el estado de la señal">
                            </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="senial_id">Nombre de la señal</label>
                                <select name="senial_id" id="" class="form-control">
                                    <option value="">Seleccione categoria...</option>
                                    <?php
                                    foreach ($senial_id as $senial) {
                                        echo "<option  value='" . $categoria['senial_id'] . "'>" . $categoria['senial_nombre'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image" class="d-block">Imagen de la señal dañada</label>
                                <input type="file" name="solicitud_senial_mal_estado_imagen">
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