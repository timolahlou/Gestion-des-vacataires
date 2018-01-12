<?php if ($p == "Vacataire") {
        include "../view/layout/head-vacataire.php";
}else{
        include "../view/layout/head.php"; 
} ?>

	<div class="container">
	<h1>Ajouter un document</h1><br/>
	<div class="row">

        <div class="col-md-3">
       <form action="<?php echo Router::url('/documents/ajouterDocument'); ?>" method="post" enctype="multipart/form-data">
		<?php echo $this->Form->input('file','Image',array('type'=>'file')); ?>
		<?php echo $this->Form->input('name','Titre'); ?>
		<div class="actions">
			<input type="submit" value="Envoyer" class="btn primary">
		</div>
	   </form>
		<br/>

        </div>
	</div>
</div>
</body>
</html>
