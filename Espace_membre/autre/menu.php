<!-- Menu -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
<img src="../../images/logo/logo.jpeg" width="40" height="40" class="d-inline-block align-top" alt="">
<span style="margin-left:5px; font: size 15px; color :white" > POLEIT</span>

        <!-- CSS FILES -->                
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,700;1,200&family=Unbounded:wght@400;700&display=swap" rel="stylesheet">
        

        <link href="../css/bootstrap-icons.css" rel="stylesheet">

        <link href="../css/tooplate-kool-form-pack.css" rel="stylesheet">
        
        <br />
        <span style="margin-left:5px;"></span>
    </a>
    <form class="form-inline my-2 my-lg-0" style="padding-top:10px;" method="get" action="recherche_controleur.php">
        <div class="input-group mb-2 mr-sm-2">
            <input type="search" class="form-control" placeholder="Recherche" id="recherche" name="rech">
            <div class="input-group-prepend">
                <button type="submit" class="input-group-text" id="logosearch"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item "> 
                <a class="nav-link" href="goodies_controller.php">Accueil </a>
            </li>
        <li class="nav-item ">
                <a class="nav-link" href="accueil_c.php">Activities </a>
            </li>
          
            <li class="nav-item">
                <a class="nav-link" href="listeProduit_controleur.php">Liste des goodies </a>
            </li>
            <?php 
                
                if(isset($_SESSION['id']) and isset($_SESSION['mail']) and isset($_SESSION['pass']) and !empty(verif2($_SESSION['id'],$_SESSION['mail'],$_SESSION['pass'])) ){
            ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Commandes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="listeCommandes_controleur.php">Liste des commandes</a>
                    
                </div>
            </li>
            <?php } ?>
            <li class="nav-item">
                <a class="nav-link" href="contactez_controleur.php">Contactez</a>
            </li>
        </ul>
        <div class="float-left">
            <a style="color:orange; margin-right:20px; text-align:center; text-decoration: none;" href="panier_controleur.php">
                <i class="fas fa-shopping-cart"></i>
                <sup>
                    <?php if(isset($_SESSION['id']) and isset($_SESSION['mail']) and isset($_SESSION['pass']) and !empty(verif2($_SESSION['id'],$_SESSION['mail'],$_SESSION['pass']))){?>
                    <span class="badge badge-danger rounded-circle"><?php echo get_nb_pan($_SESSION['id']); ?></span>
                    <?php } ?>
                </sup>
            </a>
            <?php 
                if(isset($_SESSION['id']) and isset($_SESSION['mail']) and isset($_SESSION['pass']) and !empty(verif2($_SESSION['id'],$_SESSION['mail'],$_SESSION['pass']))){
            ?>
            <a style="color:#fff;" href="profile_controleur.php">
                <i class="fas fa-user-circle" style="font-size:20px;"></i>
            </a>
            <?php } else{ ?>
            <a style="color:#fff;" href="connexion_controleur.php">Connexion <span class="fas fa-sign-in-alt"></span></a>
            <?php } ?>
        </div>
    </div>
</nav>
