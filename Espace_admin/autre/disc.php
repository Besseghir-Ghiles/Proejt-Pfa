<?php 

    include('../../autre/bdd.php');
    include("../modele/Produit_modele.php");
    $donnees=recherche_Produit($_GET['id']);
    echo $donnees['disc'];
?>
