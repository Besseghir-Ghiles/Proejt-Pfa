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
            <h1 style="margin-bottom:30px;" class="col-sm-9"><i class="fas fa-edit"></i> Modifier la promotion</h1>
        </div>
        <article class="offset-sm-1">
            <form class="form-horizontal col-sm-8 offset-sm-1" method="post" action="modifierPromo_controleur.php?promo=<?php echo $donnees['id'] ?>" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Titre : </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control " id="text" name="titre" value="<?php echo $donnees['titre'];  ?>" required="">
                    </div>
                </div>

                
                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Description : </label>
                    <div class="col-lg-9">
                        <textarea class="form-control " id="text" name="slogan" required="" rows="5"><?php echo $donnees['slogan']; ?></textarea>
                    </div>
                </div>

                <div class="row">
                    <img class="col-lg-4" src="../../images/promotion/<?php echo $donnees['image'] ?>" width="80" height="150" />
                    <div class="row col-lg-8">
                        <div class="form-group">
                            <label for="text" class="col-lg-12">voulez vous changer la couverture ? </label>
                            <div class="col-lg-9">
                                <input type="file" id="text" name="image">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary float-right" value="Modifier le produit">
                </div>
            </form>
        </article>
    </section>
</body>

</html>
