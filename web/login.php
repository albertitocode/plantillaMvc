<?php
include_once '../lib/helphers.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>GEO CALI</title>
    <link
      rel="icon"
      href="assets/img/logo1.png"
      type="image/x-icon"
    />
</head>

<body>
    <div class="d-flex justify-content-center align-items-center h-100">
        <div class="login-container">

            <div class="login">
                <!-- <img src="assets/img/prueba.png" alt=""> -->
                <div class="logo">
                    <img src="assets/img/logo1.png" alt="log" class="log">
                </div>

                <h1>Iniciar Sesión</h1>

                <form action="<?php echo getUrl("Acceso", "Acceso", "login", "", "ajax"); ?>" method="post" id="formUsu">
                    <div class="inputbox mb-3">
                        <i class='bx bxs-user'></i>
                        <input type="email" class="" name="user" id="user" required>
                        <label for="uname"><b>Usuario</b></label>
                    </div>

                    <div class="inputbox mb-3">
                        <i class='bx bxs-lock-alt'></i>
                        <input type="password" class="" name="pass" id="pass" required>
                        <label for="psw"><b>Contraseña</b></label>

                    </div>
                    <div class="buttons">
                        <button type="submit" class="btn btn-success w-100">Iniciar Sesión</button>

                      




                </form>
                <!-- <form action="<?php echo getUrl("Usuarios", "Usuarios", "getCreate", "", "ajax"); ?>" method="post"
                    id="form2">
                    <button type="submit" class="btn btn-success w-100" name="registro" id="button">Registrarme</button>



                </form> -->

                </div>





            <!-- <label>
                <input type="checkbox" checked="checked" name="remember"> Recordarme
            </label> -->
            <a href="<?php echo getUrl("Acceso","Acceso","ObtenerCodigo","","ajax");?>">

                <p>Olvidó su contraseña?</p>
            </a>
         
    </form>
    <form action="<?php echo getUrl("Usuarios","Usuarios","getCreate","","ajax");?>" method="post" id="form2" >
    <button type="submit" class="btn btn-success" name="registro">Registrarme</button>
        
        </div>



    </div>
    </div>

</body>

</html>