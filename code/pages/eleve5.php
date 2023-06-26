<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../assets/css/datatables.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Affichage_note</title>
</head>

<body>
    <main>
  <div class="d-flex " id="wrapper">
        <!-- partie1 -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4  fs-4 fw-bold text-uppercase border-bottom">
                    <img src="../images/logo2.png" alt="" width="100"height="70" class="d-inline-block align-text-top"></div>
                    <div class="list-group list-group-flush my-3">
                    <a href="\appli_gestions_eleves\code\pages\donne_eleve.php" class="list-group-item list-group-item-action   primary-text active">
                        <button class="btn   btn-success  border-primary  fs-5 text fw-bold" type="submit">Classe 6e</button> 
                    </a><br>
                    <a href="#" class="list-group-item list-group-item-action bg-transparent primary-text ">
                        <button class="btn   btn-success   border-primary   fs-5 text fw-bold" type="submit">Classe 5e</button> 
                    </a><br>
                    <a href="\appli_gestions_eleves\code\pages\eleve4.php" class="list-group-item list-group-item-action bg-transparent primary-text ">
                        <button class="btn  btn-success  border-primary fs-5 text fw-bold" type="submit">Classe 4e</button> 
                    </a><br>
                    <a href="\appli_gestions_eleves\code\pages\eleve3.php" class="list-group-item list-group-item-action bg-transparent primary-text">
                        <button class="btn  btn-success  border-dark   fs-5 text fw-bold" type="submit">Classe 3e</button> 
                    </a><br>
            </div>
        </div>
        <!-- /#sfin partie1 -->

        <!-- onglets -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light color1 py-4 px-4">
                <div class="d-flex  align-items-center ">
                    <i class="fas fa-align-left light-text fs-4 me-3 text-white" id="menu-toggle"></i>
                     <h2 class="fs-2 m-0 text-white">Gestionnaire de notes de la classe de 5e</h2>
                </div>
                <div  class="part">
                <a href="\appli_gestions_eleves\code\pages\deconnexion.php"><button type="button" name class="btn part btn-success">Déconnexion</button></a>
                </div>
            </nav>
             <!-- fin onglets -->
              <!-- date table -->
              <div class="container pt-5">
        <div class="row">
            <div class="col-12">
                <div class="data_table">
                    <table id="example" class="table pt-5 table-striped table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>Nom</th>
                                <th>Prénom(s)</th>
                                <th>Date de naissance</th>
                                <th>Lieu de naissance</th>
                                <th>Genre</th>
                                
                                
                            </tr>
                        </thead>
                        <?php
                         
                                require'connexion.php'; 
                                // Récupération des données de l'eleve
                                $requete = "SELECT id_eleve,nom,prenom,date_naissance,lieu_naissance,genre FROM eleve where classe='5ex'";
                                $data=$connect->query($requete);
                                if($data->rowcount()>0){
                                    while($row=$data->fetch(PDO::FETCH_ASSOC)){
                                        echo "<tr>
                                        <td>" . $row['nom'] . "</td>
                                        <td>" . $row['prenom'] . "</td>
                                       <td>" . $row['date_naissance'] . "</td>
                                        <td>" . $row['lieu_naissance'] . "</td>
                                        <td>" . $row['genre'] . "</td>
                                        </tr>";
                                        
                                    }
                                }else{
                                    echo"aucune donnée dans la base";
                                }   
                                ?>
    
                    </table>
                </div>
            </div>
        </div>
    </div>
             <!-- fin date table -->
        </div>
 </div>
 </main>
 
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
     <?php include("footer.php");?>

    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
    <script src="../assets/js/pdfmake.min.js"></script>
    <script src="../assets/js/vfs_fonts.js"></script>
    <script src="../assets/js/custom.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../javascript/javascript.js"></script> 
</body>

</html>