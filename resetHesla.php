<!DOCTYPE html>
<html lang="cs">
 <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">                                                 
     <title>Zapomenuté heslo</title>
 </head>
 <body>
<div id="menu">
 <h1>Zapomenuté heslo</h1>
   <form id="reset" method="POST" enctype="application/x-www-form-urlencoded">
     <label for="reset-name">Uživatelské jméno:</label>
       <input type="text" id="reset-name" name="jmeno" aria-required="true" placeholder="Uživatelské jméno" pattern="\S{3,10}">
         <br><p>
      <label for="password">Nové heslo:</label>
       <input type="password" id="password" name="noveHeslo" aria-required="true" placeholder="Heslo" pattern="\S{3,10}">
         <br><p>
     <input type="submit" name="tlacitko" value="Reset" /> 
   </form>  
 
<?php
echo '<br>';
include_once 'Databaze.php';  
try {
    $spojeni = new Databaze();
    
    if (isset($_POST['tlacitko'])){
        $jmeno = $_POST['jmeno'];
        $heslo = $_POST['noveHeslo'];
        $spojeni->resetHesla($jmeno, $heslo);
        } 
}catch (Expection $e){
    echo 'Error try again'.$e->getMessage();
}
?>         
</div>         
</body>
</html>