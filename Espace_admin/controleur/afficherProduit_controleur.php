<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/Produit_modele.php');
    
    if(isset($_GET['produit']) && !empty(recherche_produit($_GET['produit'])) ){
        $produit=recherche_produit($_GET['produit']);
    }else{
        header('Location: listeProduit_controleur.php');
    }

    
    
    include('../vue/afficherProduit_vue.php');
?>
