<?php
    session_start();

    if(!isset($_SESSION['admin'])){
		header('Location: connexion_controleur.php');
	}

    include('../../autre/bdd.php');
    include('../modele/Produit_modele.php');

    if(isset($_GET['produit'])){
		$donnees=recherche_produit($_GET['produit']);
		if(empty($donnees)){
			header('Location: listeProduit_controleur.php');
		}
	}else{
		header('Location: listeProduit_controleur.php');
	}
    //mod le produit
	if(isset($_POST['titre']) and isset( $_POST['cat'] ) and isset($_POST['dispo']) and isset($_POST['stock']) and isset( $_POST['p_ach'] )  and isset($_POST['desc']) ){
        
		$titre = htmlspecialchars($_POST['titre']);
        
		$stock =(int) htmlspecialchars($_POST['stock']);
        $cat = htmlspecialchars($_POST['cat']);
		$dispo=$_POST['dispo'];
		$p_ach =(int) htmlspecialchars($_POST['p_ach']);
		
        $disc=$_POST['desc'];
				
		if(isset($_FILES['image']) and ($_FILES['image']['error']==0)){
			$info = pathinfo($_FILES['image']['name']);
			$ex = $info['extension'];
			$ex_aut = ['jpg','png','jpeg'];
			if(in_array($ex,$ex_aut)){
				$image = basename($_FILES['image']['name']);
				move_uploaded_file($_FILES['image']['tmp_name'], '../../images/produits/' . basename($_FILES['image']['name']));
				modifier($_GET['produit'],$titre,$auteur,$dispo,$stock,$cat,$p_ach,$p_loc,$disc,$image);
				header('Location: listeProduit.php');
			}
		}
		else{
			modifier($_GET['produit'],$titre,$auteur,$dispo,$stock,$cat,$p_ach,$p_loc,$disc,$donnees['image']);
			header('Location: afficherProduit_controleur.php?id='.$donnees['id']);
		}
	}

    include('../vue/modifierProduit_vue.php');
?>
