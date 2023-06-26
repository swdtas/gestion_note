<?php
session_start();
 
include('connexion.php');
$query_select = "SELECT nom, prenom, telephone FROM parent";
$result_select = $connect->query($query_select);
$parents = $result_select->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {
    $nom=$_POST['nom'];
    $prenom= $_POST['prenom'];
    $date_naissance=$_POST['date_naissance'];
    $lieu_naissance= $_POST['lieu_naissance'];
    $genre= $_POST['genre'];
    $nom_tuteur= $_POST['nom_tuteur'];

    // Recherche du numéro de téléphone du parent sélectionné
    $parent = array_filter($parents, function($parent) use ($nom_tuteur) {
        return $parent['nom'] === $nom_tuteur;
    });

    $telephone = reset($parent)['telephone']; // Récupération du numéro de téléphone

    $classe= $_POST['classe'];

    $query= "INSERT INTO `eleve`( `nom`, `prenom`, `date_naissance`, `lieu_naissance`, `genre`, `nom_tuteur`, `telephone`, `classe`) VALUES (:nom,:prenom,:date_naissance,:lieu_naissance,:genre,:nom_tuteur,:telephone,:classe)";
    $query_run = $connect->prepare($query);
    $query_run->bindParam(':nom', $nom); 
    $query_run->bindParam(':prenom', $prenom); 
    $query_run->bindParam(':date_naissance', $date_naissance); 
    $query_run->bindParam(':lieu_naissance', $lieu_naissance);
    $query_run->bindParam(':genre', $genre);
    $query_run->bindParam(':nom_tuteur', $nom_tuteur);
    $query_run->bindParam(':telephone', $telephone);  
    $query_run->bindParam(':classe', $classe);
    
    if ($query_run->execute()) {    
        // echo'<h6 class=" incorrect text-danger"> Vos données ont été bien enregistrées!</h6>';
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
        ffdd
        <div class="col-lg-6">
            <img src="../images/image5.png" alt=""  class="img-fluid">
            <div class="mt-5"><a href="\appli_gestions_eleves\code\pages\compte_secretaire.php"><button type="submit" class="btn btn-success mb-2 ">Retour</button></a></div> 
        </div>
        <div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class=""> Veuillez enregistrer les informations des élèves </h2>
                </div>
                <div class="panel-body color2 p-5 ">
                    <form method="POST" action="" >

                        <div class="form-group">
                            <label for="nom">Nom</label> <br> 
                            <input type="text" name="nom" placeholder="Nom" class="form-control" autocomplete="off" required/>
                        </div> <br>
                        <div class="form-group">
                            <label for="prenom">Prénom(s)</label> <br> 
                            <input type="text" name="prenom" placeholder="Prénom" class="form-control" autocomplete="off"  required/>
                        </div> <br>
                        <div class="form-group">
                            <label for="email">Date de naissance</label> <br> 
                            <input type="date" name="date_naissance" placeholder="Date de naissance" class="form-control" autocomplete="off"  required/>
                        </div> <br>
                        <div class="form-group">
                            <label for="lieu">Lieu de naissance</label> <br> 
                            <input type="text" name="lieu_naissance" placeholder="Lieu de naissance" class="form-control" autocomplete="off"  required/>
                        </div> <br>
                        <div class="form-group">
                            <label for="genre">Genre:</label>
                            <select class="form-control" type="text" class="choix" id="genre" name="genre">
                                <option value="" selected disabled>Sexe</option>
                                <option value="homme">Homme</option>
                                <option value="femme">Femme</option>
                                <?php if(isset($_POST['submit']) && empty($_POST['genre'])): ?>
                                    <span class="text-danger">Veuillez sélectionner une classe.</span>
                                <?php endif; ?>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label for="nom_tuteur">Nom et prénom du Tuteur</label>
                            <select class="form-control" name="nom_tuteur" id="nom_tuteur">
                                <?php foreach ($parents as $parent) { ?>
                                    <option value="<?php echo $parent['nom']; ?>"><?php echo $parent['nom'] . ' ' . $parent['prenom']; ?></option>
                                <?php } ?>
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label for="telephone">Téléphone</label>
                            <input class="form-control" type="text" id="telephone" name="telephone" readonly>
                        </div><br>
                        <div class="form-group">
                            <label for="classe">Classe</label><br>
                            <select class="form-control" id="classe" name="classe" required>
                                <option value="" selected disabled>Sélectionnez une classe</option>
                                <option value="6ex">6e</option>
                                <option value="5ex">5e</option>
                                <option value="4ex">4e</option>
                                <option value="3ex">3e</option>
                            </select>
                            <?php if(isset($_POST['submit']) && empty($_POST['classe'])): ?>
                                <span class="text-danger">Veuillez sélectionner une classe.</span>
                            <?php endif; ?>
                        </div><br>
                        <button type="submit" name="submit" class="btn btn-success">
                            <span></span>
                            Enregistrer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</main>
<?php include("footer.php");?>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../javascript/javascript.js"></script>   
<script>
    // Fonction pour peupler le champ "Téléphone" en fonction du parent sélectionné
    function recu_number() {
        var parentSelectionne = document.getElementById("nom_tuteur").value;
        var champTelephone = document.getElementById("telephone");

        // Trouver le parent correspondant dans le tableau "parents"
        var parent = <?php echo json_encode($parents); ?>.find(function (parent) {
            return parent.nom === parentSelectionne;
        });

        // Peupler le champ "Téléphone" avec le numéro de téléphone du parent
        if (parent) {
            champTelephone.value = parent.telephone;
        } else {
            champTelephone.value = "";
        }
    }

    // Ajouter un écouteur d'événements au champ de sélection du parent
    var selectParent = document.getElementById("nom_tuteur");
    selectParent.addEventListener("change", peuplerTelephone);

    // Peupler le champ "Téléphone" lorsque la page se charge
    peuplerTelephone();
</script>
</body>
</html>
