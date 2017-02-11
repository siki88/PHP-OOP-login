<!DOCTYPE html>
<html lang="cs">
 <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">                                           
     <title>Shop</title>
    </head>
    <body>
        <div id="menu">
            <h1>Vítejte</h1>
                      
<?php      
    session_start();
    if($_SESSION['jmeno']!=""){
    echo 'JSI VÍTÁN<br>';
    echo ($_SESSION['jmeno']);
    echo '<br>';
    }
?>              
          <a href="odhlaseni.php"><button>Odhlásit se </button></a>        
        </div>       
    </body>
</html>