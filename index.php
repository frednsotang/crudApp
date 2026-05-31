<?php  
   require   "config/dbconfig.php";
  if(isset($_POST['envoyer'])) { 
       $nom =  htmlspecialchars($_POST["username"]);
       $prenom =  htmlspecialchars($_POST["surname"]); 
       $age = htmlspecialchars($_POST["age"]); 
       $tel =  htmlspecialchars($_POST["numero"]); 
        rtrim($nom); 
        rtrim($prenom); 
        rtrim($age); 
        rtrim($tel); 

         $query =   $conn->prepare("INSERT INTO  personne(nom ,prenom ,age,tel) VALUES(:nom ,:prenom ,:age ,:tel)");
          $req =  $query->execute(array( 
            "nom"=>$nom,
            "prenom"=>$prenom , 
            "age"=>$age , 
            "tel"=>$tel,
          ));
            if($req)  { 
                    header("Location:index.php?valid=true"); 
            }else { 
                   header("refresh" , 1);
            }
  }
 ?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="./index.css"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>  
<nav class="navbar bg-success-subtle">
  <div class="container">
    <a class="navbar-brand" href="#">
    <i class="bi bi-send-fill"></i>  Crud
    </a>
  </div>
</nav>
  <section class="contain-app"> 
     <h1>App  Crud</h1>
  <form  action=' <?php   $_SERVER['PHP_SELF']?>'  method='post'>   
  <div class="mb-3">
    <label for="nomexemple1" class="form-label">Nom</label>
    <input type="text" class="form-control" id="nom_user"  name='username' aria-describedby="namehelp" required  placeholder='Entrer votre Nom '>
  </div>
  <div class="mb-3">
    <label for="prenom" class="form-label">Prenom</label>
    <input type="text" class="form-control" id="usersurname" name='surname' placeholder='Entrer  votre prenom' required>
  </div>
  <div class="mb-3 ">
    <label for="age" class="form-label">age</label>
    <input type="number" class="form-control" id="userage"  name='age' placeholder='Entrer  votre age' required>
  </div> 
  <div class="mb-3 ">
    <label for="numero" class="form-label">numero telephone</label>
    <input type="tel" class="form-control" id="usernumber"  name='numero' placeholder='Entrer  votre numero' required>
  </div>
  <button type="submit" class="btn bg-success-subtle"  name='envoyer'>Envoyer</button>
</form>  
<!-- <table  border='1' >  
<thead  class='bg-success-subtle'>
    <tr> 
         <td>id</td>
        <td>Nom</td>
        <td>Prenom</td>
        <td>age</td>
        <td>telephone</td>
        <td>Modifier</td>
        <td>supprimer</td>
    </tr>
</thead>   
<tbody> 
</tbody>
</table>  -->
<table class="table">
  <thead >
    <tr>
      <th scope="col">id</th>
      <th scope="col">nom</th>
      <th scope="col">prenom</th>
      <th scope="col">age</th>
      <th scope="col">tel</th>
      <th scope="col">modifier</th>
      <th scope="col">supprimer</th>
    </tr>
  </thead>
  <tbody>
  <?php 
     
              $req2 =   $conn->query("SELECT *  FROM personne ORDER BY id  ASC"); 
                if($req2)  {                 
                  while($personne = $req2->fetch(PDO::FETCH_OBJ))  {  
                     $id =  $personne->id; 
                     $name =  $personne->nom; 
                     $surname = $personne->prenom; 
                     $old_age = $personne->age; 
                     $telphone =  $personne->tel; 
                     echo "<tr><td>$id</td><td>$name</td><td>$surname</td><td>$old_age</td><td>$telphone</td><td class='update-col'><a href='http://localhost/phpApprentissage/crudApp2/update.php?update=valid&id=$id' class='btn btn-info' tabindex='-1' role='button' aria-disabled='true'>Modifier</a></td><td class='delete-col'><a href='http://localhost/phpApprentissage/crudApp2/index.php?valid=true&delete=valid&id=$id' class='btn btn-danger' tabindex='-1' role='button' aria-disabled='true'>Supprimer</a></td></tr>";     
                  }  
                }
     
     ?>
  </tbody>
</table>  
     <?php 
        if(isset($_GET["delete"])) { 
              if(isset($_GET["id"]))  { 
                 $id_delete =  $_GET['id']; 
                    $delete =  $conn->prepare("DELETE  FROM personne  WHERE id=?"); 
                    $query =  $delete->execute(array($id_delete)); 
                    if($query)  {   
                        //  header("refresh",1);  
                          echo  "<script>alert('  Delete  success !')</script>"; 
                    }else {    
                         echo  "<script>alert('  Delete  failed !')</script>";
                    }

              } 

        }
       
      ?>
 
  </section> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>   
</body>
</html>