<?php
    session_start();

    include('../../autre/bdd.php');
    include('../modele/accueil_modele.php');
    nb_visites();
    include('../modele/Produit_modele.php');

    if(isset($_GET['produit'])){
        $liv =(int) $_GET['produit'];
        $produit = recherche_produit($liv);
        if(empty($produit)){
			header('Location: listeProduit_controleur.php');
		}
        $promo = getOne_promo($produit['promo']);
        if(isset($_SESSION['id'])){
             $lv= verif($liv,$_SESSION['id']);
        }
    }else{
        header('Location: listeProduit_controleur.php');
    }

    if(isset($_POST['num']) && isset($_POST['type']) ){
        if(empty($lv)){
            if(isset($_POST['nb']) && $_POST['type']=="Acheter" ){
                $p = (int)$_POST['nb'];
                if($produit['promo']!=0){
                    $prix = $p * ($produit['p_ach']*$promo['pr']/100);
                }else{
                    $prix = $p * $produit['p_ach'];
                }
                add_com($_SESSION['id'],$_GET['produit'],$_POST['nb'],0,$prix,$_POST['num'],"Acheter");
                mod_stk($produit['stock']-$_POST['nb'],$_GET['produit']);
                header('Location: listeCommandes_controleur.php');
            }
        }
	}

    include('../vue/Produit_vue.php');
?>
