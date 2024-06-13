<?php
    // commander 
    function add_com($id_u,$id_l,$nb_l,$nb_j,$prix,$num,$etat){
		global $bdd;
        $nb_l = (int) $nb_l;
		$req = $bdd->prepare('INSERT INTO commandes(id_uti,id_produit,nb_l,nb_j,prix,num,etat,livraison,date) VALUES(:id_u,:id_l,:nb_l,:nb_j,:prix,:num,:etat,"non livré",NOW())');
		$req->execute(array(
			'id_u'=>$id_u,
			'id_l'=>$id_l,
            'prix'=>$prix,
            'nb_l'=>$nb_l,
            'nb_j'=>$nb_j,
            'num'=> $num,
			'etat'=>$etat
		));
    }
    // recherche une commande 
    function rech_com($id,$id_uti){
        global $bdd;
        $rep = $bdd->query('SELECT *, c.id as id_comm FROM commandes c,produits l WHERE l.id = id_produit and c.id ='.$id.' and c.id_uti='.$id_uti);
        $donnees=$rep->fetch();
        return $donnees;
    }
    // verifier si la commande existe et si elle est livré
    function verif($produit,$id){
        global $bdd;
        $rep = $bdd->query('SELECT * FROM commandes,produits WHERE id_produit="'.$produit.'" and livraison = "non livré" and id_uti='.$id);
        $donnees=$rep->fetch();
        return $donnees;
    }
    // modifier le stock et dispo
    function mod_stk($stk,$produit){
        global $bdd;
        $req = $bdd-> query ('UPDATE produits SET stock = "'.$stk.'" WHERE id = '.$produit);
    }

    function mod_dispo($dispo,$produit){
        global $bdd;
        $req = $bdd-> query ('UPDATE produits SET dispo = "'.$dispo.'"WHERE id = '.$produit);
    }
    // recuperer une commande 
    function get_commandes($id){
        global $bdd;
        $rep = $bdd->query('SELECT *, commandes.id as id_comm FROM commandes,produits WHERE produits.id = id_produit and id_uti = '.$id.' and livraison = "non livré" ORDER BY commandes.id DESC ');
        return $rep;
    }
    // supp une commande
    function supp($id,$uti){
		global $bdd;
        $comm = rech_com($id,$uti);
        $up = $bdd-> query ('UPDATE produits SET stock = stock+'.$comm['nb_l'].' WHERE id = "'.$comm['id_produit'].'"');
        $rep = $bdd->query ('DELETE FROM commandes WHERE id='.$id.' and id_uti='.$uti); 
        $bdd->query ('ALTER TABLE commandes AUTO_INCREMENT=0');
	}
    
    

?>
