<?php
    // recuperer tout les promo
    function get_promo(){
		global $bdd;
		$rep = $bdd->query ('SELECT * FROM promotions ORDER BY id DESC '); 
		return $rep;
	}

    // avoir une promo celon son id
    function recherche_promo($id){
		global $bdd;
        $req= $bdd->prepare('SELECT * FROM promotions WHERE id= :id');
        $req->execute(array( 'id'=>$id));
        $donnees= $req->fetch();
        return $donnees;
	}

    //supp une promq
    function supp($id){
		global $bdd;
        $rep=$bdd->query('UPDATE produits SET promo=0  where promo = '.$id);
		$donnees= recherche_promo($id);
		unlink('../../images/promotion/'.$donnees['image']);
		$rep = $bdd->query ('DELETE FROM promotions WHERE id='.$id);
		$bdd->query ('ALTER TABLE promotions AUTO_INCREMENT=0');
	}

    

    function rech($terme){
		global $bdd;
		$rep = $bdd->query('SELECT * FROM promotions WHERE titre LIKE "%'.$terme.'%" or pr LIKE "%'.$terme.'%" or slogan LIKE "%'.$terme.'%" ORDER BY titre');
		return $rep;
	}

    //ajouter une promo a la bdd
    function add_promo($titre,$pr,$slogan,$image){
		global $bdd;
        $pr = (int)$pr;
		$req = $bdd->prepare('INSERT INTO promotions(titre,slogan,pr,image) VALUES(:titre,:slogan,:pr, :image)');
		$req->execute(array(
			'titre'=>$titre,
			'slogan'=>$slogan,
            'pr'=>$pr,
            'image'=> $image
		));
	}
    
    //modifier une promotion
    function modifier($id,$titre,$pr,$slogan,$image){
		global $bdd;
		$rep=$bdd->prepare('UPDATE promotions SET titre=:titre,slogan=:slogan,pr=:pr,image=:image where id = '.$id);
		$rep->execute(array(
			'titre'=>$titre,
            'slogan'=>$slogan,
            'pr'=>$pr,
			'image'=>$image
		));
	}

    // avoir une promo et les produits  celon son id
    function produits_promo($id){
		global $bdd;
        $req= $bdd->prepare('SELECT *FROM produits WHERE promo= :id ORDER BY titre ');
        $req->execute(array( 'id'=>$id));
        return $req;
	}

    //retirer un produit d'une promo
    function retirer($id){
		global $bdd;
		$rep=$bdd->query('UPDATE produits SET promo=0  where id = '.$id);
    }

    // produits sans promo
    function get_produitsNo(){
        global $bdd;
        $req= $bdd->query('SELECT * FROM produits WHERE promo=0 ORDER BY titre');
        return $req;
    }

    // add un produit a une promo
    function add($idL,$idP){
		global $bdd;
		$rep=$bdd->query('UPDATE produits SET promo='.$idP.'  where id = '.$idL);
    }

    // get all ids
    function getIds(){
        global $bdd;
        $ids = $bdd->query('SELECT id FROM promotions');
        return $ids;
    }
?>
