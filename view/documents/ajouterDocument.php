<?php if ($this->Session->user('ROLE')=='2') {
        include "../view/layout/head-vacataire.php";
}else{
        include "../view/layout/head.php"; 
} ?>
<div class="container">
	<h1>Ajouter un document</h1><br/>
	<div class="row">
		<div class="col-md-6">
			<div class="modal-body">
       <form action="<?php echo Router::url('/documents/ajouterDocument'); ?>" method="post" enctype="multipart/form-data">
		<?php echo $this->Form->input('file','Document',array('type'=>'file')); ?>
		<?php echo $this->Form->input('name','Libelle document',array('class'=>'form-group')); ?>
		<div class="actions">
			<input type="submit" value="Envoyer" class="btn primary">
		</div>
	   </form>
	</div>
</div>
</div>
</div>
</body>
</html>
