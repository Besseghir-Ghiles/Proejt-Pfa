<html>

<head>
    <title>Connexion</title>
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
                <h3 class="masthead-brand"><a href="../../Espace_membre/controleur/accueil_c.php" style="color:#fff;"><i class="fas fa-star"></i> <i style="color:#dc3545; font-weight:bold;"> P</i>o<i style="color:#007bff; font-weight:bold;">le</i>IT</a></h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link active" href="../../Espace_membre/controleur/connexion_controleur.php" style="color:#fff; ">Connexion</a>
                    <a class="nav-link" href="../../Espace_membre/controleur/accueil_controleur.php" style="font-weight:bold; border-bottom:3px #fff solid;">Espace utilisateur</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover" style="margin-top:-100px;">
            <form class="form-horizontal col-lg-6 offset-lg-3" method="post" action='connexion_controleur.php' style="margin-top:150px;">
                <legend style="text-align:center;">Espace administrateur :</legend>

                <div class="input-group mb-2 mr-sm-2 offset-lg-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text rounded-left"><i class="fas fa-user"></i></span>
                    </div>
                    <input name="mail" type="email" class="form-control form-control-lg col-lg-8" placeholder="Votre E-Mail">
                </div>

                <div class="input-group mb-2 mr-sm-2 offset-lg-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input name="mp" type="password" class="form-control form-control-lg col-lg-8" placeholder="Votre mot de passe">
                </div>

                <div class="form-group">
                    <div class="col-sm-4 offset-sm-4">
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><span class="fas fa-check-circle"></span> connexion </button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <p style="font-weight:bold;">Vous n'etes pas admins ? <a href="../../Espace_membre/controleur/connexion_controleur.php">cliquez ici.</a></p>
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

</html>
