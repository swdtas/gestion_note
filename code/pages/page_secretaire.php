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
    <a href="#d"><button type="button" name class="btn  btn-success">Création de compte sécretaire</button></a>
    </div>
    <div>
    <a href="\appli_gestions_eleves\code\pages\compte_parent.php"><button type="button" name class="btn btn-success">Création de compte parent</button></a>
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
       <img src="../images/image3.png" alt=""  class="img-fluid">
      </div>
      <div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
    <div class="panel panel-primary">
        <div class="panel-heading">
        <h1 class="ml-5"> Veuillez créer un compte sécretaire</h1>
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
                    <label for="pwd">Mot de passe :</label><br>
                    <input type="password" name="pwd"
                           placeholder="Mot de passe" class="form-control"  required/>
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