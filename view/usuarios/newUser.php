<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Tura visor</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />
    
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />

    

    <!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.4/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.4/dist/sweetalert2.min.js"></script>

  </head>
  <style>

body {
    
    /* background-color: #0adb29; */
    background: url('../web/assets/img/laquinta.jpg') no-repeat;
    background-size: cover; /* Ajusta la imagen para cubrir todo el fondo */
    
}
</style>
<body>
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
        <!-- <div class="page-header">
            <h3 class="fw-bold mb-3">Registrate</h3>
        </div> -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card align-items-center">
                    <div class="card-header">
                        <div class="card-tittle">
                           <h4> Registro de Usuarios</h4>
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
                                <input type="text" name="usuario_nombre_1" id="" class="form-control" placeholder="Nombre 1">

                            </div>
                           
                            <div class="form-group">
                                <label for="usuario_apellido_1">Primer apellido</label>
                                <input type="text" name="usuario_apellido_1" id="" class="form-control" placeholder="Apellido 1">
                            </div>
                            <div class="form-group">
                                <label for="usuario_correo">correo</label>
                                <input type="text" name="usuario_correo" id="" class="form-control" placeholder="Correo">
                            </div>  
                            <div class="form-group">
                            <label for="usuario_direccion">Direccion </label>
                            <input type="text" name="usuario_direccion" id="" class="form-control" placeholder="Direccion">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                        <div class="form-group">
                                <label for="usuario_nombre_2">Segundo nombre</label>
                                <input type="text" name="usuario_nombre_2" id="" class="form-control" placeholder="Nombre 2">

                            </div>
                            <div class="form-group">
                                <label for="usuario_apellido_2">Segundo apellido</label>
                                <input type="text" name="usuario_apellido_2" id="" class="form-control" placeholder="Apellido 2">
                            </div>
                            
                            <div class="form-group">
                                <label for="usuario_contrasenia">Contraseña</label>
                                <input type="password" name="usuario_contrasenia" id="" class="form-control" placeholder="Clave">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="form-group">
                                <label for="usuario_telefono">Telefono</label>
                                <input type="text" name="usuario_telefono" id="" class="form-control" placeholder="Telefono celular">
                            </div>
                            <div class="form-group">
                                <label for="tipo_documento_id">Tipo de documento</label>
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
                                <input type="number" name="usuario_num_identificacion" id="" class="form-control" placeholder="Documento">
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
</body>
</html>


