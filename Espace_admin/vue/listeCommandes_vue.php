<html>

<head>
    <title>Tableau de bord</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/x-icon" href="../../images/icone.ico" />
    <link rel="stylesheet" href="../../css/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/bootstrap/icone/css/all.css">
    <link href="../../css/style_admin.css" rel="stylesheet" />
    <script src="../../css/bootstrap/jquery.js"></script>
    <script src="../../css/bootstrap/dist/js/bootstrap.js"></script>
</head>

<body>
    <?php include("../autre/menu.php"); ?>

    <section class="container-fluid col-lg-10 offset-lg-2 col-md-9 offset-md-3" id='princi'>
        <div class="row">
            <h1 style="margin-bottom:20px;" class="col-sm-9"><i class="fas fa-shopping-cart"></i> Commandes</h1>
            <form class="form-inline my-2 my-lg-0 col-sm-3" style="padding-top:10px;" method="get" action="listeCommandes_controleur.php?">
                <div class="input-group mb-2 mr-sm-2">
                    <input type="search" class="form-control" placeholder="Recherche" id="recherche" name="rech">
                    <div class="input-group-prepend">
                        <button type="submit" class="input-group-text" id="logosearch"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <article>
            <div class="row">
                <h3 class=" col-sm-5"><i class="fas fa-list-ul"></i> Liste des commandes :</h3>
                <div class="col-sm-3 offset-sm-4" style="margin-top:10px;">
                    <select id="select" class="form-control" onChange="location = this.options[this.selectedIndex].value;" style="margin-top : -12px;">
                        <option id=1 value="listeCommandes_controleur.php?">Toutes les commandes.</option>
                        <option id=2 value="listeCommandes_controleur.php?c=2">Non livré.</option>
                        
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <form method="post" action="listeCommandes_controleur.php">
                    <table class="table table-striped table-condensed ">
                        <tr>
                            <th><input type="checkbox" id="all" onclick="rep();" /></th>
                            <th>produit commander</th>
                            <th>effectué par</th>
                            <th>Adresse</th>
                            <th>Prix</th>
                            <th>Date</th>
                            <th>Livraison</th>
                        </tr>
                        <?php while($produit=$comms->fetch()){?>
                        <tr>
                            <td><input type="checkbox" name="num[]" value="<?php echo $produit['idC']; ?>" /></td>
                            <td style="width:25%;">
                                <?php echo $produit['titre']; ?><br />
                                <span style="font-size:13px; ">
                                    <a href="afficherCommande_controleur?comm=<?php echo $produit['idC']; ?>">Détail</a>
                                    <a href="#" data-toggle="modal" data-target="#alert_anul<?php echo $produit['idC']; ?>" style="color:#dc3545;">Supprimer</a>
                                    <?php include('../autre/alert_suppComm.php'); ?>
                                </span>
                            </td>
                            <td><?php echo $produit['nom'].' '.$produit['prenom']; ?></td>
                            <td><?php echo $produit['adress']; ?></td>
                            <td><?php echo $produit['prix']; ?></td>
                            <td><?php echo $produit['date']; ?></td>
                            <td><?php echo $produit['livraison']; ?><br />
                                <span style="font-size:13px; ">
                                    <a href="listeCommandes_controleur?oui=<?php echo $produit['idC']; if(isset($_GET['c'])){ echo '&c='.$_GET['c'];} ?>" style="color:#28a745;"><i class="fas fa-check"></i></a>
                                    <a href="listeCommandes_controleur?non=<?php echo $produit['idC']; if(isset($_GET['c'])){ echo '&c='.$_GET['c'];} ?>" style="color:#dc3545;"><i class="fas fa-times"></i></a>
                                </span>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                    <input type="submit" value="supprimer toute la selection" name="suppSlec" class="btn btn-danger float-right" />
                </form>
            </div>
        </article>
    </section>
    <script>
        <?php if(isset($_GET['c'])){ ?>
        $('#<?php echo $_GET['c']; ?>').attr("selected", "");
        <?php } ?>

        function rep() {
            var cases = $('input');
            for (var i = 1; i < cases.length; i++) {
                if (cases[i].type == 'checkbox') {
                    cases[i].checked = $('#all').prop('checked');
                }
            }
        }

    </script>
</body>

</html>
