<?php if ($p == "Vacataire") {
        include "../view/layout/head-vacataire.php";
}else{
        include "../view/layout/head.php"; 
} ?>

  <div class="container">
  <div class="row">

        <div class="col-md-12">
          <h2 class="display-2" style="text-align:center;line-height:5em;" >Valider les virment les virments</h2>



              <form method="post" action="<?php echo Router::url('virments/ajouter'); ?>" class="form-inline"  style="line-height:6em;text-align:center">
                <label for="doc_cours">Choisissez le vacataire que vous souhaiter le valider le virment : </label>
                <select name="idVacataire" class="selectpicker form-control " data-show-subtext="true" data-live-search="true" style=" margin-left: 1cm; width: 20em" >
                	<?php   foreach ($horaires as $h) { ?>
                   <option value="<?php echo $h->idVacataire; ?>"><?php echo $h->NOM; ?></option>
                   <?php  }  ?>
                </select>
								<input type="submit" style=" margin-left: 1cm; width: 15em; " class='btn btn-primary' value="Valider">

              </form>

        </div>

				<div class="modal fade" id="valider" tabindex="-1" role="dialog" aria-labelledby="valider" aria-hidden="true">
				      <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
						        <h4 class="modal-title custom_align" id="Heading">Valider virment</h4>
						      </div>
					          <div class="modal-body">
		                  <form action="" method="post">
		                  <div class="form-group">
		                     <span class="text-left">Vacataire :
		                       <select name="ID_SIGNE" class="selectpicker form-control " data-show-subtext="true" data-live-search="true">
		                        <!-- <?php  foreach ($personnels as $p) { ?>
		                         <option value="<?php  echo $p->ID; ?>"><?php  echo $p->NOM; ?></option>
													 <?php   }  ?> -->
		                       </select>
		                     </span>
		                 </div>
		        						<div class="form-group">
		                      <span class="text-left">Prix CM :</span>
		        				        <input name="PRIXCM" class="form-control " type="text" placeholder="Prix CM">
		        				    </div>
		                    <div class="form-group">
		                      <span class="text-left">Prix TD :</span>
		        				        <input name="PRIXTD" class="form-control " type="text" placeholder="Prix TD">
		        				    </div>
		                    <div class="form-group">
		                      <span class="text-left">Prix TP :</span>
		        				        <input name="PRIXTP" class="form-control " type="text" placeholder="Prix TP">
		        				    </div>
		                    <div class="modal-footer ">
		                <button type="submit" class="btn btn-success btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Ajouter</button>
		              </div>
		              </form>
						      </div>
						        </div>
						    <!-- /.modal-content -->
						  </div>
				      <!-- /.modal-dialog -->
				    </div>
  </div>
  </div>
