<?php 
class DocumentsController extends Controller{
	


	// fonction qui permet d'afficher les documents
	function index(){
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}
		$d['p'] = $this->Session->user('NOM');
		$this->loadModel('Document');
		$d['images'] = $this->Document->find(); 
		$this->set($d);
	}

	// fonction qui permet d'jouter un document
	function ajouterDocument()
	{
		$this->loadModel('Document');
		if($this->request->data && !empty($_FILES['file']['name'])){
			
			if(strpos($_FILES['file']['type'], 'image') !== false){
				$dir = WEBROOT.DS.'images'.DS.date('Y-m');
				if(!file_exists($dir)) mkdir($dir,0777); 
				move_uploaded_file($_FILES['file']['tmp_name'],$dir.DS.$_FILES['file']['name']);
				$this->Document->save(array(
					'LIBELLEDOCUMENT' => $this->request->data->name,
					'URL' => date('Y-m').'/'.$_FILES['file']['name'],
					'ID_VALIDE_DOC' => $this->Session->user('ID')
				));
				$this->Session->setFlash("L'image a bien été uploadé");
			}else{
				$this->Form->errors['file'] = "Le fichier n'est pas une image";
			}
		}
		$this->layout = 'modal';
		$d['images'] = $this->Document->find(); 
		$d['p'] = $this->Session->user('NOM');;
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