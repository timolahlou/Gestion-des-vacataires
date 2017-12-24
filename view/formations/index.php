<?php  include "../view/layout/head.php";  ?>

	<div class="container">

	<div class="row">


        <div class="col-md-12">
        	<h2 class="display-2" style="text-align:center;line-height:2em;" >Gestion des formations</h2>

					<div class="form-group col-md-offset-4 ajouter">
					<input class='btn btn-success' style="width:30%; margin-top:5%; margin-left:12%;" type="button" value="Ajouter une formation" data-toggle="modal" data-target="#Ajouter_formation">
					<br /><br /><br />

					</div>


        <div class="table-responsive">
        	<table id="mytable" class="table table-bordred table-striped">

             <thead>

               <th>La formation</th>
							 <th>Chef de formation </th>
               <th>Responsable</th>
							 <th style="text-align:center;">Modifier </th>
               <th style="text-align:center;">Supprimer</th>
           		</thead>

					    <tbody>
					<?php foreach ($formations as $f ) { ?>	

					    <tr>
					    <td><?php  echo $f->LIBELLEFORMATION;   ?></td>
					    <td><?php  echo $f->nomD;   ?></td>

					    <td><?php  echo $f->nomS;   ?></td>
					    <td><p style="text-align:center;" data-placement="top" data-toggle="tooltip" title="Editer"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
					    <td><p style="text-align:center;" data-placement="top" data-toggle="tooltip" title="Supprimer"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
					    </tr>
					<?php  } ?>
					    </tbody>

</table>

<div class="clearfix"></div>
<ul class="pagination pull-right">
  <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
  <li class="active"><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
  <li><a href="#">4</a></li>
  <li><a href="#">5</a></li>
  <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
</ul>

            </div>

        </div>
	</div>
</div>


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Editer la formation</h4>
      </div>
          <div class="modal-body">
		          <div class="form-group">
		        	<input class="form-control " type="text" placeholder="Nom de formation">
						</div>

		        <div class="form-group">
							<span class="text-left">Chef de formation:
							<select class="selectpicker form-control " data-show-subtext="true" data-live-search="true">
									<option>timo lmkawed</option>
									<option>akram tchioro</option>
									<option>nabil lhokoma</option>
							</select> </span>
							</div>

							<div class="form-group">
								<span class="text-left">Responsable de formation:
								<select class="selectpicker form-control " data-show-subtext="true" data-live-search="true">
										<option>timo lmkawed</option>
										<option>akram tchioro</option>
										<option>nabil lhokoma</option>
								</select> </span>
  					</div>


      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Modifier la foramtion</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>


		<div class="modal fade" id="Ajouter_formation" tabindex="-1" role="dialog" aria-labelledby="Ajouter_formation" aria-hidden="true">
		      <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				        <h4 class="modal-title custom_align" id="Heading">Ajouter une formation</h4>
				      </div>
			          
			          <div class="modal-body">
			          	<form action="<?php echo Router::url('/formations/ajouter'); ?>" method="post">
			          <div class="form-group">
				        <input class="form-control " type="text" name="LIBELLEFORMATION" placeholder="Nom de formation">
				        </div>

				        <div class="form-group">
								<span class="text-left">Chef de formation:
				        <select name="ID_DIRIGE" class="selectpicker form-control " data-show-subtext="true" data-live-search="true">
									<?php  foreach ($personnels as $p) { ?>
									<option value="<?php  echo $p->ID; ?>"><?php  echo $p->NOM; ?></option>
									<?php   }  ?>
						</select> </span>
				        </div>

				        <div class="form-group">
									<span class="text-left">Responsable de formation:
									<select name="ID_SUPERVISE" class="selectpicker form-control " data-show-subtext="true" data-live-search="true">
									<?php  foreach ($personnels as $p) { ?>
									<option value="<?php  echo $p->ID; ?>"><?php  echo $p->NOM; ?></option>
									<?php   }  ?>
									</select> </span>
				        </div>
				         <div class="modal-footer$ ">
				        <button type="submit" class="btn btn-success btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Ajouter formation</button>
				     	</div>
				     	</form>
				      </div>
				       
				        </div>
				    <!-- /.modal-content -->
				  </div>
		      <!-- /.modal-dialog -->
		    </div>


    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Supprimer la formation</h4>
      </div>
          <div class="modal-body">

       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span>  En cliquant sur "OUI" la formation va être supprimé définitivement</div>

      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-default" ><span class="glyphicon glyphicon-ok-sign"></span> OUI</button>
        <button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Non</button>
      </div>
        </div>
		    <!-- /.modal-content -->
		  </div>
		      <!-- /.modal-dialog -->
		    </div>


</body>
</html>
