<?php
    include('connexion_base.php');
    $sql = "SELECT ,mot_pass FROM user";
    $result = $connect->query($sql); 
    if ($result->rowCount()== 0) {
        $onglet_inscription = '<a href="#fleche" class=inscript><button type="button" name="inscr" class="btn btn-outline-warning">Inscription</button></a>';
        // echo" veuillez vous faire enregistrer avec un mot de pass et un nom ";
        echo" $onglet_inscription";
        if (isset($_POST['connecter'])) {
            $username= $_POST['username'];
            $mot_pass_saisi = $_POST['password']; 
            $query = "INSERT INTO user (nom_utilisateur,mot_pass)VALUES (:username, :mot_pass_saisi)";
            $query_run = $connect->prepare($query);
            $query_run->bindParam(':username', $username); 
             $query_run->bindParam(':mot_pass_saisi', $mot_pass_saisi);
             
            if ($query_run->execute()) {
               
                header('Location:index.php');
                echo'<h6 class=" incorrect text-danger"> Vos données ont été bien enregistrées!</h6>';
            } else {
                $msg = "Erreur d'enregistrement";
            }
      }
   }
   if ($result->rowCount() == 1) { 
    // echo" veuillez vous connecter avec vos références d'utilisateur";    
            if(isset($_POST['connecter'])){
                if(!empty($_POST['username']) AND !empty($_POST['password'])){
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $username_defaut=$row["nom_utilisateur"];
                    $mot_de_passe_defaut=$row["mot_pass"];
                    $username_saisi=htmlspecialchars($_POST['username']);
                    $mot_de_passe_saisi=htmlspecialchars($_POST['password']);
                    if($mot_de_passe_defaut==$mot_de_passe_saisi AND $username_defaut==$username_saisi){
                    $_SESSION['password']=$mot_de_passe_saisi;
                        header('Location:enregistrement.php');
                    }else{
                    echo'<h6 class=" incorrect text-danger"> votre mot de passe est incorrect!</h6>';
                        
                    }jijij

                }
        }
    }
?>