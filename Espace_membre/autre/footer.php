<footer class="container-fluid" style="color:white; margin-bottom: 0px; margin-top: 10px; padding-top: 10px; background-color:#343a40;">
    <!--produits-->
    <div class="row">
        <div class="col-sm-3">
            <h4>- produits :</h4> 
            <?php 
			$rep=get_produits(3,4);
            echo '<ul>';
			while($donnees=$rep->fetch()){
                echo '<li><a href="Produit_controleur.php?produit='.$donnees['id'].'">'.$donnees['titre'].'</a>';
            }
            echo '</ul>';
		?>
        </div>
        <!--Images-->
        <div class="col-sm-3">
            <h4>-Images :</h4>
            <?php 
		$rep=get_produits(0,3);
		while($donnees=$rep->fetch()){
			echo '<a href="../../images/produits/'.$donnees['image'].'"><img src="../../images/produits/'.$donnees['image'].'" width=50 Style="margin-left:5px;"/></a>';
		}
						 ?>
        </div>
        <!--Liens -->
        <div class="col-sm-3">
            <h4>-Liens :</h4>
            <ul>
                <li><a href='../../Espace_admin/controleur/connexion_controleur.php'>Admins.</a></li>
                <li><a href='listeProduit_controleur.php'>Autres produits.</a></li>
                <li><a href='contactez_controleur.php'>Contacter.</a></li>
            </ul>
        </div>
        <!--droits-->
        <div class="col-sm-3">
            <form class="form-horizontal col-lg-12" method="get" action="Recherche_controleur.php">
                <h4>- Recherche :</h4>
                <div class="form-group">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input id="rech" name="rech" class="form-control" placeholder="Recherche" type='search'>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-6 offset-lg-6">
                            <button id="connexion " name="connexion " class="btn btn-primary btn-block"><span class="glyphicon glyphicon-search"></span> Recherche </button>
                        </div>
                    </div>
                </div>
            </form>
            <p class="btn float-right">Tout droits reserver.</p>
        </div>
        <div class="col-sm-12 text-center">
                <a href="fb.com"><i class="fab fa-facebook"></i></a>
                <a href="insta.com"><i class="fab fa-instagram"></i></a>
                <a href="mailto:eniemsite@gmail.com"><i class="fab fa-google"></i></a>
            </p>
        </div>
    </div>
</footer>
