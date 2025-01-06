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
    <form action="<?php echo getUrl("Usuarios", "Usuarios", "postCreate"); ?>" method="post" id="formUsu">
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
                            <div class="col-md-12">

                                <div class="row">


                                    <div class="row">

                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-group">

                                                <label for="usuario_nombre_1">Primer nombre</label>
                                                <input type="text" name="usuario_nombre_1" id="usuario_nombre_1"
                                                    class="form-control" placeholder="Nombre 1">
                                                <span class="small-text text-danger" id="error_usuario_nombre_1"></span>
                                            </div>


                                        </div>

                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-group ">
                                                <label for="usuario_nombre_2">Segundo nombre</label>
                                                <input type="text" name="usuario_nombre_2" id="usuario_nombre_2"
                                                    class="form-control" placeholder="Nombre 2">
                                                <span class="small-text text-danger" id="error_usuario_nombre_2"></span>


                                            </div>
                                        </div>

                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-group ">
                                                <label for="usuario_apellido_1">Primer apellido</label>
                                                <input type="text" name="usuario_apellido_1" id="usuario_apellido_1"
                                                    class="form-control" placeholder="Apellido 1">
                                                <span class="small-text text-danger"
                                                    id="error_usuario_apellido_1"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-group">
                                                <label for="usuario_apellido_2">Segundo apellido</label>
                                                <input type="text" name="usuario_apellido_2" id="usuario_apellido_2"
                                                    class="form-control" placeholder="Apellido 2">
                                                <span class="small-text text-danger"
                                                    id="error_usuario_apellido_2"></span>

                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-group ">
                                                <label for="usuario_correo">Correo Electrónico</label>
                                                <input type="text" name="usuario_correo" id="usuario_correo"
                                                    class="form-control" placeholder="Correo">
                                                <span class="small-text text-danger" id="error_usuario_correo"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-group ">
                                                <label for="usuario_fecha_nacimiento">Fecha de nacimiento</label>
                                                <input type="date" name="usuario_fecha_nacimiento"
                                                    id="usuario_fecha_nacimiento" class="form-control">
                                                <span class="small-text  text-danger"
                                                    id="error_usuario_fecha_nacimiento"></span>
                                            </div>



                                        </div>

                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-group">
                                                <label for="usuario_telefono">Teléfono</label>
                                                <input type="text" name="usuario_telefono" id="usuario_telefono"
                                                    class="form-control" placeholder="Teléfono celular">
                                                <span class="small-text text-danger" id="error_usuario_telefono"></span>

                                            </div>
                                        </div>


                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-group ">
                                                <label for="tipo_documento_id">Tipo de documento</label>
                                                <select name="tipo_documento_id" id="tipo_documento_id"
                                                    class="form-control">
                                                    <option value="">Seleccione...</option>
                                                    <?php
                                                    foreach ($tipo_documento as $tipo_d) {
                                                        echo "<option  value='" . $tipo_d['tipo_documento_id'] . "'>" . $tipo_d['tipo_documento_nombre'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <span class="small-text text-danger"
                                                    id="error_tipo_documento_id"></span>

                                            </div>
                                        </div>

                                        <div class="col-md-4 col-lg-4">
                                            <div class="form-group ">
                                                <label for="usuario_num_identificacion">Número documento</label>
                                                <input type="text" name="usuario_num_identificacion"
                                                    id="usuario_num_identificacion" class="form-control"
                                                    placeholder="Documento">
                                                <span class="small-text text-danger"
                                                    id="error_usuario_num_identificacion"></span>

                                            </div>


                                        </div>

                                        <div class="col-md-8 col-lg-8">


                                            <div class="form-group">

                                                <label for="direccion" class="fw-bold">Dirección</label>
                                                <div class="row ">
                                                    <div class="col-6 col-md-4">
                                                        <select name="tipo_via" id="tipo_via" class="form-select mt-1">
                                                            <option value="">Tipo de vía...</option>
                                                            <?php

                                                            foreach ($vias as $via) {
                                                                echo "<option  value='" . $via['tipo_via_nombre'] . "'>" . $via['tipo_via_nombre'] . "</option>";
                                                            }

                                                            ?>
                                                        </select>
                                                        <span class="small-text text-danger" id="error_tipo_via"></span>

                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <input type="text" name="num_via" id="num_via"
                                                            class="form-control" placeholder="Número vía">
                                                        <span class="small-text text-danger" id="error_num_via"></span>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <select name="letra1" id="letra1" class="form-select mt-1">
                                                            <option value="">Letra...</option>
                                                            <?php
                                                            foreach ($letras as $letra) {
                                                                echo "<option  value='" . $letra['letra_via'] . "'>" . $letra['letra_via'] . "</option>";
                                                            }

                                                            ?>
                                                        </select>



                                                    </div>
                                                    <div class="col-6 col-md-4 text-center">
                                                        <label for="bis" class="fw-bold mt-3">¿Es Bis?</label>
                                                        <input type="checkbox" id="bis" name="bis" value="Bis">
                                                        <span class="small-text text-danger" id="error_bis"></span>
                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <select name="orientacion" id="orientacion"
                                                            class="form-select mt-1">
                                                            <option value="">Orientación...</option>
                                                            <?php
                                                            foreach ($orientaciones as $orientacion) {
                                                                echo "<option  value='" . $orientacion['orientacion_nombre'] . "'>" . $orientacion['orientacion_nombre'] . "</option>";
                                                            }

                                                            ?>
                                                        </select>
                                                        <span class="small-text text-danger"
                                                            id="error_orientacion"></span>

                                                    </div>

                                                    <div class="col-6 col-md-4">
                                                        <input type="text" name="numero2" id="numero2"
                                                            class="form-control" placeholder="#">
                                                        <span class="small-text text-danger" id="error_numero2"></span>

                                                    </div>
                                                    <div class="col-6 col-md-4">
                                                        <select name="letra2" id="letra2" class="form-select mt-1">
                                                            <option value="">Letra...</option>
                                                            <?php
                                                            foreach ($letras as $letra) {
                                                                echo "<option  value='" . $letra['letra_via'] . "'>" . $letra['letra_via'] . "</option>";
                                                            }

                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-6 col-md-4 ">
                                                        <input type="text" name="numero3" id="numero3"
                                                            class="form-control" placeholder="#">
                                                        <span class="small-text text-danger" id="error_numero3"></span>

                                                    </div>
                                                    <div class="col-6 col-md-4 ">
                                                        <select name="barrio" id="barrio" class="form-select mt-1">
                                                            <option value="">Barrio...</option>
                                                            <?php
                                                            foreach ($barrios as $barrio) {
                                                                echo "<option  value='" . $barrio['barrio_nombre'] . "'>" . $barrio['barrio_nombre'] . "</option>";
                                                            }

                                                            ?>
                                                        </select>
                                                        <span class="small-text text-danger" id="error_barrio"></span>

                                                    </div>

                                                </div>
                                            </div>


                                        </div>

                                        <div class="col-md-4 col-lg-4">


                                            <div class="form-group">
                                                <label for="usuario_contrasenia">Contraseña</label>
                                                <input type="password" name="usuario_contrasenia"
                                                    id="usuario_contrasenia" class="form-control" placeholder="Clave"
                                                    autocomplete="new-password">
                                                <span class="small-text text-danger"
                                                    id="error_usuario_contrasenia"></span>

                                                <select name="rol" id="rol" class="form-select mt-4">
                                                    <option value="">Rol...</option>
                                                    <?php
                                                    foreach ($roles as $rol) {
                                                        echo "<option  value='" . $rol['rol_id'] . "'>" . $rol['rol_nombre'] . "</option>";
                                                    }

                                                    ?>
                                                </select>
                                                <span class="small-text text-danger" id="error_rol"></span>


                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <div class="mt-5">
                                    <input type="submit" id="btnSubmit" value="Enviar" class="btn btn-success">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>