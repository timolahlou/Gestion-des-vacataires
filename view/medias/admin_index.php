<table>
	<thead>
		<tr>
			<th></th>
			<th>Titre</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($images as $k => $v): ?>
			<tr>
				<td>
					<a href="#" onclick="FileBrowserDialogue.sendURL('<?php echo Router::webroot('img/'.$v->file); ?>')">
						<img src="<?php echo Router::webroot('img/'.$v->file); ?>" height="50">
					</a>
				</td>
				<td><?php echo $v->name; ?></td>
				<td>
					<a onclick="return confirm('Voulez vous vraiment supprimer cette image'); " href="<?php echo Router::url('admin/medias/delete/'.$v->id); ?>">Supprimer</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<div class="page-header">
	<h1>Ajouter une image</h1>
</div>

<form action="<?php echo Router::url('admin/medias/index/'.$post_id); ?>" method="post" enctype="multipart/form-data">
	<?php echo $this->Form->input('file','Image',array('type'=>'file')); ?>
	<?php echo $this->Form->input('name','Titre'); ?>
	<div class="actions">
		<input type="submit" value="Envoyer" class="btn primary">
	</div>
</form>

<script type="text/javascript" src="<?php echo Router::webroot('js/tinymce/tiny_mce_popup.js'); ?>"></script>

<script type="text/javascript">
	var FileBrowserDialogue = {
	    init : function () {
	        // Here goes your code for setting your custom things onLoad.
	    },
	    sendURL : function (URL) {
	        var win = tinyMCEPopup.getWindowArg("window");

	        // insert information now
	        win.document.getElementById(tinyMCEPopup.getWindowArg("input")).value = URL;

	        // are we an image browser
	        if (typeof(win.ImageDialog) != "undefined") {
	            // we are, so update image dimensions...
	            if (win.ImageDialog.getImageData)
	                win.ImageDialog.getImageData();

	            // ... and preview if necessary
	            if (win.ImageDialog.showPreviewImage)
	                win.ImageDialog.showPreviewImage(URL);
	        }

	        // close popup window
	        tinyMCEPopup.close();
	    }
	}

	tinyMCEPopup.onInit.add(FileBrowserDialogue.init, FileBrowserDialogue);
</script>