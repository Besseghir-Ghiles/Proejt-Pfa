<html>

<head>
    <title>Contactez | PoleIT</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Contactez</li>
                </ol>
            </nav>
        </article>
        <!-- Presentation -->
        <div class="alert alert-warning col-lg-10 offset-lg-1" style="text-align:center;">
            <p id="message" style="color:black;">Contactez-nous en cas de problème, ou pour juste nous donner votre avis, ou vos suggestions !
                <br />Toujours la a votre écoute. </p>
        </div>
        <!-- Formulaire -->

        <form class="form-horizontal col-lg-6 offset-lg-3 text-center" method="post" action="contactez_controleur.php" id="formu">
            <legend style="color:white;">Contactez-nous pour Plus d'informations </legend>
            <?php if($yes==true){?>
            <div class="alert alert-success col-sm-12 ">
                <p  style="color:white;" class="text-center" >Votre message a été envoyé avec succes. </p>
            </div>
            <?php } else{?>
            <div class="form-group col-lg-12">
                <label for="textarea" style="display:block; color:white;">Votre message : </label>
                <textarea id="message" name="message" type="textarea" class="formcontrol col-lg-8" placeholder="Votre message" cols="30" rows="5" required></textarea>
            </div>
            <div class="col-lg-6 offset-lg-3">
                <?php if(isset($_SESSION['id'])){ ?>
                <button id="envoye" name="envoyé" class="btn btn-primary">
                    <span class="fas fa-check-circle"></span> envoyé
                </button>
                <?php }else{ ?>
                <a class="btn btn-primary" href="connexion_controleur.php">
                    <span class="fas fa-check-circle"></span> envoyé
                </a>
                <?php } ?>
            </div>
            <?php } ?>
        </form>
        <!-- Autre info -->
        <div class="col-lg-12">
            <h3 style="color:white;">Autre infomration :</h3>
            <ul>
                <li><strong>Num:</strong> 0549358532</li>
                <li><strong>E-Mail:</strong> <a href="mailto:poleitsite@gmail.com">poleite@gmail.com</a></li>
                <li><strong>N’hésitez pas à nous suivre sur les réseaux : </strong>
                    <ul class="list-unstyled">
                        <li style="font-size:40px;">
                            <a href="fb.com"><i class="fab fa-facebook"></i></a>
                            <a href="insta.com"><i class="fab fa-instagram"></i></a>
                            <a href="mailto:poleitsite@gmail.com"><i class="fab fa-google"></i></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <strong>Adresse : </strong>
                    orleans, france
                </li>

            </ul>

        </div>
    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
</body>

</html>
