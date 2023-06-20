<?php
include("connexion.php");
$requette1= "SELECT email,mot_pass,fonction From administrateur where fonction='admin'"; 
$result = $connect->query($requette1);
if($result->rowCount()== 0){
    header('Location:pages/administrateur.php');  
}

?>