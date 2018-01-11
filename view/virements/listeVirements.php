<?php if ($p == "Vacataire") {
        include "../view/layout/head-vacataire.php";
}else{
        include "../view/layout/head.php"; 
} ?>

	<div class="container">
		<div class="form-group col-md-offset-4 ajouter">
      <form method="post" action="<?php echo Router::url('virements'); ?>">
		      <input class='btn btn-success' style="width:30%; margin-top:5%; margin-left:12%;" type="submit">
    </form>
		</div>
	<div class="row">


        <div class="col-md-12">
        <h4>Liste des Virements</h4>
        <div class="table-responsive">


              <table id="mytable" class="table table-bordred table-striped">

                   <thead>

                   <th><input type="checkbox" id="checkall" /></th>
                   <th>Nom Vacataires</th>
                    <th>Montant du virement</th>
                     <th>Date du virement</th>
                     <th>Etat Virement</th>
                   </thead>
    <tbody>

<?php foreach ($virements as $v) {  ?>
    <tr>
    <td><input type="checkbox" class="checkthis" /></td>
    <td><?php echo $v->NOM; ?></td>
    <td><?php echo $v->MONTANT; ?></td>
    <td><?php echo $v->DATEVIREMENT; ?></td>
    <td><?php  if($v->ETATVIREMENT == 1){ ?>  
            <span class="glyphicon glyphicon-ok"></span>
              <?php } ?>
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
</div>