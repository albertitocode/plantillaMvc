<?php
    include_once '../lib/helphers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login</title>
    
</head>
<body>
    
    <form action="<?php echo getUrl("Acceso","Acceso","login","","ajax");?>" method="post" id="form1" >
   <div class="logo"> 
        <img src="assets/img/calvo.jpg" alt="log" class="log">
    </div> 
     <div class="container">
     <!-- <img src="assets/img/prueba.png" alt=""> -->
        <div class="logo"> 
            <img src="assets/img/calvo.jpg" alt="log" class="log">
        </div> 
        
            <h1>Iniciar Sesión</h1>
            <label for="uname"><b>Usuario</b></label>
            <input type="text" placeholder="Ingrese su email" name="user" id="user" required>

            <label for="psw"><b>Contraseña</b></label>
            <input type="password" placeholder="Ingrese su contraseña" name="pass" id="pass" required>

            <button type="submit" class="btn btn-success">Iniciar Sesión</button>
            <!-- <label>
                <input type="checkbox" checked="checked" name="remember"> Recordarme
            </label> -->
         
    </form>
    <form action="<?php echo getUrl("Usuarios","Usuarios","getCreate","","ajax");?>" method="post" id="form2" >
    <button type="submit" class="btn btn-success" name="registro">Registrarme</button>
        
        </div>

    </form>
</body>
</html> 