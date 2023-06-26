<?php
 session_start();
include('connexion.php');
function generateRandomPassword($length = 6) {
  // Caractères possibles dans le mot de passe
  $characters = 'A0123456789';

  $password = '';
  $charLength = strlen($characters) - 1;

  // Générer un caractère aléatoire à chaque itération jusqu'à atteindre la longueur souhaitée
  for ($i = 0; $i < $length; $i++) {
      $randomIndex = mt_rand(0, $charLength);
      $password .= $characters[$randomIndex];
  }

  return $password;
}

// Exemple d'utilisation pour générer un mot de passe de 10 caractères
$password = generateRandomPassword(4);
  if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $prenom= $_POST['prenom'];
    $email= $_POST['email'];
    $telephone=$_POST['telephone'];
    $mot_pass=$password;  
    $query = "INSERT INTO parent (nom,prenom,email,telephone,mot_pass)VALUES (:nom,:prenom,:email,:telephone,:mot_pass)";
    $query_run = $connect->prepare($query);
    $query_run->bindParam(':nom', $nom); 
    $query_run->bindParam(':prenom', $prenom); 
    $query_run->bindParam(':email', $email);     
    $query_run->bindParam(':telephone', $telephone); 
    $query_run->bindParam(':mot_pass',$mot_pass);    
        if ($query_run->execute()) {   
          $msg = "Vos données ont été bien enregistrées!" ; 
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
      <img src="../images/logo2.png" alt="" width="100"height="70" class="d-inline-block align-text-top">
    </a>
      </a>
    </div>
    <div >
    <a href="\appli_gestions_eleves\code\pages\compte_secretaire.php"><button type="button" name class="btn  btn-success">Création de compte sécretaire</button></a>
    </div>
    <div>
    <a href="#d"><button type="button" name class="btn btn-success">Création de compte parent</button></a>
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
        <img src="../images/image4.png" alt=""  class="img-fluid">
       <div class="mt-5"><a href="\appli_gestions_eleves\code\pages\page_eleve.php"><button type="submit" class="btn btn-success">
        Accéder aux informations des élèves</button> </a>  </div> 
      </div>
      <div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
            <h2 class=""> Veuillez créer un compte parent d'élève</h2>
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
                <label for="telephone">Téléphone</label> <br> 
                    <input type="" name="telephone" placeholder="numéro de téléphone"
                           class="form-control" autocomplete="off"  required/>
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