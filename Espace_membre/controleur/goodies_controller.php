<?php
    session_start();

    include('../../autre/bdd.php');
    include('../modele/accueil_modele.php');
    nb_visites();

    include('../vue/goodies_vue.php');
?>
