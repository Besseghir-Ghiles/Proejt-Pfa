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
        <div class="table-responsive">
            <table class="table table-striped table-condensed ">
                <tr>
                    <td>
                        <strong><?php echo $mess['nom'].' '.$mess['prenom']; ?></strong>
                        <br>E-mail : <a href="<?php echo $mess['mail']; ?>"><?php echo $mess['mail']; ?></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="text-center"><?php echo $mess['message']; ?></p>
                        <div style="font-size:13px;">
                            <strong><?php echo $mess['date']; ?></strong>
                            <a href="listeMessage_controleur.php?supp=<?php echo $mess['id']; ?>" class="float-right" style="color:#a00;"> Supprimer</a>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form class="col-sm-6 offset-sm-3" method="post" action="mailto:<?php echo $mess['mail']; ?>">
                            <div class="form-group col-sm-10 offset-sm-1">
                                <label for="textarea" class="col-sm-12">Votre Reponse : </label>
                                <textarea id="message" name="message" type="textarea" class="formcontrol offset-sm-2" placeholder="Votre message" cols="30" rows="5"></textarea>
                            </div>
                            <div class="form-group float-right ">
                                <div class="col-lg-12">
                                    <button id="envoye" name="envoyé" class="btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span> envoyé </button>
                                </div>
                            </div>

                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </section>
</body>

</html>
