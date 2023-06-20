<?php
include("connexion.php");
$requette1="SELECT email,mot_pass FROM administrateur  where fonction='admin' ";
$result = $connect->query($requette1);  
if(isset($_POST['connecter'])){
    if(!empty($_POST['username']) AND !empty($_POST['pwd'])){
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $username_defaut=$row["email"];
        $mot_de_passe_defaut=$row["mot_pass"];
        $username_saisi=htmlspecialchars($_POST['username']);
        $mot_de_passe_saisi=htmlspecialchars($_POST['pwd']);
        if($mot_de_passe_defaut==$mot_de_passe_saisi AND $username_defaut==$username_saisi){
        $_SESSION['password']=$mot_de_passe_saisi;
            header('Location:compte_secretaire.php');
        }else{
            $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
            header('location:../index.php');
        }

    }
}
?>