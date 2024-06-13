<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/Produit_modele.php');
    //supp la selection
    if(isset($_POST['suppSlec'])){
        $ids = getIds();
        foreach($_POST['num'] as $ids){
            supp($ids);
        }
    }

    //supp un produit 
    if(isset($_GET['supp']) && !empty(recherche_produit($_GET['supp']))){
        supp($_GET['supp']);
    }

    // stock et disponibilites
	if (isset($_GET['oui'])){
		produitUpdate(' dispo="oui"',$_GET['oui']);
	}
	if (isset($_GET['non'])){
		produitUpdate(' dispo="non" ',$_GET['non']);
	}
	if (isset($_GET['plus'])){
        produitUpdate(' stock=stock+1',$_GET['plus']);
	}
	if (isset($_GET['minus'])){
        produitUpdate(' stock=stock-1',$_GET['minus']);
	}

    // Recherche
    if(isset($_GET['rech'])){
        $terme= htmlspecialchars($_GET['rech']);
		$terme= trim($terme);
		$terme = strip_tags($terme);
		
		$produits=rech($terme);
    }else{
       // Filtre
        if(isset($_GET['c'])){
            switch($_GET['c']){
                case 2 :
                    $produits= produitFilter('stock=0');
                    break;
                case 3:
                    $produits = produitFilter('dispo="non"');
                    break;
            }
        }else{
            $produits = get_produits();
        } 
    }
    
    
    
    
    include('../vue/listeProduit_vue.php');
?>
