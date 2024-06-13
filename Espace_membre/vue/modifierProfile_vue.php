<html>

<head>
    <title>modifier profile PoleIT</title>
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
                    <li class="breadcrumb-item"><a href="profile_controleur.php">Profile</a></li>
                    <li class="breadcrumb-item active" aria-current="page">modifier le profile</li>
                </ol>
            </nav>
        </article>
        <article>
            <form method="post" action="modifierProfile_controleur.php" class="col-sm-10 offset-sm-1">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label class="col-sm-12">Nom:</label>
                        <div class="col-sm-12">
                            <input id="nom" name="nom" type="text" placeholder="Nom " class="form-control " required="" value="<?php echo $membre['nom']; ?>">
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group col-sm-6">
                        <label class="col-sm-12">Prénom:</label>
                        <div class="col-sm-12">
                            <input id="prenom" name="prenom" type="text" placeholder="Prénom " class="form-control" required="" value="<?php echo $membre['prenom']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Text input-->
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12">E-Mail:</label>
                        <div class="col-sm-12">
                            <input id="email" name="mail" type="text" placeholder="E-Mail" class="form-control" required="" value="<?php echo $membre['mail']; ?>" />
                        </div>
                    </div>
                    <!-- Text input-->
                    <div class="form-group col-sm-12">
                        <label class="col-sm-12">Adresse:</label>
                        <div class="col-sm-12">
                            <input id="adr" name="adr" type="text" placeholder="Adresse " class="form-control" required="" value="<?php echo $membre['adress']; ?>">
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group col-sm-12">
                        <div class="col-sm-12">
                            <button id="" name="" class="btn btn-primary float-right">Modifier</button>
                        </div>
                    </div>
                </div>
            </form>
        </article>
    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
</body>

</html>
