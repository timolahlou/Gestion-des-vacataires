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
      <a class="navbar-brand" href="#">UHA</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="<?php echo Router::url('listeCours'); ?>">Mes Cours</a></li>
      <li><a href="<?php echo Router::url('horaires'); ?>">Mes Horaires</a></li>
      <li><a href="<?php echo Router::url('documents'); ?>">Mes Documents</a></li>
      <li><a href="<?php echo Router::url('horaires'); ?>">Mon Profile</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $p; ?></a></li>
      <li><a href="<?php echo Router::url('personnels/logout'); ?>"><span class="glyphicon glyphicon-log-in"></span> déconnexion</a></li>
    </ul>
  </div>
</nav> 

<body>