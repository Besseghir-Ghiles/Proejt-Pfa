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
            <h1 style="margin-bottom:30px;" class="col-sm-9"><i class="fas fa-plus-circle"></i> Ajouter un produit</h1>
        </div>
        <article class="offset-sm-1">
            <form class="form-horizontal col-lg-8 offset-lg-1" id="f" method="post" action="ajouterProduit_controleur.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="titre" class="col-lg-3 lab">Titre : </label>
                    <div class="col-lg-9">
                        <input type="text" class="form-control " id="titre" name="titre" required="">
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="cat" class="col-lg-3 lab">Catégorie : </label>
                    <div class="col-sm-5" id='cat'>
                        <select class="form-control" name="cat" required="">
                        <option value="Téléscope">Télescope</option>
                            <option value="lampe_3D">lampe_3D</option>
                            <option value="lampe de projection">lampe de projection</option>
                                <option value="Collier">Collier</option>

                            
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="stk" class="col-lg-3 lab">Stock : </label>
                    <div class="input-group col-lg-5 ">
                        <input type="number" class="form-control " id="stk" name="stock" required min=0>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="logosearch">produits</span>
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
                    <label for="desc" class="col-lg-3 lab">Description : </label>
                    <div class="col-lg-9">
                        <textarea class="form-control " id="desc" name="desc" required="" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="img" class="col-lg-3 lab">Couverture : </label>
                    <div class="col-lg-9">
                        <input type="file" id="img" name="image" required="">
                    </div>
                </div>
                <div class="form-group">
                    <button id="" name="" class="btn btn-primary float-right">Publier le produit</button>
                </div>
            </form>
        </article>
    </section>
</body>

</html>
