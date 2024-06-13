<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/promotions_modele.php');
    
     //supp la selection
     if(isset($_POST['suppSlec'])){
        $ids = getIds();
        foreach($_POST['num'] as $ids){
             add($ids,$_GET['promo']);
        }
    }

    if(isset($_GET['promo'])){
        if(isset($_GET['add'])){
            add($_GET['add'],$_GET['promo']);
        }
        
        $produits=get_prouduitNo();
        $promo=recherche_promo($_GET['promo']);
    }else{
       header('Location: listePromotions_controleur.php');
    }

    
    
    include('../vue/ajouterProduitPromo_vue.php');
?>
