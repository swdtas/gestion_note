<?php
session_start();
if (isset($_SESSION['erreurLogin']))
    $erreurLogin = $_SESSION['erreurLogin'];
else {
    $erreurLogin = "";
}
session_destroy();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title>accueil</title>
</head>
<body>
    <div class="loader">

    </div>
    <header>
      <nav class="navbar navbar-light ">
            <div class="container-fluid ">
              <div >
              <a class="navbar-brand" href="#">
                <img src="images/logo1.png" alt="logo"  class="w-100 h-100 img-fluid">
              </a>
            </div>
             <div>
                <p class=""><strong>"Une nouvelle ère pour gérer les notes des élèves : Bienvenue dans 
                    notre plateforme, où l'efficacité et la simplicité se rencontrent !"</strong></p>
            </div>   
            </div>
          </nav>  
    </header>
    <main>
    <section class="section_index">
      <div class="container-fluid row">
      <div class="col-lg-6">
       <img src="images/undraw_Educator_re_ju47.png" alt=""  class="img-fluid">
      </div>
      <div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
        <h1 class="ml-5"> Veuillez vous connecter à votre compte</h1>
        </div>
        <div class="panel-body bg-primary p-5">
            <form method="post" action="seConnecter.php" >

                <?php if (!empty($erreurLogin)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $erreurLogin ?>
                    </div>
                <?php } ?>

                <div class="form-group">
                <label for="username">Nom  ou email:</label> <br> 
                    <input type="text" name="username" placeholder="email"
                           class="form-control" autocomplete="off"/>
                </div> <br>

                <div class="form-group">
                    <label for="pwd">Mot de passe :</label>
                    <input type="password" name="pwd"
                           placeholder="Mot de passe" class="form-control"/>
                </div> <br>
                <p class="text-right">
                    <a href="InitialiserPwd.php">Mot de passe Oublié</a>
                </p>
                <button type="submit" class="btn btn-success">
                    <span></span>
                    Se connecter
                </button>
                
            </form>
        </div>
    </div>
</div>
 </section>
    </main>
    <?php include("pages/footer.php");?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="/javascript/javascript.js"></script>   
</body>
</html>