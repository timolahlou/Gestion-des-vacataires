<?php  include "../view/layout/head.php";  ?>

	<div class="container">
	<div class="row">

        <div class="col-md-12">
          <h2 class="display-2" style="text-align:center;line-height:2em;" >Gestion des contrats</h2>

          <div class="form-group col-md-offset-4 ajouter">
          <input class='btn btn-success' style="width:30%; margin-top:5%; margin-left:12%;" type="button" value="Ajouter une contrat" data-toggle="modal" data-target="#Ajouter_contrat">

          <br /><br /><br />

          </div>

              <form action="<?php echo Router::url('contrats/index'); ?>" method="post" class="form-inline"  style="line-height:6em;text-align:center">
          			<label for="doc_cours">Le contrat du vacataire: </label>
                <select name="idV" class="selectpicker form-control " data-show-subtext="true" data-live-search="true" style=" margin-left: 1cm; width: 20em" >
                   <?php  foreach ($contrats as $c) {?>
                      <option value="<?php echo $c->ID; ?>"><?php echo $c->nomV; ?></option>
                   <?php } ?>
                </select>
                <input style=" margin-left: 1cm; width: 15em; " class='btn btn-primary' type="button" value="Afficher contrat" data-toggle="modal" data-target="#Afficher_contrat">

              </form>

        </div>
	</div>
</div>



<div class="modal fade" id="Afficher_contrat" tabindex="-1" role="dialog" aria-labelledby="Afficher_contrat" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <h4 class="modal-title custom_align" id="Heading">Contrat du</h4> <?php  echo $contrat->nomV;  ?>
          </div>
            <div class="modal-body">
            <div class="form-group">
              <span class="text-left">Prix CM :</span>
              <!-- HNA HAJIBO L PRIX B PHP -->

            </div>
        <div class="form-group">
            <span class="text-left">Prix TD:</span> <!-- HNA HAJIBO L PRIX B PHP -->

        </div>

        <div class="form-group">
            <span class="text-left">Prix TP:</span> <!-- HNA HAJIBO L PRIX B PHP -->

        </div>
      </div>
              <div class="modal-footer">

            <button type="button" class="btn btn-warning btn-lg" style=" display:none;  display: inline;" data-toggle="modal" data-target="#edit_contrat">Modifier</button>
            <button type="button" class="btn btn-danger btn-lg " style=" display:none; display: inline;" data-toggle="modal" data-target="#delete">Supprimer</button>

          </div>
            </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>


<div class="modal fade" id="edit_contrat" tabindex="-1" role="dialog" aria-labelledby="edit_contrat" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Modifier la contrat du: </h4>// php njibo smiytou
      </div>
      <div class="modal-body">
        <div class="form-group">
          <span class="text-left">Prix CM :</span>
            <input class="form-control " type="text" placeholder="Prix CM">
        </div>
        <div class="form-group">
          <span class="text-left">Prix TD :</span>
            <input class="form-control " type="text" placeholder="Prix TD">
        </div>
        <div class="form-group">
          <span class="text-left">Prix TP :</span>
            <input class="form-control " type="text" placeholder="Prix TP">
        </div>

      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Modifier</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>


		<div class="modal fade" id="Ajouter_contrat" tabindex="-1" role="dialog" aria-labelledby="Ajouter_contrat" aria-hidden="true">
		      <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				        <h4 class="modal-title custom_align" id="Heading">Ajouter une contrat</h4>
				      </div>
			          <div class="modal-body">
                  <form action="<?php echo Router::url('contrats/ajouter'); ?>" method="post">
                  <div class="form-group">
                     <span class="text-left">Vacataire :
                       <select name="ID_SIGNE" class="selectpicker form-control " data-show-subtext="true" data-live-search="true">
                         <?php  foreach ($personnels as $p) { ?>
                         <option value="<?php  echo $p->ID; ?>"><?php  echo $p->NOM; ?></option>
                         <?php   }  ?>
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


    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Supprimer votre élément</h4>
      </div>
          <div class="modal-body">

       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Êtes-vous sûr de supprimer cet élément?</div>

      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Oui</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Non</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>


</body>
</html>
