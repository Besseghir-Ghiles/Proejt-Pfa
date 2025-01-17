<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <img src="../../images/logo/logo.jpeg" width="30" height="30" class="d-inline-block align-top" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="w-100" style="margin-bottom:0px;" action="listeProduit_controleur.php" method="get">
            <input class="form-control form-control-dark w-100" type="text" placeholder="Rechercher un produit" aria-label="Recherche" name="rech">
            <input type="submit" style="display: none;" />
        </form>

        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="deco.php">Déconnexion <i class="fas fa-sign-out-alt"></i></a>
            </li>
        </ul>
    </div>
</nav>
<nav class="navbar col-lg-2 col-md-3 bg-dark navbar-expand-md" id="nav_hori">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="sidebar-sticky">
            <ul class="navbar-nav flex-column">
                <li class="nav-item text-nowrap">
                    <a class="nav-link active" href="tabBord_controleur.php">
                        <i class="fas fa-home"></i> Tableau de bord
                    </a>
                </li>
                <!-- les Produits -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-book"></i> Gerer les produits
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a style="color:black;" class="dropdown-item" href="listeProduit_controleur.php"><i class="fas fa-list-ul"></i> Liste des produits</a>
                        <a style="color:black;" class="dropdown-item" href="ajouterProduit_controleur.php"><i class="fas fa-plus-circle"></i> Ajouter un produit</a>
                        <div class="dropdown-divider"></div>
                        <a style="color:black;" class="dropdown-item" href="listePromotions_controleur.php"><i class="fas fa-gift"></i> Les promotions</a>
                    </div>
                </li>
                <!-- les commandes -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-shopping-cart"></i> Gérer les commandes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a style="color:black;" class="dropdown-item" href="listeCommandes_controleur.php"><i class="fas fa-list-ul"></i> Liste des commandes</a>
                        
                    </div>
                </li>
                <!-- les membres -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-users"></i> Gérer les membres </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a style="color:black;" class="dropdown-item" href="listeMessage_controleur.php"><i class="fas fa-envelope-open-text"></i> Messages</a>
                        <a style="color:black;" class="dropdown-item" href="listeMembres_controleur.php"><i class="fas fa-list-ul"></i> Liste des membres</a>
                    </div>
                </li>
            </ul>

            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>autre</span>
                <a class="d-flex align-items-center text-muted" href="#">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </h6>
            <ul class="nav flex-column mb-2">
                <li class="nav-item">
                    <a class="nav-link" href="param_controleur.php">
                        <i class="fas fa-cogs"></i> paramètre
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>
