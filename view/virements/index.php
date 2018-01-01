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
    <style media="screen">
			.texti {
				border: 1px solid;
				text-align: center;
				width: 30%
			}
			.buttons {
				width: 75%
			}
			.ss {
				width: 30% !important;
			}
		</style>

</head>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">UHA</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="<?php echo Router::url('listePersonnes'); ?>">Accueil</a></li>
      <li><a href="<?php echo Router::url('listeVacataires'); ?>">Liste des Vacataires</a></li>
      <li><a href="<?php echo Router::url('listeCours'); ?>">Liste des Cours</a></li>
      <li><a href="<?php echo Router::url('listeFormations'); ?>">Liste des Formations</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $p; ?></a></li>
      <li><a href="<?php echo Router::url('personnels/logout'); ?>"><span class="glyphicon glyphicon-log-in"></span> déconnexion</a></li>
    </ul>
  </div>
</nav>

<body>
  <div class="container">
  <div class="row">

        <div class="col-md-12">
          <h2 class="display-2" style="text-align:center;line-height:2em;" >Les virments</h2>



              <form action="<?php echo Router::url('contrats/afficherContrat'); ?>" method="post" class="form-inline"  style="line-height:6em;text-align:center">
                <label for="doc_cours">Le Vacataire que vous souhaiter valider le virment : </label>
                <select name="idV" class="selectpicker form-control " data-show-subtext="true" data-live-search="true" style=" margin-left: 1cm; width: 20em" >
                   <?php  foreach ($contrats as $c) {?>
                      <option value="<?php echo $c->ID; ?>"><?php echo $c->nomV; ?></option>
                   <?php } ?>
                </select>
                <input type="submit" style=" margin-left: 1cm; width: 15em; " class='btn btn-primary' type="button" value="Afficher contrat" data-toggle="modal" data-target="#Afficher_contrat">

              </form>

        </div>

        <div class="form-group col-md-offset-4">
					<?php
					if (isset($_POST['idV'])) {
						$_SESSION['current_omrane'] = $_POST['idV'];
						$session_value = $_SESSION['current_omrane'];
						echo "<input type='hidden' id='mycurrent'  value='$session_value'>";
						$num_omrane = $_POST['idV'];
						$omr_query ="SELECT * FROM `personnel` WHERE `personnel`.`idV` = '$idV'";

						$omr_query=mysqli_query($db,$omr_query);




						if (mysqli_num_rows($omr_query) == 0) {
								echo "<script type='text/javascript'>alert('personnel inexistant!');</script>";
							}

						else {
							?>
							<div class="texti ">

							<?php
							while ($data = $omr_query->fetch_assoc())
							{
									echo '<h4>Nom : '.$data['nom'].'<br>Prénom : '.$data['prenom'].'<br>Télephone : '.$data['tel'].'</h4></div><br><br><br>';
							}

                  //   hna les requetes la tatcalculer le montant w les heurs effectuer..

                  if (etatvalid != validé && la dateVirment du mois != la date du mois du system ) {
                  									echo "<h4>le montant: '.$data['montant'].'<br></h4>";
                  								  echo "<h4>le nbr heurs : '.$data['heurs'].'<br></h4>";
                  									echo"<input class='btn btn-success ' style="width:40%; margin-top:5%;" type="button" value="Valider virement"><br>";
                  	}
                  else
                  {
                    echo "<script type='text/javascript'>alert('virment de ce mois deja validé !');</script>";
                  }


						}

					}
			?>


			 </div>
  </div>
  </div>