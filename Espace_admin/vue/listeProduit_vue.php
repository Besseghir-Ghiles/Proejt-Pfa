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
            <h1 style="margin-bottom:20px;" class="col-sm-9"><i class="fas fa-book"></i> produits <a class="btn btn-outline-primary" href="ajouterProduit_controleur.php">Ajouter</a></h1>
            <form class="form-inline my-2 my-lg-0 col-sm-3" style="padding-top:10px;" method="get" action="listeProduit_controleur.php?">
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
                <h3 class=" col-sm-5"><i class="fas fa-list-ul"></i> Liste des produits :</h3>
                <div class="col-sm-3 offset-sm-4" style="margin-top:10px;">
                    <select id="select" class="form-control" onChange="location = this.options[this.selectedIndex].value;" style="margin-top : -12px;">
                        <option id=1 value="listeProduit_controleur.php?">Tout les produits.</option>
                        <option id=2 value="listeProduit_controleur.php?c=2">En repture de stock.</option>
                        <option id=3 value="listeProduit_controleur.php?c=3">Non disponible.</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <form method="post" action="listeProduit_controleur.php">
                    <table class="table table-striped table-condensed ">
                        <tr>
                            <th><input type="checkbox" id="all" onclick="rep();" /></th>
                            <th>Titre</th>
                            <th>Catégorie</th>
                            <th>Dispo</th>
                            <th>Stock</th>
                        </tr>
                        <?php while($produit=$produits->fetch()){?>
                        <tr>
                            <td><input type="checkbox" name="num[]" value="<?php echo $produit['id']; ?>" /></td>
                            <td style="width:25%;">
                                <?php echo $produit['titre']; ?><br />
                                <span style="font-size:13px; ">
                                    <a href="modifierProduit_controleur?produit=<?php echo $produit['id']; ?>">Modifier</a>
                                    <a href="#" data-toggle="modal" data-target="#alert_anul<?php echo $produit['id']; ?>" style="color:#dc3545;">Supprimer</a>
                                    <?php include('../autre/supp_alert.php'); ?>
                                    <a href="afficherProduit_controleur?produit=<?php echo $produit['id']; ?>">Afficher</a>
                                </span>
                            </td>
                            
                            <td><?php echo $produit['cat']; ?></td>
                            <td><?php echo $produit['dispo']; ?><br />
                                <span style="font-size:13px; ">
                                    <a href="listeProduit_controleur?oui=<?php echo $produit['id']; if(isset($_GET['c'])){ echo '&c='.$_GET['c'];} ?>" style="color:#28a745;"><i class="fas fa-check"></i></a>
                                    <a href="listeProduit_controleur?non=<?php echo $produit['id']; if(isset($_GET['c'])){ echo '&c='.$_GET['c'];} ?>" style="color:#dc3545;"><i class="fas fa-times"></i></a>
                                </span>
                            </td>
                            <td><?php echo $produit['stock']; ?><br />
                                <span>
                                    <span style="font-size:13px; ">
                                        <a href="listeProduit_controleur?plus=<?php echo $produit['id']; if(isset($_GET['c'])){ echo '&c='.$_GET['c'];}  ?>" style="color:#28a745;"><i class="fas fa-plus"></i></a>
                                        <a href="listeProduit_controleur?minus=<?php echo $produit['id']; if(isset($_GET['c'])){ echo '&c='.$_GET['c'];} ?>" style="color:#dc3545;"><i class="fas fa-minus"></i></a>
                                    </span>
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
