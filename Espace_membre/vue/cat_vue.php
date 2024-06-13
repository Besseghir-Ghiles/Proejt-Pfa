<html>

<head>
    <title><?php echo $_GET['cat']; ?> | PoleIT</title>
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
                    <li class="breadcrumb-item"><a href="listeProduit_controleur.php">Liste des produits</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $_GET['cat']; ?></li>
                </ol>
            </nav>
        </article>
        <article>
            <h1 style="color:white;"><?php echo $_GET['cat']; ?> :</h1>
            <div class="row">
                <?php 
                    while($produit=$produits->fetch()){
                ?>
                <div class="col-sm-3" id="produits" style="margin-top:20px;">
                    <p id="img_Produit"><a href="Produit_controleur.php?produit=<?php echo $produit['id']; ?>"><img src="../../images/produits/<?php echo $produit['image']; ?>" width=120 /></a></p>
                    <a href="Produit_controleur.php?produit=<?php echo $produit['id']; ?>">
                        <p id="img_text" style="color:white;"><?php echo $produit['titre']; ?><br></p>
                    </a>
                    <p style="text-align:center; font-wight:bold;color:white;">
                        <strong>
                            <?php if($produit['promo']==0){ ?>
                            <?php echo $produit['p_ach']; ?> <sup>EURO</sup>
                            <?php }else{ ?>
                            <?php
                                echo '<span style="text-decoration: line-through; color:red;">'.$produit['p_ach'].'<sup>EURO</sup></span> ';
                                $promo=recherche_promo($produit['promo']);
                                $pr= (int) ($produit['p_ach'] - $produit(['p_ach']*$promo['pr']/100));
                                echo $pr.'<sup>EURO</sup>';
                            }
                            ?>
                            <br>
                        </strong>
                    </p>
                    <p style="text-align:center;color:white;"><a class="btn btn-warning" href="panier_controleur.php?add=<?php echo $produit['id']; ?>" style="color:white"><i class="fas fa-shopping-cart"></i> Ajouter au panier</a>
                        <p>
                </div>
                <?php } ?>
                <?php if($nb>=1){ ?>
                <nav aria-label="Page navigiation example" class="col-xl-7 offset-xl-5" style="margin-top:50px;">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="cat_controleur.php?page=<?php echo ($nP-1).'&cat='.$_GET['cat']; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <?php for($i=0 ; $i<=$nb ; $i++ ){ ?>
                        <li class="page-item"><a class="page-link" href="cat_controleur.php?page=<?php echo ($i).'&cat='.$_GET['cat']; ?>"><?php echo $i+1; ?></a></li>
                        <?php  } ?>
                        <li class="page-item">
                            <a class="page-link" href="cat_controleur.php?page=<?php echo ($nP+1).'&cat='.$_GET['cat']; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <?php } ?>
            </div>



        </article>

    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
</body>

</html>
