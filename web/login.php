<?php
    include_once '../lib/helphers.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <form action="<?php echo getUrl("Acceso","Acceso","login");?>" method="post" id="form" >
   <div class="logo"> 
        <img src="R.png" alt="log" class="log">
    </div> 
     <div class="container">
        <div class="logo"> 
            <img src="R.png" alt="log" class="log">
        </div> 
        
            <h1>Iniciar Sesión</h1>
            <label for="uname"><b>Usuario</b></label>
            <input type="text" placeholder="Ingrese su email" name="user" id="user" required>

            <label for="psw"><b>Contraseña</b></label>
            <input type="password" placeholder="Ingrese su contraseña" name="pass" id="pass" required>

            <button type="submit">Iniciar Sesión</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Recordarme
            </label>
        
    </div>
    </form>
</body>
</html> 