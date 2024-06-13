<html>

<head>
    <title>Liste des produits</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Liste des commandes</li>
                </ol>
            </nav>
        </article>
        <!-- Liste des commandes -->
        <article>
            <h1 style="color:white;">Dernière commandes :</h1>
            <div class="row">
                <?php
                $commandes=get_commandes($_SESSION['id']);
                while($commande=$commandes->fetch()){
                ?>
                <div class="col-sm-3" id="produits" style="margin-top:20px;">
                    <p id="img_produit" style="color:white;"><a href="commande_controleur.php?comm=<?php echo $commande['id_comm']; ?>"><img src="../../images/produits/<?php echo $commande['image']; ?>" width=120 /></a></p>
                    <a href="commande_controleur.php?comm=<?php echo $commande['id_comm']; ?>">
                        <p id="img_text" style="color:white;"><?php echo $commande['titre']; ?></p>
                    </a>
                    <p style="text-align:center; font-wight:bold;">
                        <strong>
                            <?php
                        if($commande['etat']=="Acheter"){
                            
                        echo '<span style="color:#28a745">Achat </span>';
                        }
                        echo $commande['prix'].'<sup>EURO</sup>' ;
                        ?>
                        </strong>
                    </p>
                    <?php 
                    $date = date_diff(date_create(date('d-m-Y')),date_create($commande['date']));
                    $date =(int)($date->format('%a'));
                    if($date<3){ 
                    ?>
                     <p style="text-align:center;">

                        <a href="../controleur/stripe_controller.php?prix=<?php echo $commande['prix'] ?>"class="btn btn-success" <?php echo $commande['id_comm']; ?>>Payer</a>
                    </p>
                    <p style="text-align:center;">
                        <a class="btn btn-danger" data-toggle="modal" data-target="#alert_anul<?php echo $commande['id_comm']; ?>">Annuler la commande</a>
                        <?php include('../autre/alert_anul.php'); ?>
                    </p>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>

        </article>

    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
</body>

</html>
