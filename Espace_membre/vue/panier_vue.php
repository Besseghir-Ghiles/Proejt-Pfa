<html>

<head>
    <title>Panier | PoleIT</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Panier</li>
                </ol>
            </nav>
        </article>
        <article>
            <h1 style="margin-bottom:20px;">Panier <span class="badge badge-secondary rounded-circle"><?php echo get_nb_pan($_SESSION['id']); ?></span></h1>
            <?php if( isset($_GET['add']) and $ver){ ?>
            <div class="alert alert-danger col-lg-10 offset-lg-1" style="text-align:center;">
                <p id="message">Ce produits est deja dans votre panier</p>
            </div>
            <?php } ?>
            <div class="row col-sm-11 offset-sm-1" id="pan">
                <?php 
                 while($produit=$panier->fetch()){
                ?>
                <div class='row col-sm-12 jumbotron' style="padding:10px 0px 10px 10px; background-color: rgb(233,236,239,0.5);">
                    <div class="col-sm-12">
                        <a style="font-size:20px; text-decoration: none; color:red;" class="float-right" href="panier_controleur.php?supp=<?php echo $produit['id_pan'] ; ?>">&times;</a>
                    </div>
                    <div class="col-lg-2 col-sm-4">
                        <img src="../../images/produits/<?php echo $produit['image']; ?>" width="150" />
                    </div>
                    <div class="col-lg-10 col-sm-8">
                        <h3><a href="Produit_controleur.php?produit=<?php echo $produit['id_l']; ?>"><?php echo $produit['titre']; ?></a></h3>
                        
                        <div class="row">
                            <p class="col-sm-9">
                                <?php if($produit['stock']>0){ ?>
                                <span style="color:#28a745;"><i class="fas fa-check"></i> En stock </span><br />
                                <?php }else{ ?>
                                <span style="color:#dc3545;"><i class="fas fa-times"></i> En Repture </span><br />
                                <?php } ?>
                                
                            </p>
                            <p class="col-sm-3 text-center" style="font-weight:bold;">
                                <?php if($produit['promo']==0){ ?>
                                <span><span class="badge badge-secondary"><?php echo $produit['p_ach']; ?><sup>EURO</sup></span></span>
                                <?php
                                }else{
                                $promo=recherche_promo($produit['promo']);
                                $pr= (int) ($produit['p_ach'] - ($produit['p_ach']*$promo['pr']/100));
                                ?>
                                <span><span style="text-decoration: line-through; color:red;"><?php echo $produit['p_ach']; ?><sup>EURO</sup></span> <span class="badge badge-secondary"><?php echo $pr; ?><sup>DA</sup></span></span>
                                <?php } ?>
                                
                            </p>
                        </div>
                        <div class="col-sm-12">
                            <a class="btn btn-success navbar-btn float-right" style="margin-right : 10px; color : #fff" <?php 
                        if($produit['dispo']=="non" && $produit['stock']==0){ 
                            echo "disabled"; 
                        } else{ 
                            if(empty(verif($produit['id_l'],$_SESSION['id']))){
                                echo 'data-toggle="modal" data-target="#infos'.$produit['id_pan'].'"';
                            }else{
                                echo 'data-toggle="modal" data-target="#alert_comm'.$produit['id_pan'].'"';
                            }
                        } ?>> Commander le produit</a>
                            <?php 
                            if(empty(verif($produit['id_l'],$_SESSION['id']))){
                                include('../autre/commander.php');
                            }else{
                                include('../autre/alert_ProduitComm.php');
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </article>

    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>

</body>

</html>
