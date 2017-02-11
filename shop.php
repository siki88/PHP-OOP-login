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
                      
include_once 'Databaze.php';

    session_start();
    if($_SESSION['jmeno']!=""){
    echo 'JSI VÍTÁN<br>';
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
    </body>
</html>

