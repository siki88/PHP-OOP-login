<!DOCTYPE html>
<html lang="cs">
 <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">                                           
     <title>Registrace</title>
 </head>
 <body>        
<div id="menu">
 <h1>Registrační stránka</h1>
 <form id="register" method="POST" enctype="application/x-www-form-urlencoded">
     <label for="register-name">Uživatelské jméno:</label>
       <input type="text" id="register-name" name="jmeno" aria-required="true" placeholder="Uživatelské jméno" pattern="\S{3,10}">
         <br><p>
     <label for="password">Uživatelské heslo:</label>
       <input type="password" id="password" name="heslo" aria-required="true" placeholder="Heslo" pattern="\S{3,10}">
         <br><p>
     <label for="password">Potvrzení hesla:</label>
       <input type="password" id="password" name="potvrdHeslo" aria-required="true" placeholder="Heslo" pattern="\S{3,10}">
         <br><p>
     <label for="email">Emailová adresa:</label>    
       <input type="email" id="email" name="email" aria-required="true" placeholder="email@hosting.com" pattern="\S{3,30}" >
     <br><p>
     <input type="submit" name="tlacitko" value="Registrovat">
   </form> 
<?php
echo '<br>';
include_once 'Databaze.php';  
try {
    $spojeni = new Databaze();
 
    if (isset($_POST['tlacitko'])){
        $jmeno = $_POST['jmeno'];
        $heslo = $_POST['heslo'];
        $potvrdHeslo = $_POST['potvrdHeslo'];
        $email = $_POST['email'];
        $spojeni->registrace($jmeno, $heslo, $potvrdHeslo, $email);
        } 
}catch (Expection $e){
    echo 'Error try again'.$e->getMessage();
}
?>        
</div>       
</body>
</html>
