<?php
    // recuperer tout les produits 
    function get_produits(){
		global $bdd;
		$rep = $bdd->query ('SELECT * FROM produits ORDER BY id DESC '); 
		return $rep;
	}

    // avoir un produit celon son id
    function recherche_produit($id){
		global $bdd;
        $req= $bdd->prepare('SELECT * FROM produits WHERE id= :id');
        $req->execute(array( 'id'=>$id));
        $donnees= $req->fetch();
        return $donnees;
	}
    //ajouter un produit a la bdd
    function add($titre,$stock,$cat,$p_ach,$desc,$image){
		global $bdd;
		$req = $bdd->prepare('INSERT INTO produits(titre,p_ach,dispo,stock,cat,nb_v, disc ,promo,image) VALUES(:titre,:p_ach,"oui",:stock,:cat ,"0", :desc ,0, :image)');
		$req->execute(array(
			'titre'=>$titre,
			
			'stock'=>$stock,
			'cat'=>$cat,
			'p_ach'=>$p_ach,
			
            'desc'=> $desc,
            'image'=> $image
		));
	}
    //supp un produit
    function supp($id){
		global $bdd;
		$donnees= recherche_produit($id);
		unlink('../../images/produits/'.$donnees['image']);
		$rep = $bdd->query ('DELETE FROM produits WHERE id='.$id);
		$bdd->query ('ALTER TABLE produits AUTO_INCREMENT=0');
	}
    //modifier le produit
    function modifier($id,$titre,$auteur,$dispo,$stock,$cat,$p_ach,$p_loc,$disc,$image){
		global $bdd;
		$donnees=recherche_produit($id);
		$rep=$bdd->prepare('UPDATE produits SET titre=:titre,p_ach=:p_ach,dispo=:dispo,stock=:stock,cat=:cat,nb_v=:nb_v,disc=:disc,image=:image where id = '.$id);
		$rep->execute(array(
			'titre'=>$titre,
			
			'dispo'=>$dispo,
			'stock'=>$stock,
			'cat'=>$cat,
			'nb_v'=>$donnees['nb_v'],
			'p_ach'=>$p_ach,
			
            'disc'=>$disc,
			'image'=>$image
		));
	}

    // barre de recherche 
    function rech($terme){
		global $bdd;
		$rep = $bdd->query('SELECT * FROM produits WHERE titre LIKE "%'.$terme.'%" or cat LIKE "%'.$terme.'%" ORDER BY titre');
		return $rep;
	}

    // Filtrer la liste des produits
    function produitFilter($filtre){
        global $bdd;
		$rep = $bdd->query ('SELECT * FROM produits WHERE '.$filtre);
		return $rep;
    }

    // produits Update
    function produitUpdate($update,$id){
        global $bdd;
		$rep = $bdd->query ('UPDATE produits set'.$update.' WHERE id='.$id);
    }
    
    // get all ids
    function getIds(){
        global $bdd;
        $ids = $bdd->query('SELECT id FROM produits');
        return $ids;
    }
?>
