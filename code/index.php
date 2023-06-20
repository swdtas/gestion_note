<?php
session_start();
if (isset($_SESSION['erreurLogin']))
    $erreurLogin = $_SESSION['erreurLogin'];
else {
    $erreurLogin = "";
}
session_destroy();
include('pages/login.php');

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
    <header>
    <nav class="navbar navbar-light bg-light">
    <div class="container-fluid ">
      <div >
      <a class="navbar-brand" href="#">
        <img src="images/logo1.png" alt="" width="100" height="100" class="d-inline-block align-text-top">
      </a>
    </div>
  </nav> 
    </header>
    <main>
    <section class="section_index p-1">
      <div class="container-fluid row">
      <div class="col-lg-6">
       <img src="images/image2.png" alt=""  class="img-fluid">
      </div>
      <div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
        <h1 class="ml-5"> Veuillez vous connecter à votre compte</h1>
        </div>
        <div class="panel-body color2 p-5">
            <form method="post" action="pages/seconnecter.php" >
            <?php if (!empty($erreurLogin)) { ?>
                    <div class="alert alert-danger">
                        <?php echo $erreurLogin ?>
                    </div>
                <?php } ?>
                <div class="form-group">
                <label for="username">Nom  ou email:</label> <br> 
                    <input type="text" name="username" placeholder="email"
                           class="form-control" autocomplete="off" required/>
                </div> <br>

                <div class="form-group">
                    <label for="pwd">Mot de passe :</label>
                    <input type="password" name="pwd"
                           placeholder="Mot de passe" class="form-control" required/>
                </div> <br>
                <p class="text-right text-white">
                    <a href="InitialiserPwd.php">Mot de passe Oublié</a>
                </p>
                <button type="submit" name="connecter" class="btn btn-success">
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