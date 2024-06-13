<html>

<head>
    <title><?php echo $produit['titre']; ?> | PoleIT</title>
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
    <?php include('../autre/connexion.php'); ?>
    <?php include("../autre/menu.php"); ?>
    <!-- Conetenu de la page -->
    <section class="container" id="princi">
        <article>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="accueil_controleur.php">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="listeProduit_controleur.php">Liste des produits</a></li>
                    <li class="breadcrumb-item active" aria-current="page" ><?php echo $produit['titre']; ?></li>
                </ol>
            </nav>
        </article>
        <article class="row">
            <div class="col-sm-4 offset-sm-1">
                <p style="text-align:center; margin:20px;color:white;">
                    <img id="im_com" src="../../images/produits/<?php echo $produit['image']; ?>" width=200 />
                    <p>
            </div>
            <div class="col-sm-6" style="margin-top:40px;">
                <h1 style="color:white;"><?php echo $produit['titre']; ?></h1>
                
                <?php if($produit['promo']==0){ ?>
                <p><i class="fas fa-angle-double-right" style="color:white;"></i> <span class="lab">Prix achat : </span><span class="badge badge-secondary"><?php echo $produit['p_ach']; ?><sup>EURO</sup></span></p>
                <?php
                    }else{
                        $promo=recherche_promo($produit['promo']);
                        $pr= (int) ($produit['p_ach'] - ($produit['p_ach']*$promo['pr']/100));
                ?>
                <p><i class="fas fa-angle-double-right"style="color:white;"></i> <span class="lab">Prix achat : </span><span style="text-decoration: line-through; color:red;"><?php echo $produit['p_ach']; ?><sup>EURO</sup></span> <span class="badge badge-secondary"><?php echo $pr; ?><sup>EURO</sup></span></p>
                <?php } ?>
                
                
                <p><i class="fas fa-angle-double-right"style="color:white;"></i> <span class="lab">Stock : </span><span class="badge badge-secondary"><?php echo $produit['stock']; ?></span></p>
            </div>
            <div class="col-sm-8 offset-sm-2">
                <p style="font-weight: 900;">Discription :</p>
                <p style="text-align:center;color:white;"><?php echo $produit['disc']; ?></p>
            </div>
            <?php if(isset($_SESSION['id']) and isset($_SESSION['mail']) and isset($_SESSION['pass']) and !empty(verif2($_SESSION['id'],$_SESSION['mail'],$_SESSION['pass']))){ ?>
            <div class="col-sm-8 offset-sm-2 ">
                <a class="btn btn-warning navbar-btn pull-left " style="margin-right : 10px; color : #fff " href='panier_controleur.php?add=<?php echo $_GET['produit']; ?>'><i class="fas fa-shopping-cart"></i> Ajouter panier</a>

                <a class="btn btn-success navbar-btn float-right " style="margin-right : 10px; color : #fff" <?php 
                    if($produit['dispo']=="non" && $produit['stock']==0){ 
                        echo "disabled"; 
                    } else{ 
                        echo 'data-toggle="modal"';
                        if(empty($lv)){
                            echo 'data-target="#infos"';
                        }else{
                            echo 'data-target="#alert_comm"';
                        }
                    } 
                ?>>Commander le produit</a>
                <?php 
                    if(empty($lv)){
                        include('../autre/commander.php');
                    }else{
                        include('../autre/alert_ProduitComm.php');
                    }
                ?>
            </div>
            <?php }else{ ?>
            <div class="col-sm-8 offset-sm-2 ">
                <a class="btn btn-warning navbar-btn" style="margin-right : 10px; color : #fff" data-toggle="modal" data-target="#con"><i class="fas fa-shopping-cart"></i> Ajouter panier</a>

                <a class="btn btn-success navbar-btn float-right " style="margin-right : 10px; color : #fff" data-toggle="modal" data-target="#con">Commander le produit</a>
            </div>
            <?php } ?>
        </article>
    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>

</body>

</html>
