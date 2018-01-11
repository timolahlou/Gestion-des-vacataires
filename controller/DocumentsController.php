<?php 
class DocumentsController extends Controller{
	


	// fonction qui permet d'afficher les documents
	function index(){
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}
		$d['p'] = $this->Session->user('NOM');;
		$this->set($d);
	}

	// fonction qui permet d'jouter un document
	function ajouterDocument()
	{
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}
		$d['p'] = $this->Session->user('NOM');
		$this->loadModel('Cour');
		$d['cours'] = $this->Cour->find();

		$this->loadModel('Document');
		if($this->request->data ){
			//&& !empty($_FILES['file']['name'])
			var_dump($_FILES['file']['LIBELLEDOCUMENT']);
			die();
			if(strpos($_FILES['file']['type'], 'image') !== false){
				$dir = WEBROOT.DS.'img'.DS.date('Y-m');
				if(!file_exists($dir)) mkdir($dir,0777); 
				move_uploaded_file($_FILES['file']['tmp_name'],$dir.DS.$_FILES['file']['name']);
				$this->Media->save(array(
					'name' => $this->request->data->name,
					'file' => date('Y-m').'/'.$_FILES['file']['name'],
					'post_id' => $id,
					'type' => 'img'
				));
				$this->Session->setFlash("L'image a bien été uploadé");
			}else{
				$this->Form->errors['file'] = "Le fichier n'est pas une image";
			}
		}
		$this->set($d);
	}
	// fonction qui permet de supprimer un document
	function delete($id)
	{
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}
		$this->loadModel('Cour');
		$this->Cour->delete($id);
		$this->Session->setFlash('Le Cours a bien été supprimé'); 
		$this->redirect('listeCours'); 
	}


}