<?php  include "../view/layout/head.php";  ?>

	<div class="container">
	<h1>Horaires de cours</h1>
	<div class="form-group col-md-offset-4 ajouter">
		<input class="btn btn-success" style="width:30%; margin-top:5%; margin-left:12%;" type="button" value="Ajouter un horaire" data-toggle="modal" data-target="#add">
	</div>
	<div class="row">

        <div class="col-md-12">
        
        <div class="table-responsive">

              <table id="mytable" class="table table-bordred table-striped">

                   <thead>

                   <th><input type="checkbox" id="checkall" /></th>
                   <th>Libelle cours</th>
                    <th>Date</th>
                     <th>Duree</th>
                     <th>Salle</th>
                     <th>Type</th>
                     <th>Modifier</th>
                       <th>Supprimer</th>
                   </thead>
    <tbody>

    	<?php  foreach ($horaires as $h) { ?>
		    <tr>
			    <td><input type="checkbox" class="checkthis" /></td>
			    <td><?php  echo $h->LIBELLE;  ?></td>
			    <td><?php  echo	$h->DATEHORAIRE   ?></td>
			    <td><?php  echo	$h->DUREE   ?></td>
			    <td><?php  echo	$h->SALLE   ?></td>
			    <td><?php  echo	$h->TYPE   ?></td>
			    <td><?php  echo	$h->TYPE   ?></td>
				<td><p data-placement="top" data-toggle="tooltip" title="Modifier"><button class="btn btn-primary btn-xs" data-title="Modifier" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
			    <td><p data-placement="top" data-toggle="tooltip" title="Supprimer"><button class="btn btn-danger btn-xs" data-title="Supprimer" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
		    </tr>
		<?php  }  ?>    
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
        <h4 class="modal-title custom_align" id="Heading">Modifier cet élément</h4>
      </div>
      <div class="modal-body">
		<form>
		<div class="form-group">
			<select name="Libelle cours" class="form-control">
			  <option>Libelle cours</option>
			</select>
		</div>
		<div class="form-group">
			<div class='input-group date' id='datetimepicker1'>
				<input type='text' name="Date" class="form-control" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-calendar"></span>
				</span>
			</div>
		</div>
		<div class="form-group">
		<input class="form-control " name="Duree" type="text" placeholder="Duree">
		</div>
		<div class="form-group">
		<input class="form-control " name="Salle" type="text" placeholder="Salle">
		</div>
		</form>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Modifier</button>
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
        <h4 class="modal-title custom_align" id="Heading">Supprimer cet élément</h4>
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
	
	<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="Ajouter un horaire" aria-hidden="true">
	  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				<h4 class="modal-title custom_align" id="Heading">Ajouter un élément</h4>
			  </div>
			  <div class="modal-body">
				<form>
				<div class="form-group">
					<select name="Libelle cours" class="form-control">
					  <option>Libelle cours</option>
					</select>
				</div>
				<div class="form-group">
					<div class='input-group date' id='datetimepicker2'>
						<input type='text' name="Date" class="form-control" />
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-calendar"></span>
						</span>
					</div>
				</div>
				<div class="form-group">
				<input class="form-control " name="Duree" type="text" placeholder="Duree">
				</div>
				<div class="form-group">
				<input class="form-control " name="Salle" type="text" placeholder="Salle">
				</div>
				</form>
			  </div>
				  <div class="modal-footer ">
				<button type="button" class="btn btn-success" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Ajouter</button>
			  </div>
				</div>
			<!-- /.modal-content -->
		  </div>
	  <!-- /.modal-dialog -->
	</div>


</body>
</html>