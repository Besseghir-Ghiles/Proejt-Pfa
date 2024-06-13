<html>

<head>
    <title>Tableau de bord</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon" type="image/x-icon" href="../../images/icone.ico" />
    <link rel="stylesheet" href="../../css/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/bootstrap/icone/css/all.css">
    <link href="../../css/style_admin.css" rel="stylesheet" />
    <script src="../../css/bootstrap/jquery.js"></script>
    <script src="../../css/bootstrap/dist/js/bootstrap.js"></script>
</head>

<body>
    <?php include("../autre/menu.php"); ?>

    <section class="container-fluid col-lg-10 offset-lg-2 col-md-9 offset-md-3" id='princi'>
        <div class="row">
            <h1 style="margin-bottom:30px;" class="col-sm-9"><i class="fas fa-edit"></i> Modifier le produit</h1>
        </div>
        <article class="offset-sm-1">
            <form class="form-horizontal col-sm-8 offset-sm-1" method="post" action="modifierProduit_controleur.php?produit=<?php echo $donnees['id'] ?>" enctype="multipart/form-data">

                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Titre : </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control " id="text" name="titre" value="<?php echo $donnees['titre'];  ?>" required="">
                    </div>
                </div>

               

                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Catégorie : </label>
                    <div class="col-lg-5">
                        <select class="form-control" name="cat" id="cat" required="">
                        <option value="Téléscope">Télescope</option>
                            <option value="lampe_3D">lampe_3D</option>
                            <option value="lampe de projection">lampe de projection</option>
                                <option value="Collier">Collier</option>

                        </select>
                    </div>
                </div>
         
                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Stock : </label>
                    <div class="input-group col-lg-5 ">
                        <input type="number" class="form-control " id="text" name="stock" required="" value="<?php echo $donnees['stock'];  ?>">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="logosearch">Machines</span>
                        </div>
                    </div>
                </div>

                
                <div class="form-group row">
                    <label for="pach" class="col-lg-3 lab">Prix Achat : </label>
                    <div class="input-group col-lg-4 ">
                        <input type="number" class="form-control " id="pach" name="p_ach" required min=1>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="logosearch">EURO</span>
                        </div>
                    </div>
                    
                </div>
            

                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Disponibilité : </label>
                    <label for="oui" class="radio col-lg-3 col-lg-offset-1" style="margin-left:20px;">
                        <input type="radio" name="dispo" value="oui" id="oui">
                        Oui
                    </label>
                    <label for="non" class="radio col-lg-3" style="margin-left:20px;">
                        <input type="radio" name="dispo" value="non" id="non">
                        Non
                    </label>
                </div>

                <div class="form-group row">
                    <label for="text" class="col-lg-3 lab">Description : </label>
                    <div class="col-lg-9">
                        <textarea class="form-control " id="text" name="desc" required="" rows="5"><?php echo $donnees['disc']; ?></textarea>
                    </div>
                </div>

                <div class="row">
                    <img class="col-lg-4" src="../../images/produits/<?php echo $donnees['image'] ?>" width="80" height="300" />
                    <div class="row col-lg-8">
                        <div class="form-group">
                            <label for="text" class="col-lg-12">voulez vous changer la couverture ? </label>
                            <div class="col-lg-9">
                                <input type="file" id="text" name="image">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary float-right" value="Modifier le produit">
                </div>
            </form>
        </article>
    </section>
    
</body>

</html>
