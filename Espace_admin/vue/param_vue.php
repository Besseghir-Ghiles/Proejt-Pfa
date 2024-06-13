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
        <h1 style="margin-bottom:30px;" class="col-sm-9"><i class="fas fa-cogs"></i> Paramétre du compte : </h1>
        <div class="row" style="margin-left:10px;">
            <ul class="list-group col-sm-6">
                <li class="list-group-item list-group-item-dark">
                    <span style="font-weight:bold;">Informations :</span>
                </li>
                <li class="list-group-item ">
                    <?php if($yes==true){ ?>
                    <div class="alert alert-success col-sm-12">
                        <p class="text-center">Vos Informations ont été modifier avec succes. </p>
                    </div>
                    <?php } ?>
                    <form method="post" action="param_controleur.php" class="">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label class="col-sm-12">Nom:</label>
                                <div class="col-sm-12">
                                    <input id="nom" name="nom" type="text" placeholder="Nom " class="form-control " required="" value="<?php echo $admin['nom']; ?>">
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group col-sm-6">
                                <label class="col-sm-12">Prénom:</label>
                                <div class="col-sm-12">
                                    <input id="prenom" name="prenom" type="text" placeholder="Prénom " class="form-control" required="" value="<?php echo $admin['prenom']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Text input-->
                            <div class="form-group col-sm-12">
                                <label class="col-sm-12">E-Mail:</label>
                                <div class="col-sm-12">
                                    <input id="email" name="mail" type="text" placeholder="E-Mail" class="form-control" required="" value="<?php echo $admin['mail']; ?>" />
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
                </li>
            </ul>
            <!-- mot de passe -->
            <ul class="list-group col-sm-6">
                <li class="list-group-item list-group-item-dark">
                    <span style="font-weight:bold;">Modifier le mot de passe :</span>
                </li>
                <li class="list-group-item ">
                    <?php if($yes2==true){ ?>
                    <div class="alert alert-success col-sm-12">
                        <p class="text-center">Votre mot de passe a été modifier avec succes. </p>
                    </div>
                    <?php } ?>
                    <form method="post" action="param_controleur.php" name="mdp">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label class="col-sm-12">Ancien mot de passe:</label>
                                <div class="col-sm-12">
                                    <input id="email" name="old" type="password" placeholder="ancien mot de passe" class="form-control" required="" />
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-12">Nouveau mot de passe:</label>
                                <div class="col-sm-12">
                                    <input id="email" name="new1" type="password" placeholder="mot de passe" class="form-control" required="" />
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label class="col-sm-12">Confirmez le mot de passe:</label>
                                <div class="col-sm-12">
                                    <input id="email" name="new2" type="password" placeholder="mot de passe" class="form-control" required="" />
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
                </li>
            </ul>
        </div>
    </section>
</body>
