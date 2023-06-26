<?php include("connexion.php");
$requette1 = "SELECT email, mot_pass FROM administrateur WHERE fonction = 'admin'";
$requette2 = "SELECT email, mot_pass FROM administrateur WHERE fonction = 'user'";
$requette3 = "SELECT email, mot_pass FROM parent";
$result1 = $connect->query($requette1);
$result2 = $connect->query($requette2);
$result3 = $connect->query($requette3);

if (isset($_POST['connecter'])) {
    if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
        $username_saisi = htmlspecialchars($_POST['username']);
        $mot_de_passe_saisi = htmlspecialchars($_POST['pwd']);

        // Vérification pour les administrateurs
        while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
            $username_defaut = $row["email"];
            $mot_de_passe_defaut = $row["mot_pass"];

            if ($mot_de_passe_defaut == $mot_de_passe_saisi && $username_defaut == $username_saisi) {
                $_SESSION['password'] = $mot_de_passe_saisi;
                header('Location: compte_secretaire.php');
                exit();
            }
        }

        // Vérification pour les utilisateurs
        while ($row = $result2->fetch(PDO::FETCH_ASSOC)) {
            $username_defaut = $row["email"];
            $mot_de_passe_defaut = $row["mot_pass"];

            if ($mot_de_passe_defaut == $mot_de_passe_saisi && $username_defaut == $username_saisi) {
                $_SESSION['password'] = $mot_de_passe_saisi;
                header('Location: page_eleve.php');
                exit();
            }
        }

        // Vérification pour les parents
        while ($row = $result3->fetch(PDO::FETCH_ASSOC)) {
            $username_defaut = $row["email"];
            $mot_de_passe_defaut = $row["mot_pass"];
        
            if ($mot_de_passe_defaut == $mot_de_passe_saisi && $username_defaut == $username_saisi) {
                $mot_pass= $mot_de_passe_saisi;
                $email = $username_saisi;
                $query = "SELECT e.id_eleve, e.nom, e.prenom, e.date_naissance, e.lieu_naissance, e.genre, e.nom_tuteur, e.telephone, e.classe,e.moyenne
                    FROM parent p
                    INNER JOIN eleve e ON e.telephone = p.telephone
                    WHERE p.email = :email
                    AND p.mot_pass = :mot_pass";
        
                $query_run = $connect->prepare($query);
                $query_run->bindParam(':mot_pass', $mot_pass);
                $query_run->bindParam(':email', $email);
                $query_run->execute();
                $eleves = $query_run->fetchAll(PDO::FETCH_ASSOC);
        
                // Sauvegarde de l'id du parent connecté dans une variable de session
               
        
                include("affichage_parent.php");
                exit();
            }
        }
        

        $_SESSION['erreurLogin'] = "<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
        header('Location: ../index.php');
    }
}
?>