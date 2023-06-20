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
    <title>inscription</title>
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
    <div >
    <a href="#d"><button type="button" name class="btn  btn-success">enregistrement d'un élève</button></a>
    </div>
    <div>
    <a href="\appli_gestions_eleves\code\pages\donne_eleve.php"><button type="button" name class="btn btn-success">Suivie scolaire</button></a>
    </div>
    <div>
    <a href="\appli_gestions_eleves\code\pages\deconnexion.php"><button type="button" name class="btn btn-success">Déconnexion</button></a>
    </div>
  </nav>
</header>
    <main>
    <section class="section_index p-1 mt-5" id="d">
      <div class="container-fluid row">
        <div class="col-lg-6">
        <img src="../images/image5.png" alt=""  class="img-fluid">
        <div class="mt-5"><a href="\appli_gestions_eleves\code\pages\compte_secretaire.php"><button type="submit" class="btn btn-success mb-2 ">Retour</button></a></div> 
      </div>
      <div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
            <h2 class=""> Veuillez enregistrer les information des éleves </h2>
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
                <label for="email">Date de naissance</label> <br> 
                    <input type="date" name="date_naissance" placeholder="date naissance"
                           class="form-control" autocomplete="off"  required/>
                </div> <br>
                <div class="form-group">
                <label for="email">Lieu de naissance</label> <br> 
                    <input type="text" name="lieu_naissance" placeholder="lieu naissance"
                       class="form-control" autocomplete="off"  required/>
                </div> <br>
                <div class="form-group">
                 <label for="genre">Genre:</label>
                <select  class="form-control"   type="text" class="choix" id="genre" name="genre">
                    <option value="homme">Homme</option>
                    <option value="femme">Femme</option>
                </select>
                </div><br>
                <div class="form-group">
                 <label for="genre">Classe :</label>
                <select  class="form-control"   type="text" class="choix" id="genre" name="genre">
                <option value="6ex">selectionner la classe de l'élève</option>
                    <option value="6ex">6e</option>
                    <option value="5ex">5e</option>
                    <option value="4ex">4e</option>
                    <option value="3ex">3e</option>
                </select>
                </div><br>
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