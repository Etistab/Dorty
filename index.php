<?php $title = 'Dorty' ?>
<!DOCTYPE html>
<html lang="fr">
    <head>

        <title><?= $title ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="style.css" rel="stylesheet">

    </head>
    <body onload="displayTV()">

    <nav class="navbar navbar-inverse">
        <div class="container-fluid" style="margin-left: 20%;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?= $title; ?></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#addTV">Ajouter une TV</a></li>
                    <li><a href="#tvs">Nos TV</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid text-center">
        <div class="row content" id="addTV">
            <div class="col-sm-2 sidenav"></div>
            <div class="col-sm-8 text-center">
                <h1>Ajouter une TV</h1>
                <form method="post">
                    <div class="form-group">
                        <label for="modele">Modele:</label>
                        <input type="text" name="modele" id="modele">
                    </div>
                    <div class="form-group">
                        <label for="marque">Marque:</label>
                        <input type="text" name="marque" id="marque">
                    </div>
                    <div class="form-group">
                        <label for="size">Taille de l'écran:</label>
                        <input type="number" name="size" id="size"> pouces
                    </div>
                    <div class="form-group">
                        <label for="res">Résolution:</label>
                        <input type="number" name="res" id="res">
                    </div>
                    <div class="form-group">
                        <label for="price">Prix:</label>
                        <input type="number" name="price" id="price">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantité:</label>
                        <input type="number" name="quantity" id="quantity">
                    </div>
                    <input type="button" class="btn btn-success" value="Envoyer" onclick="verifyFields()">
                </form>
                <hr>
            </div>
            <div class="col-sm-2 sidenav"></div>
        </div>
        <div class="row" id="tvs">
            <div class="col sm-8 text-center">
                <h1>Nos meilleures ventes de TV</h1>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr style="text-align: center">
                            <th>#</th>
                            <th>MODELE</th>
                            <th>MARQUE</th>
                            <th>TAILLE DE L'ECRAN</th>
                            <th>RESOLUTION</th>
                            <th>PRIX</th>
                            <th>QUANTITE</th>
                            <th>NB DE VENTES</th>
                            <th>VENDRE</th>
                            <th>SUPPRIMER</th>
                        </tr>
                        </thead>
                        <tbody id="tvList">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <footer class="text-center">
        <h6>Nos réseaux sociaux:</h6>
        <a href="#"><img class="img-rounded" width="45px" style="margin: 1%" src="img/facebook.png"></a>
        <a href="#"><img class="img-rounded" width="45px" style="margin: 1%" src="img/twitter.jpg"></a>
        <a href="#"><img class="img-rounded" width="45px" style="margin: 1%" src="img/google.png"></a>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="script.js"></script>

    </body>
</html>
