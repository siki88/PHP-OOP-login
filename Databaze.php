<?php

class Databaze {

    private $DBconnect;
  
  public function __construct() {
         try{
    $DBconnect = new PDO('mysql:host=localhost;dbname=shop;charset=utf8', 'root', '');
                    
    $DBconnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    }catch (PDOException $e){
        die('Connection failed: ' . $e->getMessage());
    } 
    $this->DBconnect=$DBconnect;
}
  
  public function registrace($jmeno, $heslo, $potvrdHeslo, $email){
       try{
           if (!empty($_POST['tlacitko'])) {
             $message = '';
             if ($jmeno == '') {
                $message .= 'Nezadáno uživatelské jméno!<br>';    
             }
             if ($heslo == '') {
                $message .= 'Nezadáno heslo!<br>';
             }
             if ($potvrdHeslo == '') {
                 $message .='Nezadáno druhé heslo!<br>';
             }
             if ($email == '') {
                 $message .= 'Nezadán email!<br>';
             }
             if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                 $message .= 'Špatná email addresa!<br>';
             }
             if ($heslo != $potvrdHeslo) {
                 $message .= 'Hesla se neshodují!<br>';
             } 
            
             if ($message == ''){
              $hash = password_hash($heslo, PASSWORD_DEFAULT);      
              $registrace=$this->DBconnect->prepare
                ('INSERT INTO uzivatele(jmeno,heslo,email)VALUES(:jmeno,:heslo,:email)');
              $registrace->bindParam('jmeno', $jmeno, PDO::PARAM_STR);
              $registrace->bindParam('email', $email, PDO::PARAM_STR);
              $registrace->bindParam('heslo', $hash, PDO::PARAM_STR); 
              $registrace->execute();
              header('Location: index.php');
              exit();
           } else {
              echo htmlspecialchars($message);
           }    
        }    
       }catch (Expection $e){
        echo 'Error try again'.$e->getMessage();
        exit($e->getMessage());
      }   
  } 
  
  public function prihlaseni($jmeno, $heslo){ 
       
   try{
        $spojeni = $this->DBconnect->prepare('SELECT * FROM uzivatele WHERE jmeno = :jmeno');
        $spojeni->bindParam('jmeno', $jmeno);
        $spojeni->execute();  //odesílám do databaze   
        $rows=$spojeni->fetchAll(PDO::FETCH_ASSOC);    
        $row = reset($rows);  
       
        if (password_verify($heslo, $row['heslo'])){  
            session_start(); 
          //session_regenerate_id();
//Pracuji na tom-na vsech ostatnich strankach session_start();->osetreni session stealing
            $_SESSION['jmeno'] = $jmeno; 
            header('Location: shop.php');
            exit();
       } else {
          echo '<br>'; 
          echo htmlspecialchars('Zadal jsi špatné jméno nebo heslo!');
       }
  
    }catch (Expection $e){
     echo 'Error try again'.$e->getMessage();
    }            
  }
  
    
  public function resetHesla($jmeno, $heslo){
    try{ 
    if (($jmeno != '') && ($heslo != '')){
        $hash = password_hash($heslo, PASSWORD_DEFAULT);
$reset=$this->DBconnect->prepare('UPDATE uzivatele SET heslo = :heslo WHERE jmeno = :jmeno');
        $reset->bindParam('jmeno', $jmeno, PDO::PARAM_STR);
        $reset->bindParam('heslo', $hash, PDO::PARAM_STR); 
        $reset->execute();
        header('Location: index.php');
    }else{
        echo htmlspecialchars('Nezadali jste užitatelské jméno nebo nové heslo.');
    }          
        
    } catch (Exception $ex) {
    }   
  }
    
    
    public function odhlaseni (){
      session_start();
      session_regenerate_id();
      unset($_SESSION['jmeno']);
      header("Location: index.php");
  }
    
    
 }
    
