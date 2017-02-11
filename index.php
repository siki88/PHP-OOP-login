<!DOCTYPE html>
<html lang="cs">
 <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="images/Database.ico" type="image/x-icon">
     <title>Hlavní stránka</title>
 </head>
 <!-- enctype="multipart/form-data" -->
 <body>   
<div id="menu">
 <h1>Přihlašovací stránka</h1>
 <form id="login" method="POST" enctype="application/x-www-form-urlencoded">
    <label for="login-name">Uživatelské jméno:</label>
       <input type="text" id="login-name" name="jmeno" aria-required="true" placeholder="Uživatelské jméno" pattern="\S{3,15}">
         <br><p>
    <label for="password">Uživatelské heslo:</label>
       <input type="password" id="password" name="heslo" aria-required="true" placeholder="Heslo" pattern="\S{3,10}">
         <br><p>
       <input type="submit" name="tlacitko" value="Přihlásit" /> 
 </form><p>
     <a href="registrace.php">Registrovat</a> &nbsp; &nbsp; &nbsp; 
     <a href="resetHesla.php">Zapomenuté heslo</a>
     <br><br>
     <a href="script_pro_tvorbu_db.php"><small>Tvorba databaze - pouze pro tento test !!!</small></a>
     <br>

         
    
<?php


echo '<br>';
include_once 'Databaze.php';
   
try {
   $spojeni = new Databaze();   
    if (isset($_POST['tlacitko'])){
        $jmeno = $_POST['jmeno'];
        $heslo = $_POST['heslo'];
        $spojeni->prihlaseni($jmeno, $heslo);
        }
        
}catch (Expection $e){
    echo 'Error try again'.$e->getMessage();
}

?>           
</div>         
</body>
</html>
