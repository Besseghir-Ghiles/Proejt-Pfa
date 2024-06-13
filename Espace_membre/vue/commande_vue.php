<html>

<head>
    <title><?php echo $commande['titre']; ?> | PoleIT</title>
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
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $commande['titre']; ?></li>
                </ol>
            </nav>
        </article>
        <article class="row">
            <div class="col-sm-4 offset-sm-1">
                <p style="text-align:center; margin:20px;">
                    <img id="im_com" src="../../images/produits/<?php echo $commande['image']; ?>" width=200 />
                    <p>
            </div>
            <div class="col-sm-6" style="margin-top:40px;">
                <h1><?php echo $commande['titre']; ?></h1>
                <p><i class="fas fa-angle-double-right"></i> <span class="lab">Type de la commande : </span><?php echo $commande['etat']; ?></p>
                <?php if($commande['etat']=="Acheter"){ ?>
                <p><i class="fas fa-angle-double-right"></i> <span class="lab">Nombre de produits : </span><?php echo $commande['nb_l']; ?></p>
                <?php }else{ ?>
                <p><i class="fas fa-angle-double-right"></i> <span class="lab">Nombre de jours : </span><?php echo $commande['nb_j']; ?></p>
                <?php } ?>
                <p><i class="fas fa-angle-double-right"></i> <span class="lab">Prix : </span><?php echo $commande['prix']; ?><sup>EURO</sup></p>
                <?php if($commande['livraison']=="non livré"){ ?>
                <p><i class="fas fa-angle-double-right"></i> <span class="lab">Date : </span><?php echo $commande['date']; ?></p>
                <?php }?>

               <p><i class="fas fa-angle-double-right"></i> <span class="lab">Livraison : </span><?php echo $commande['livraison']; 
                    ?>
                </p>
                <!--
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                </div>
                -->
            </div>
            <div class="offset-sm-5">
                <?php 
                    $date = date_diff(date_create(date('d-m-Y')),date_create($commande['date']));
                    $date =(int)($date->format('%a'));
                    if($date<3 and $commande['livraison']=="non livré"){ 
                ?>
                <p style="text-align:center;">
                    <a class="btn btn-danger" data-toggle="modal" data-target="#alert_anul<?php echo $commande['id_comm']; ?>">Annuler la commande</a>
                    <?php include('../autre/alert_anul.php'); ?>
                </p>
                <?php } ?>
            </div>
        </article>
    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
</body>

</html>
