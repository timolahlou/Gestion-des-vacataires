<?php  include "../view/layout/head.php";  ?>

	<div class="container">
		<div class="form-group col-md-offset-4 ajouter">
		<input class='btn btn-success' style="width:30%; margin-top:5%; margin-left:12%;" type="button" value="Ajouter un cours" data-toggle="modal" data-target="#Ajouter_cours">
		</div>
	<div class="row">


        <div class="col-md-12">
        <h4>Gestion de cours</h4>
        <div class="table-responsive">


              <table id="mytable" class="table table-bordred table-striped">

                   <thead>

                   <th><input type="checkbox" id="checkall" /></th>
                   <th>Libelle cours</th>
                    <th>Type de cours</th>
                    <th>Enseignat</th>
                    <th>état</th>
                      <th>Modifier</th>
                       <th>Supprimer</th>
                   </thead>
    <tbody>
    <?php  foreach ($cours as $c) {  ?>
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td><?php echo $c->LIBELLE;  ?></td>
    <td><?php echo $c->TYPE;  ?></td>
    <td><?php echo $c->Ens;  ?></td>
    <td><?php if ($c->ID_VALIDE_COURS == 1) { echo "Validé"; }else{ echo "non validé"; } ?></td>
    <td><button class="btn btn-primary btn-xs" data-title="edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
   <!-- <td><button class="btn btn-danger btn-xs" data-title="delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
    </tr>  -->
      <td>
              <a onclick="return confirm('Voulez vous vraiment supprimer ?'); " href="<?php echo Router::url('cours/delete/'.$c->ID); ?>"><span class="glyphicon glyphicon-trash"></span></a>
            </td>
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
        <h4 class="modal-title custom_align" id="Heading">Modifier l'élément</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control" type="text" placeholder="Libelle">
        </div>
        <div class="form-group">

        <input class="form-control " type="text" placeholder="Type">
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


		<div class="modal fade" id="Ajouter_cours" tabindex="-1" role="dialog" aria-labelledby="Ajouter_cours" aria-hidden="true">
		      <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				        <h4 class="modal-title custom_align" id="Heading">Ajouter votre élément</h4>
				      </div>
			          <div class="modal-body">
			          <div class="form-group">
				        <input class="form-control " type="text" placeholder="">
				        </div>

				        <div class="form-group">
				        <input class="form-control " type="text" placeholder="">
				        </div>
				      </div>
				          <div class="modal-footer ">
				        <button type="button" class="btn btn-success" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Ajouter</button>
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
        <h4 class="modal-title custom_align" id="Heading">Supprimer l'élément</h4>
      </div>
          <div class="modal-body">

       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Êtes vous sûr de vouloir supprimer cet élément?</div>

      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Oui</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Non</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>


</body>
</html>