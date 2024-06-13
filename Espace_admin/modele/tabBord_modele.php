<?php
	function nb_produit(){
		global $bdd;
        $req= $bdd->query('SELECT COUNT(*) AS nb FROM produits ');
        $donnees= $req->fetch();
        return $donnees['nb'];
	}

	function nb_commandes(){
		global $bdd;
        $req= $bdd->query('SELECT COUNT(*) AS nb FROM commandes ');
        $donnees= $req->fetch();
        return $donnees['nb'];
	}

	function nb_livr(){
		global $bdd;
        $req= $bdd->query('SELECT COUNT(*) AS nb FROM commandes where livraison="livré"');
        $donnees= $req->fetch();
        return $donnees['nb'];
	}
	function nb_message(){
		global $bdd;
        $req= $bdd->query('SELECT COUNT(*) AS nb FROM message where vue=0');
        $donnees= $req->fetch();
        return $donnees['nb'];
	}

	function get_com($d){
		global $bdd;
		$d= (int) $d;
		$rep = $bdd->query ('SELECT * FROM commandes,membres,produits where membres.id=id_uti and produits.id=id_produit ORDER BY date DESC LIMIT '.$d.' , 3'); 
		return $rep;
	}
?>
