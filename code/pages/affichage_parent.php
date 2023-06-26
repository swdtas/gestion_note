<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>Inscription</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <div>
                    <a class="navbar-brand" href="#">
                        <img src="../images/logo2.png" alt="" width="100" height="70" class="d-inline-block align-text-top">
                    </a>
                </div>
                <div>
                    <a href="\appli_gestions_eleves\code\pages\deconnexion.php">
                        <button type="button" class="btn btn-success">Déconnexion</button>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <section class="pt-5">
            <div class="container-fluid row">
                <div class="col-lg-6 pt-3">
                    <img src="../images/image_15.png" alt="" class="img-fluid pt-5">
                </div>
                <div class="col-lg-6 pt-5">
                    <div>
                        <h2>Liste de vos enfants</h2>
                    </div>
                    <section class="pt-5">
                        <table class="table">
                            <thead class="custom-thead color1">
                                <tr class="text-white">
                                    <th>Nom</th>
                                    <th>Prénom(s)</th>
                                    <th>Classe</th>
                                    <th>Moyenne</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($eleves)) {
                                    foreach ($eleves as $row) {
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($row["nom"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["prenom"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["classe"]) . "</td>";
                                        echo "<td>" . htmlspecialchars($row["moyenne"]) . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Aucune donnée trouvée.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </section>
                </div>
            </div>
        </section>
    </main>
    <?php include("footer.php"); ?>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
