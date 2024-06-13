<html>

<head>
    <title>Profile | PoleIT</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/x-icon" href="../../images/icone.ico" />
    <link rel="stylesheet" href="../../css/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/bootstrap/icone/css/all.css">
    <link href="../../css/style.css" rel="stylesheet" />
    <script src="../../css/bootstrap/jquery.js"></script>
    <script src="../../css/bootstrap/dist/js/bootstrap.js"></script>
</head>

<body>
    <?php include("../autre/menu.php"); ?>
    <!-- Conetenu de la page -->
    <section class="container" id="princi">
        <article>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="accueil_controleur.php">Accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $membre['prenom']; ?></li>
                </ol>
            </nav>
        </article>
        <article>
            <h1 style="margin-bottom : 20px;">
                Vos Information :
                <a class="btn btn-outline-danger float-right" href="deco.php">Déconnexion.</a>
                <a class="btn btn-outline-primary float-right" href="modifierProfile_controleur.php">Modifier</a>
            </h1>
            <table class="table table-striped" style="margin-bottom : 20px;">
                <tbody>
                    <tr>
                        <th>Nom : </th>
                        <td><?php echo $membre['nom'].' '.$membre['prenom']; ?></td>
                    </tr>
                    <tr>
                        <th>E-mail : </th>
                        <td><a href="mailto:<?php echo $membre['mail']; ?>"><?php echo $membre['mail']; ?></a></td>
                    </tr>
                    <tr>
                        <th>Adresse : </th>
                        <td><?php echo $membre['adress']; ?></td>
                    </tr>
                    <tr>
                        <th>Nombre de commande effectué : </th>
                        <td>
                            <?php 
                            $nb = (int) get_nbComm($_SESSION['id']);
                            echo $nb; 
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </article>
    </section>
    <!-- Bas de page -->
    <?php include('../autre/footer.php'); ?>
</body>

</html>
