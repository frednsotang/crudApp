<?php 
     $serveurname = "localhost"; 
     $username = "root"; 
     $bdname = "crud"; 
     $password=""; 
      try {
          $conn =   new PDO("mysql:host=$serveurname;dbname=$bdname",$username,$password);
      } catch (PDOExecption $e) {
         die("connexion  echouee".$e->getMessage());
      }
 
 ?>