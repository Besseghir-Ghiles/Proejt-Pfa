<?php
    // avoir les produits
    function get_produits($d,$f){
        global $bdd;
        $rep = $bdd->query('SELECT * FROM produits ORDER BY id DESC LIMIT '.$d.','.$f);
        return $rep;
    }
    // recehrcher un produit by son id
    function recherche_produit($id){
		global $bdd;
        $req= $bdd->prepare('SELECT * FROM produits WHERE id= :id');
        $req->execute(array( 'id'=>$id));
        $donnees= $req->fetch();
        return $donnees;
	}
    
    //le nombre de produits 
    function nb_produits(){
        global $bdd;
        $req= $bdd->query('SELECT COUNT(*) as nb FROM produits');
        $donnees= $req->fetch();
        return $donnees['nb'];
    }

    function nb_catproduit($cat){
        global $bdd;
        $req= $bdd->query('SELECT COUNT(*) as nb FROM produits WHERE cat="'.$cat.'"');
        $donnees= $req->fetch();
        return $donnees['nb'];
    }

    // classer les produits
    function clas(){
		 global $bdd;
		 $produits=$bdd->query ('SELECT * FROM produits ORDER BY id DESC '); 
		 while($produit = $produits->fetch()){
			 $rep=$bdd->query('UPDATE produits SET nb_v = (SELECT COUNT(*) FROM commandes WHERE id_produit='.$produit['id'].' )WHERE id='.$produit['id']);
		 }
	 }

	function get_clas($d,$f){
		 global $bdd;
		 $req=$bdd->query('SELECT * FROM produits ORDER BY nb_v DESC LIMIT '.$d.','.$f);
		 return $req;
	}

    // avoir la liste des cat
    function get_cat($d,$f){
		 global $bdd;
		 $req=$bdd->query('SELECT DISTINCT cat FROM produits ORDER BY cat LIMIT '.$d.','.$f);
		 return $req;
	}

    // avoir un produit ordonnee par un choix
    function get_produits_order($d,$f,$order){
		global $bdd;
		$d= (int) $d;
		$rep = $bdd->query ('SELECT * FROM produits ORDER BY '.$order.' LIMIT '.$d.','.$f); 
		return $rep;
	}

    // avoir un produit ordonnee by
    function get_produits_cond($d,$f,$cond,$val){
		global $bdd;
		$d= (int) $d;
		$rep = $bdd->query ('SELECT * FROM produits WHERE '.$cond.'="'.$val.'" ORDER BY titre LIMIT '.$d.','.$f); 
		return $rep;
	}
    //
    function recherche_promo($id){
		global $bdd;
        $req= $bdd->prepare('SELECT * FROM promotions WHERE id= :id');
        $req->execute(array( 'id'=>$id));
        $donnees= $req->fetch();
        return $donnees;
	}
    //
    function get_nbComm($id){
        global $bdd;
        $req= $bdd->prepare('SELECT COUNT(*) as nb FROM commandes WHERE id_uti=:id');
        $req->execute(array( 'id'=>$id));
        $donnees= $req->fetch();
        return $donnees['nb'];
    }
    // barre de recherche 
    function rech($terme){
		global $bdd;
		$rep = $bdd->query('SELECT * FROM produits WHERE titre LIKE "%'.$terme.'%" or cat LIKE "%'.$terme.'%" ORDER BY titre');
		return $rep;
	}

     // avoir la liste des promo
    function get_promotion($d,$f){
        global $bdd;
        $rep = $bdd->query('SELECT * FROM promotions ORDER BY id DESC LIMIT '.$d.','.$f);
        return $rep;
    }
    
    // rechrcher une promo
    function rech_promo($d,$f,$id){
        global $bdd;
        $rep = $bdd->query('SELECT * FROM promotions,produits WHERE promotions.id = '.$id.' and promotions.id = promo  ORDER BY produits.id LIMIT '.$d.','.$f);
        return $rep;
    }
    function getOne_promo($id){
        global $bdd;
        $rep = $bdd->query('SELECT * FROM promotions WHERE id = '.$id);
        $donnees = $rep->fetch();
        return $donnees;
    }
    
    function get_nb_pan($id){
        global $bdd;
        $req= $bdd->query('SELECT COUNT(panier.id) AS nb FROM panier WHERE id_u='.$id);
        $donnees= $req->fetch();
        return $donnees['nb'];
    }
    //calculer le nombre de visiteurs 
    function nb_visites(){
        global $bdd;
        $ip   = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d'); 
        $query = $bdd->prepare("INSERT INTO visites (IP , date , nb_page) VALUES (:ip , :date , 1) ON DUPLICATE KEY UPDATE nb_page = nb_page + 1");
        $query->execute(array(
            ':ip'   => $ip,
            ':date' => $date
        ));
    }

    //verification du mp mail and id
    function verif2($id,$mail,$mp){
        global $bdd;
        $req= $bdd->query('SELECT *  FROM membres WHERE id='.$id.' and pass="'.$mp.'"');
        $donnees= $req->fetch();
        return $donnees;
    }
?>
