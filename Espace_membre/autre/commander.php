<div class="modal fade" id="infos<?php if(isset($pan)){ echo $produit['id_pan']; } ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"style="color:white;">Confirmez la commande</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="post" action="Produit_controleur.php?produit=<?php echo $produit['id']; ?>">
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-4" style="text-align:right;color:white;">Numéro  de téléphone:</label>
                        <div class="col-sm-6">
                            <input type="tel" class="form-control " name="num" required />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-lg-4" style="text-align:right;color:white;">Vous voulez : </label>
                        <label for="oui" class="radio col-lg-3 col-lg-offset-1" style="margin-left:20px;color:white;">
                            <input  type="radio" onclick="rep1()" name="type" id="oui" value="Acheter" <?php if($produit['stock']==0){echo 'disabled'; } else{ echo 'checked '; }  ?> onclick="rep1()" />Acheter
                        </label>
                        
                    </div>

                    <div class="form-group row nb_l">
                        <label class="col-sm-4" style="text-align:right;color:white;">nombre de produit :</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control nb_lIn" name="nb" required="" min=1 />
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-info" value=' Valider ' />
                    <button class="btn btn-danger" data-dismiss="modal">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function rep1() {
        $('.nb_l').css('display', 'flex');
        $('.nb_lIn').prop('required', true);

        $('.nb_j').css('display', 'none');
        $('.nb_jIn').prop('required', false);
    }

    function rep2() {
        $('.nb_l').css('display', 'none');
        $('.nb_lIn').prop('required', false);

        $('.nb_j').css('display', 'flex');
        $('.nb_jIn').prop('required', true);

    }

</script>
