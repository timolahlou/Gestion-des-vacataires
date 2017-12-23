<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Les cours</title>
<!-- Bootstrap -->
<meta charset="utf-8">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!-- <script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="js/dataTables.bootstrap.js" type="text/javascript"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script> -->

		<script type="text/javascript">
		$(document).ready(function(){
			$("#mytable #checkall").click(function () {
						if ($("#mytable #checkall").is(':checked')) {
								$("#mytable input[type=checkbox]").each(function () {
										$(this).prop("checked", true);
								});

						} else {
								$("#mytable input[type=checkbox]").each(function () {
										$(this).prop("checked", false);
								});
						}
				});

				$("[data-toggle=tooltip]").tooltip();
			});


		</script>

</head>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $p; ?></a></li>
      <li><a href="<?php echo Router::url('personnels/logout'); ?>"><span class="glyphicon glyphicon-log-in"></span> déconnexion</a></li>
    </ul>
  </div>
</nav> 

<body>


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
    <td><?php if ($p->ROLE == 1) { echo "Vacataire"; }elseif($p->ROLE == 2){ echo "Responsable Administratif"; }elseif($p->ROLE == 3){ echo "Responsable Financier"; }   ?></td>
    <td><p data-placement="top" data-toggle="tooltip" title="modifier"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
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
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">

        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>


        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Modifier</button>
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
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
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
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
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
