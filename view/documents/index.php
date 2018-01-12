<?php if ($p == "Vacataire") {
        include "../view/layout/head-vacataire.php";
}else{
        include "../view/layout/head.php"; 
} ?>

	<div class="container">
	<h1>Liste de documents</h1><br/>
	<div class="row">

        <div class="col-md-12">
        <form class="form-inline">
		      <button type="submit" class="btn btn-primary">Ajouter un document</button>
		    </form>
		<br/>
		
        <div class="table-responsive">

              <table id="mytable" class="table table-bordred table-striped">

                   <thead>

                   <th><input type="checkbox" id="checkall" /></th>
                   <th>Libelle document</th>
                    <th>URL</th>
                     <th>Document</th>
                     <th>Valider</th>
					            <th>Modifier</th>
                       <th>Supprimer</th>
                   </thead>
    <tbody>

    <tr>
      <?php foreach ($images as $image) {?>
    <td><input type="checkbox" class="checkthis" /></td>
    <td><?php echo $image->LIBELLEDOCUMENT;   ?></td>
    <td><a href="" download="<?php echo Router::webroot('images/'.$image->URL); ?>"><?php echo $image->URL;   ?></a></td>
    <td>
      <a href="#" onclick="FileBrowserDialogue.sendURL('<?php echo Router::webroot('images/'.$image->URL); ?>')">
            <img src="<?php echo Router::webroot('images/'.$image->URL); ?>" width="300" height="150">
          </a>
    </td>
	<td><p data-placement="top" data-toggle="tooltip" title="Valider"><button class="btn btn-primary btn-xs" data-title="Valider" ><span class="glyphicon glyphicon-ok"></span></button></p></td>
	<td><p data-placement="top" data-toggle="tooltip" title="Modifier"><button class="btn btn-primary btn-xs" data-title="Modifier" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td>
    <a onclick="return confirm('Voulez vous vraiment supprimer ?'); " href="<?php echo Router::url('documents/delete/'.$image->ID); ?>"><span class="glyphicon glyphicon-trash"></span></a>
  </td>
    </tr>
    <?php  }   ?>
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
		<input class="form-control " type="text" placeholder="Libelle document">
		</div>
		<div class="form-group">
		<input type="file" class="form-control-file" id="doc">
		</div>
		<div class="form-check">
		  <label class="form-check-label">
			<input class="form-check-input" type="radio" name="Radios" id="Radio1" value="option1" checked>
			Valider
		  </label>
		</div>
		<div class="form-check">
		  <label class="form-check-label">
			<input class="form-check-input" type="radio" name="Radios" id="Radio2" value="option2">
			Rétracter
		  </label>
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


</body>
</html>
