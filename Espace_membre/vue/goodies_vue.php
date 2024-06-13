<html>

<head>
    <title>PoleIT</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="../../css/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/bootstrap/icone/css/all.css">
    <link href="../../css/style.css" rel="stylesheet" />
    <script src="../../css/bootstrap/jquery.js"></script>
    <script src="../../css/bootstrap/dist/js/bootstrap.js"></script>
</head>

<body>
    <?php include("../autre/menu.php"); ?>
    <!-- Annonces -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <?php 
            $produits = get_produits(0, 4);
            $isFirst = true; // Flag to track the first item
            while($produit = $produits->fetch()){
            ?>
            <div class="carousel-item <?php echo $isFirst ? 'active' : ''; ?>">
                <img src="../../images/produits/<?php echo $produit['image']; ?>" class="bd-placeholder-img img_car" width="100%" preserveAspectRatio="xMidYMid slice" focusable="false" />
                <div class="container">
                    <div class="carousel-caption">
                        <h1 style="margin-bottom:40px;"><?php echo $produit['titre']; ?></h1>
                        <p class="col-lg-12" style="font-size:40px; margin-bottom:40px;">
                            <p style="color:white;">Si vous cherchez des articles d'observatoire, de planétarium, ou d'astronomie, vous êtes au bon endroit.<br />Nous vous proposons les meilleures sélections de produits.<br />Recherchez ou consultez notre liste de produits.</p>
                        </p>
                    </div>
                </div>
            </div>
            <?php 
            $isFirst = false; // After the first item, set the flag to false
            } 
            ?>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Conetenu de l'accueil -->
    <section class="container" id="princi">
        <!-- Quelques categories -->
        <article style="margin-bottom:20px;">
            <h2 style="text-align:center; margin-bottom:20px; color:white;">Découvrez nos plus belles catégories</h2>
            <div class="row offset-sm-1">
                <?php 
                $cats = get_cat(0, 3);
                while($cat = $cats->fetch()){
                ?>
                <div class="col-sm-3 rounded img_cat" style="background-image:url('../../images/cat/<?php echo $cat['cat']; ?>.jpg'); margin : 10px; color:#fff ; background-size: 100%;">
                    <div class="row ">
                        <div class="rounded catText float-right col-sm-12">
                            <h3><?php echo $cat['cat']; ?></h3>
                            <p><?php include('../autre/text_cat.php'); ?></p>
                            <a class="btn btn-primary" href="cat_controleur.php?cat=<?php echo $cat['cat']; ?>">Voir</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </article>
        <!-- Dernier arrivages-->
        <article>
            <h3 style="margin-bottom:30px;color:white;">Dernier arrivage : </h3> 
            <div class="row">
                <?php 
                $produits = get_produits(0, 4);
                while($produit = $produits->fetch()){
                ?>
                <div class="col-sm-3" id="produits" style="margin-top:20px;">
                    <p id="img_produit" style="color:white;"><a href="Produit_controleur.php?produit=<?php echo $produit['id']; ?>"><img src="../../images/produits/<?php echo $produit['image']; ?>" width=120 /></a></p>
                    <a href="Produit_controleur.php?produit=<?php echo $produit['id']; ?>">
                        <p id="img_text" style="color:white;"><?php echo $produit['titre']; ?><br></p>
                    </a>
                    <p style="text-align:center; font-wight:bold; color:white;">
                        <strong>
                            <?php if($produit['promo'] == 0){ ?>
                            <?php echo $produit['p_ach']; ?> <sup>EURO</sup>
                            <?php } else { ?>
                            <?php
                                echo '<span style="text-decoration: line-through; color:red;">'.$produit['p_ach'].'<sup>EURO</sup></span> ';
                                $promo = recherche_promo($produit['promo']);
                                $pr = (int) ($produit['p_ach'] - ($produit['p_ach'] * $promo['pr'] / 100));
                                echo $pr.'<sup>EURO</sup>';
                            }
                            ?>
                            <br>
                        </strong>
                    </p>
                    <p style="text-align:center;"><a class="btn btn-warning" href="panier_controleur.php?add=<?php echo $produit['id']; ?>" style="color:white"><i class="fas fa-shopping-cart"></i> Ajouter au panier</a>
                    </p>
                </div>
                <?php } ?>
            </div>
        </article>
        <!-- Meilleures ventes-->
        <article>
            <h3 style="margin-bottom:30px;">Meilleures ventes : </h3>
            <div class="row">
               
            <?php 
                clas();
                $produits = get_clas(0, 4);
                while($produit = $produits->fetch()){
                ?>
                <div class="col-sm-3" id="produits" style="margin-top:20px;">
                    <p id="img_produit" style="color:white;"><a href="Produit_controleur.php?produit=<?php echo $produit['id']; ?>"><img src="../../images/produits/<?php echo $produit['image']; ?>" width=120 /></a></p>
                    <a href="Produit_controleur.php?produit=<?php echo $produit['id']; ?>">
                        <p id="img_text" style="color:white;"><?php echo $produit['titre']; ?><br></p>
                    </a>
                    <p style="text-align:center; font-wight:bold; color:white;">
                        <strong>
                            <?php if($produit['promo'] == 0){ ?>
                            <?php echo $produit['p_ach']; ?> <sup>EURO</sup>
                            <?php } else { ?>
                            <?php
                                echo '<span style="text-decoration: line-through; color:red;">'.$produit['p_ach'].'<sup>EURO</sup></span> ';
                                $promo = recherche_promo($produit['promo']);
                                $pr = (int) ($produit['p_ach'] - ($produit['p_ach'] * $promo['pr'] / 100));
                                echo $pr.'<sup>EURO</sup>';
                            }
                            ?>
                            <br>
                        </strong>
                    </p>
                    <p style="text-align:center;color:white;"><a class="btn btn-warning" href="panier_controleur.php?add=<?php echo $produit['id']; ?>" style="color:white"><i class="fas fa-shopping-cart"></i> Ajouter au panier</a>
                    </p>
                </div>
                <?php } ?>
            </div>
        </article>
    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
</body>

</html>
