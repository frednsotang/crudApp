<?php 
      require  "config/dbconfig.php"; 
       if(isset($_POST["modifier"])) { 
           if(isset($_GET["id"]))  { 
                  $value_id =  $_GET["id"]; 
                  $success ="";
                   $nom = htmlspecialchars($_POST["username"]);
                   $prenom= htmlspecialchars($_POST["surname"]);
                   $age  =  htmlspecialchars($_POST["age"]);
                   $numero =  htmlspecialchars($_POST["numero"]);
                   $modifier =  $conn->prepare("UPDATE personne SET nom= ? ,prenom=?,age=?,tel=? WHERE id=?");  
                   $query =  $modifier->execute(array($nom,$prenom,$age,$numero,$value_id)); 
                   if($query) { 
                    echo  "<script>alert('information modifier')</script>";
                   }
           }
       }
      
    
 ?>
  
 <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upgrade</title>
    <link rel="stylesheet" href="./update.css"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body> 
  <section  class='body_app_udapte'>  
      <h1>Modifier  vos information</h1> 
      <form  action=""  method='post'>   
  <div class="mb-3">
    <label for="nomexemple1" class="form-label">Nom</label>
    <input type="text" class="form-control" id="nom_user"  name='username' aria-describedby="namehelp" required  placeholder='Entrer votre Nom '  value="">
  </div>
  <div class="mb-3">
    <label for="prenom" class="form-label">Prenom</label>
    <input type="text" class="form-control" id="usersurname" name='surname' placeholder='Entrer  votre prenom' required  value="">
  </div>
  <div class="mb-3 ">
    <label for="age" class="form-label">age</label>
    <input type="number" class="form-control" id="userage"  name='age' placeholder='Entrer  votre age' required  value="">
  </div> 
  <div class="mb-3 ">
    <label for="numero" class="form-label">numero telephone</label>
    <input type="tel" class="form-control" id="usernumber"  name='numero' placeholder='Entrer  votre numero' required  value="">
  </div>
  <button type="submit" class="btn bg-success-subtle"  name='modifier'>update</button>
</form>  
  </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.min.js" integrity="sha384-VQqxDN0EQCkWoxt/0vsQvZswzTHUVOImccYmSyhJTp7kGtPed0Qcx8rK9h9YEgx+" crossorigin="anonymous"></script>      
</body>
</html>