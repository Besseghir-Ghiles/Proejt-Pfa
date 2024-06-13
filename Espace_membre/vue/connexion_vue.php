<html>

<head>
    <title>Inscription PoleIT</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/x-icon" href="../../images/icone.ico" />
    <link rel="stylesheet" href="../../css/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/bootstrap/icone/css/all.css">
    <link href="../../css/style.css" rel="stylesheet" />
    <script src="../../css/bootstrap/jquery.js"></script>
    <script src="../../css/bootstrap/dist/js/bootstrap.js"></script>

</head>

<body class="text-center" id="con">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link" href="" style="color:#fff;">A propos</a>
                    <a class="nav-link" href="accueil_c.php" style="color:#fff;">Accueil</a>
                    <a class="nav-link" href="Inscription_controleur.php" style="font-weight:bold; border-bottom:3px #fff solid;">Inscription</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover" style="margin-top:-100px;">
            <form class="form-horizontal col-lg-6 offset-lg-3" method="post" action='connexion_controleur.php' style="margin-top:150px;">
                <legend style="text-align:center;">Perdez plus de temps et connectez vous :</legend>

                <div class="input-group mb-2 mr-sm-2 offset-lg-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-left"><i class="fas fa-user"></i></span>
                    </div>
                    <input name="mail" id="mail" type="email" class="form-control form-control-lg col-lg-8" placeholder="Votre E-Mail">
                </div>

                <div class="input-group mb-2 mr-sm-2 offset-lg-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input name="mp" id="mp" type="password" class="form-control form-control-lg col-lg-8" placeholder="Votre mot de passe">
                </div>

                <div class="form-group">
                    <div class="col-sm-4 offset-sm-4">
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><span class="fas fa-check-circle"></span> connexion </button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <p style="font-weight:bold;">Vous n'avez encore pas de compte ? <a href="inscription_controleur.php"> Inscrivez-vous.</a></p>
                </div>

            </form>
        </main>
        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p style="font-weight:bold;">
                   
                    <a href="fb.com"><i class="fab fa-facebook"></i></a>
                    <a href="insta.com"><i class="fab fa-instagram"></i></a>
                    <a href="mailto:Biblioteque_en_ligne@gmail.com"><i class="fab fa-google"></i></a>
                </p>
            </div>
        </footer>
    </div>
</body>
<script>
    <?php if($no==true){ ?>
    $('#mail').addClass('is-invalid');
    $('#mp').addClass('is-invalid');
    <?php } ?>

</script>

</html>
