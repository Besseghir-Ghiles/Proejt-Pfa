<?php
    $mysql_host = getenv('MYSQL_HOST');
    $bdd = new PDO("mysql:host=$mysql_host;dbname=site1", 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $rep= $bdd->query("SET NAMES UTF8");
?>

