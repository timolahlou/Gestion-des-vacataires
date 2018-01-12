<?php if ($p == "Vacataire") {
        include "../view/layout/head-vacataire.php";
}else{
        include "../view/layout/head.php"; 
} ?>


<?php    
   //var_dump($horaires);
	
	foreach ($horaires as $h) {

		$nomV = $h->NOM;
		$idV = $h->idVacataire;
		if ($h->TYPE = 'TP') {
			$montant = $h->PRIXTP*$h->DUREE;
		}elseif ($h->TYPE = 'TD') {
			$montant = $h->PRIXTD*$h->DUREE;
		}elseif ($h->TYPE = 'CM') {
			$montant = $h->PRIXCM*$h->DUREE;
		}
		
	}
?>
<body>
  <div class="container">
  <div class="row">
        <div class="col-md-12">
          <h2 class="display-2" style="text-align:center;line-height:5em;" >Valider le virement de <?php echo $nomV;  ?></h2>
		<div class="modal-dialog">
			<form method="post" action="<?php echo Router::url('virments/ajouter2'); ?>">
			  <div class="form-group">
			    <input readonly type="hidden" class="form-control" aria-describedby="emailHelp" name="ID_AVOIR_VIREMENT" value="<?php echo $idV;  ?>">
			  </div>
			  <div class="form-group">
			    <input readonly type="text" class="form-control" aria-describedby="emailHelp" value="<?php echo $nomV;  ?>">
			  </div>
			 <div class="form-group">
			    <label for="exampleInputEmail1">Montant</label>
			    <input readonly type="text" class="form-control" aria-describedby="emailHelp" name="MONTANT" value="<?php echo $montant;  ?>">
			  </div>
			  <label for="NomVacataire">Date Virement</label>
			  <div class="form-group">
				<div class='input-group date' id='datetimepicker1'>
                    <input readonly type='text' name="DATEVIREMENT" class="form-control" value="<?php  echo  date("Y-m-d H:i:s"); ?>" />
                </div>
			  <div class="form-check">
			  </div><br />
			  <button type="submit" value="" class="btn btn-primary">Valider</button>
			</form>
		</div>
	</div>
   </div>
  </div>

