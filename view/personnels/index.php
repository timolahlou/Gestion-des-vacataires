<?php if ($p == "Vacataire") {
        include "../view/layout/head-vacataire.php";
}else{
        include "../view/layout/head.php"; 
} ?>

	<div class="container">
		<div class="form-group col-md-offset-4 ajouter">
		<input class='btn btn-success' style="width:30%; margin-top:5%; margin-left:12%;" type="button" value="Ajouter une personne" data-toggle="modal" data-target="#Ajouter_cours">
		</div>
	<div class="row">


        <div class="col-md-12">
        <h4>Liste Personnels</h4>
        <div class="table-responsive">


              <table id="mytable" class="table table-bordred table-striped">

                   <thead>

                   <th><input type="checkbox" id="checkall" /></th>
                   <th>Nom</th>
                    <th>Prénom</th>
                     <th>Email</th>
                     <th>Téléphone</th>
                      <th>Role</th>
                      <th>Modifier</th>
                       <th>Supprimer</th>
                   </thead>
    <tbody>

<?php   foreach ($personnels as $p) {  ?>
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td><?php echo $p->NOM ?></td>
    <td><?php echo $p->PRENOM ?></td>
    <td><?php echo $p->EMAIL ?></td>
    <td><?php echo $p->TEL ?></td>
    <td><?php if ($p->ROLE == 1) { echo "Responsable Administratif"; }elseif($p->ROLE == 2){ echo "Vacataire"; }elseif($p->ROLE == 3){ echo "Responsable Financier"; }   ?></td>
     <td><a href="<?php echo Router::url('personnels/edit/'.$p->ID); ?>"><span class="glyphicon glyphicon-pencil"></span></span></a></td>
   <!---  <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td> 
  -->

  <td>
    <a onclick="return confirm('Voulez vous vraiment supprimer ?'); " href="<?php echo Router::url('personnels/delete/'.$p->ID); ?>"><span class="glyphicon glyphicon-trash"></span></a>
  </td>
    </tr>
     <?php     }   ?>
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
        <h4 class="modal-title custom_align" id="Heading">Modifier </h4>
      </div>
          <div class="modal-body">
          <form action="<?php echo Router::url('personnels/edit/'.$id); ?>" method="post">
                <div class="form-group">
                <input class="form-control " name="NOM" type="text" placeholder="nom">
                </div>

                <div class="form-group">
                <input class="form-control " name="PRENOM" type="text" placeholder="prénom">
                </div>
                
                <div class="form-group">
                <input class="form-control " name="EMAIL" type="text" placeholder="Email">
                </div>

                <div class="form-group">
                <input class="form-control " name="MDP" type="password" placeholder="Mot de passe">
                </div>

                <div class="form-group">
                <input class="form-control " name="TEL" type="text" placeholder="Téléphone">
                </div>
                <div class="form-group">
                <label for="sel1">Select list:</label>
                <select name="ROLE" class="form-control" id="sel1">
                  <option>Responsable administratif</option>
                  <option>Vacataire</option>
                  <option>Responsable financier</option>
                </select>
                </div>
              </div> 
              <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Modifier</button>
      </div>                 
                    </form>
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
				        <h4 class="modal-title custom_align" id="Heading">Ajouter une personne</h4>
				      </div>
			          <div class="modal-body">
                   <form action="<?php echo Router::url('personnels/ajouter'); ?>" method="post">
			          <div class="form-group">
				        <input class="form-control " name="NOM" type="text" placeholder="nom">
				        </div>

				        <div class="form-group">
				        <input class="form-control " name="PRENOM" type="text" placeholder="prénom">
				        </div>
				        
                <div class="form-group">
                <input class="form-control " name="EMAIL" type="text" placeholder="Email">
                </div>

                <div class="form-group">
                <input class="form-control " name="MDP" type="password" placeholder="Mot de passe">
                </div>

                <div class="form-group">
                <input class="form-control " name="TEL" type="text" placeholder="Téléphone">
                </div>
                <div class="form-group">
                <label for="sel1">Select list:</label>
                <select name="ROLE" class="form-control" id="sel1">
                  <option>Responsable administratif</option>
                  <option>Vacataire</option>
                  <option>Responsable financier</option>
                </select>
                </div>
				      </div>
				          <div class="modal-footer ">
                   
    				        <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Ajouter</button>
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
        <h4 class="modal-title custom_align" id="Heading">Supprimer</h4>
      </div>
          <div class="modal-body">

       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Voulez-vous vraiment supprimer ?</div>

      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>Oui</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Non</button>
      </div>
        </div>
    <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
    </div>


</body>
</html>
