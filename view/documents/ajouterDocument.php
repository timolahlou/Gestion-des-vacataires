<?php if ($p == "Vacataire") {
        include "../view/layout/head-vacataire.php";
}else{
        include "../view/layout/head.php"; 
} ?>

	<div class="container">
	<h1>Ajouter un document</h1><br/>
	<div class="row">

        <div class="col-md-3">
        <form method="post" action="<?php echo Router::url('/documents/ajouterDocument'); ?>">
		 
		 <div class="form-group">
			<select name="ID_DOC_COURS" class="selectpicker form-control " data-show-subtext="true" data-live-search="true">
				<?php   foreach ($cours as $c) {  ?>
                  <option value="<?php  echo $c->ID;   ?>"><?php  echo $c->LIBELLE;   ?></option>
                <?php   }   ?>  
            </select>
				        </div>
		  <div class="form-group">
			<label for="libelle">Libelle document</label>
			<input name="LIBELLEDOCUMENT" type="text" class="form-control" id="LIBELLEDOCUMENT" placeholder="Libelle">
		  </div>
		    <div class="form-group">
				<label for="file">Document</label>
				<input name="file" type="file" class="form-control-file" id="file">
			</div>
		  <button type="submit" class="btn btn-primary">Ajouter</button>
		</form>
		<br/>

        </div>
	</div>
</div>
</body>
</html>
