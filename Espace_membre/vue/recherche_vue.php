<html>

<head>
    <title>Recherche | PoleIT</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/x-icon" href="../../images/icone.ico" />
    <link rel="stylesheet" href="../../css/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/bootstrap/icone/css/all.css">
    <link href="../../css/style.css" rel="stylesheet" />
    <script src="../../css/bootstrap/jquery.js"></script>
    <script src="../../css/bootstrap/dist/js/bootstrap.js"></script>
</head>

<body>
    <?php include("../autre/menu.php"); ?>
    <!-- Conetenu de la page -->
    <section class="container" id="princi">
        <article>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="accueil_controleur.php">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Recherche</li>
                </ol>
            </nav>
            <article>
                <h1 style="text-align:center">Resultat pour votre recherche " <?php echo $terme; ?> "</h1>
                <div class="row">
                    <form class="form-inline col-sm-12" style="padding-top:10px;" method="get" action="recherche_controleur.php">
                        <div class="input-group col-sm-8 offset-sm-2">
                            <input type="search" class="form-control col-sm-12" placeholder="Recherche" name="rech" style="background-color:#fff;">
                            <div class="input-group-prepend">
                                <button type="submit" class="input-group-text rounded-right" style="background-color:#fff;"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <?php 
                    while($produit=$produits->fetch()){
                    ?>
                    <div class="col-sm-3" id="produits" style="margin-top:20px;">
                        <p id="img_produit"><a href="Produit_controleur.php?produit=<?php echo $produit['id']; ?>"><img src="../../images/produits/<?php echo $produit['image']; ?>" width=120 /></a></p>
                        <a href="Produit_controleur.php?produit=<?php echo $produit['id']; ?>">
                            <p id="img_text"><?php echo $produit['titre']; ?><br></p>
                        </a>
                        <p style="text-align:center; font-wight:bold;">
                            <strong>
                                <?php if($produit['promo']==0){ ?>
                                <?php echo $produit['p_ach']; ?> <sup>EURO</sup>
                                <?php }else{ ?>
                                <?php
                                echo '<span style="text-decoration: line-through; color:red;">'.$produit['p_ach'].'<sup>EURO</sup></span> ';
                                $promo=recherche_promo($produit['promo']);
                                $pr= (int) ($produit['p_ach'] - ($produit['p_ach']*$promo['pr']/100));
                                echo $pr.'<sup>EURO</sup>';
                            }
                            ?>
                                <br>
                            </strong>
                        </p>
                        <p style="text-align:center;"><a class="btn btn-warning" href="panier_controleur.php?add=<?php echo $produit['id']; ?>" style="color:white"><i class="fas fa-shopping-cart"></i> Ajouter au panier</a>
                            <p>
                    </div>
                    <?php } ?>
                </div>

            </article>
        </article>
    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
</body>

</html>
