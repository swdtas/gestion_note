<?php
 session_start();
include('connexion.php');
  if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $prenom= $_POST['prenom'];
    $email= $_POST['email'];
    $mot_pass_saisi= $_POST['pwd'];
    $fonction='admin';
    $query = "INSERT INTO administrateur (nom, prenom,email,mot_pass,fonction)VALUES (:nom,:prenom,:email,:mot_pass_saisi,:fonction)";
    $query_run = $connect->prepare($query);
    $query_run->bindParam(':nom', $nom); 
    $query_run->bindParam(':prenom', $prenom); 
    $query_run->bindParam(':email', $email);  
    $query_run->bindParam(':mot_pass_saisi',$mot_pass_saisi);   
    $query_run->bindParam(':fonction', $fonction);     
        if ($query_run->execute()) {
            header('Location:../index.php');     
            echo'<h6 class=" incorrect text-danger"> Vos données ont été bien enregistrées!</h6>';
        } else {
            $msg = "Erreur d'enregistrement";
        }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>administrateur</title>
</head>
<body>
<header>

<nav class="navbar navbar-light bg-light">
    <div class="container-fluid ">
      <div >
      <a class="navbar-brand" href="#">
        <img src="../images/logo1.png" alt="" width="100"style=" border-radius: 10px;" height="100" class="d-inline-block align-text-top">
      </a>
    </div>
  </nav>
</header>
    <main>
    <section class="section_index p-1 mt-5">
      <div class="container-fluid row">
      <div class="col-lg-6">
       <img src="../images/image_2.png" alt=""  class="img-fluid">
      </div>
      <div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
        <h1 class="ml-5"> Veuillez enregistrer vos données</h1>
        </div>
        <div class="panel-body color2 p-5 ">
            <form method="POST" action="" >

                <div class="form-group">
                <label for="nom">Nom </label> <br> 
                    <input type="text" name="nom" placeholder="Nom"
                           class="form-control" autocomplete="off" required/>
                </div> <br>
                <div class="form-group">
                <label for="prenom">Prenom(s) </label> <br> 
                    <input type="text" name="prenom" placeholder="prenom"
                           class="form-control" autocomplete="off"  required/>
                </div> <br>
                <div class="form-group">
                <label for="email">Email</label> <br> 
                    <input type="email" name="email" placeholder="email"
                           class="form-control" autocomplete="off"  required/>
                </div> <br>

                <div class="form-group">
                    <label for="pwd">Mot de passe :</label><br>
                    <input type="password" name="pwd"
                           placeholder="Mot de passe" class="form-control"  required/>
                </div> <br>
                <button type="submit" name="submit" class="btn btn-success">
                    <span></span>
                    enregistrer
                </button>
                
            </form>
        </div>
    </div>
</div>
 </section>
    </main>
    <?php include("footer.php");?>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../javascript/javascript.js"></script>   
</body>
</html>