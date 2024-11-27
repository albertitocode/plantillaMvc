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
    <form action="<?php echo getUrl("Usuarios", "Usuarios", "postCreate"); ?>" method="post" id="form">
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
                    <a href="#">Registro usuarios</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tittle">
                            Registro Usuarios
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <div class="col-md-4">
            <label for="usu_id">Id</label>
            <input type="text" name="usu_id" class="form-control" placeholder="Id">
            
        </div> -->
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="usuario_nombre_1">Primer nombre</label>
                                <input type="text" name="usuario_nombre_1" id="usu_nombre_1" class="form-control" placeholder="Nombre 1">

                            </div>
                            <div class="form-group">
                                <label for="usuario_nombre_2">Segundo nombre</label>
                                <input type="text" name="usuario_nombre_2" id="usuario_nombre_2" class="form-control" placeholder="Nombre 2">

                            </div>
                            <div class="form-group">
                                <label for="usuario_apellido_1">Primer apellido</label>
                                <input type="text" name="usuario_apellido_1" id="usuario_apellido_1" class="form-control" placeholder="Apellido 1">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="usuario_apellido_2">Segundo apellido</label>
                                <input type="text" name="usuario_apellido_2" id="usuario_apellido_2" class="form-control" placeholder="Apellido 2">
                            </div>
                            <div class="form-group">
                                <label for="usuario_correo">correo</label>
                                <input type="text" name="usuario_correo" id="usuario_correo" class="form-control" placeholder="Correo">
                            </div>
                            <div class="form-group">
                                <label for="usuario_contrasena">Contraseña</label>
                                <input type="password" name="usuario_contrasena" id="usuario_contrasena" class="form-control" placeholder="Clave">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="usuario_telefono">Telefono</label>
                                <input type="text" name="usuario_telefono" id="usuario_telefono" class="form-control" placeholder="Telefono celular">
                            </div>
                            <div class="form-group">
                                <label for="tipo_document_id">Tipo de documento</label>
                                <select name="tipo_documento_id" id="" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php
                                    foreach ($tipo_documento as $tipo_d) {
                                        echo "<option  value='" . $tipo_d['tipo_documento_id'] . "'>" . $tipo_d['tipo_documento_nombre'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="usuario_num_identificacion">Numero documento</label>
                                <input type="text" name="usuario_num_identificacion" id="usuario_num_identificacion" class="form-control" placeholder="Documento">
                            </div>
                        </div>
                        <div class="mt-5">
                            <input type="submit" value="Enviar" class="btn btn-success">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>