<?php if ($this->Session->user('ROLE')=='2') {
        include "../view/layout/head-vacataire.php";
}else{
        include "../view/layout/head.php"; 
} ?>
<div class="form-group col-md-offset-1 ajouter">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title custom_align" id="Heading">Contrat du</h4> <?php  echo $contrat->nomV;  ?>
          </div>
            <div class="modal-body">
            <div class="form-group">
              <span class="text-left">Prix CM :</span>
             <?php  echo $contrat->PrixCM;  ?>
            </div>
          <div class="form-group">
            <span class="text-left">Prix TD:</span> <?php  echo $contrat->PrixTD;  ?>
        </div>
        <div class="form-group">
            <span class="text-left">Prix TP:</span> <?php  echo $contrat->PrixTP;  ?>
        </div>
      </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-warning btn-lg" style=" display:none;  display: inline;" data-toggle="modal" data-target="#edit_contrat">Modifier</button>
            <button type="button" class="btn btn-danger btn-lg " style=" display:none; display: inline;" data-toggle="modal" data-target="#delete"><a onclick="return confirm('Voulez vous vraiment supprimer ?'); " href="<?php echo Router::url('contrats/delete/'.$contrat->ID); ?>"><span class="glyphicon glyphicon-trash"></span></a></button>

          </div>
</div>
