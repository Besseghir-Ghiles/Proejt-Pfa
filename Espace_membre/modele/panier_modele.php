<?php
    function get_pan($id_u){
        global $bdd;
		$rep = $bdd->query ('SELECT *,panier.id as id_pan, produits.id as id_l FROM panier,produits WHERE produits.id=id_l and id_u='.$id_u.' ORDER BY panier.id DESC '); 
		return $rep;
    }

    function add_pan($id_l,$id_u){
        global $bdd;
		$req = $bdd->prepare('INSERT INTO panier(id_l,id_u) VALUES(:id_l,:id_u)');
        $req->execute(array(
            'id_l'=>$id_l,
            'id_u'=>$id_u
        )); 
    }

    function supp_pan($id){
        global $bdd;
		$rep = $bdd->query ('DELETE FROM panier WHERE id='.$id); 
    }
    
    function recherche($produit,$id_u){
        global $bdd;
		$rep = $bdd->query ('SELECT * FROM panier  WHERE id_l='.$produit.' and id_u = '.$id_u); 
		return $rep->fetch();
    }




?>
