<?php
include_once '../lib/helphers.php';
include_once '../view/partials/header.php';
 
    if(!isset($_SESSION['auth'])){
        redirect('login.php');
        exit;
    }
 echo "<body onload='loadColor();'>";
    
    echo "<div class ='wrapper'>";
     include_once '../view/partials/sidebar.php';
      echo "<div class='main-panel'>";
        include_once '../view/partials/navbar.php';
        echo "<div class='container'>";
            echo "<div class='page-inner'>";
                if(isset($_GET['modulo'])){
                    resolve();
                }else{
                    
                    include_once '../view/partials/content.php';
                    
                }
            echo "</div>";
        echo "</div>";
        include_once '../view/partials/footer.php';
      echo "</div>";    
    echo "</div>";
    // include_once '../view/partials/colors.php';
    include_once '../view/partials/scripts.php';
    
 echo "</body>";
 
echo "</html>";

?>