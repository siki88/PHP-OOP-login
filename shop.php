<!DOCTYPE html>
<html lang="cs">
 <head>
    <meta charset="utf-8">
  <!--  <link rel="stylesheet" href="style.css">  -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <title>Shop</title>
    </head>
    <body>
        <div class="jumbotron text-center">
            <h1>Vítejte</h1>
                      
<?php      
include_once 'Databaze.php';

    session_start();
    if($_SESSION['jmeno']!=""){
    echo 'Přihlášen:<br>';
    echo ($_SESSION['jmeno']);
    session_regenerate_id();
    echo '<br>';
    }
    
try {
   $spojeni = new Databaze();   //připojuji se do třídy
    if (isset($_POST['odhlaseni'])){ //pokud zmáčknu tlačítko
        $spojeni->odhlaseni();   //volám odhlášení
        }
        
}catch (Expection $e){
    echo 'Něco je špatně'.$e->getMessage();
}
    
    
    
    
    
    
?>       
      <form method="POST">     
       <input type="submit" name="odhlaseni" value="Odhlásit se" />
      </form> 
        </div> 
        
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>Column 1</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
      <h3>Column 2</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
      <h3>Column 3</h3>        
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
  </div>
</div>        
        
        
        
        
        
        
    </body>
</html>



