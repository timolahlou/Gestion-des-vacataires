<?php 
class DocumentsController extends Controller{
	


	// fonction qui permet d'afficher les cours
	function index(){
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}
		$d['p'] = $this->Session->user('NOM');;
		$this->set($d);
	}

	// fonction qui permet d'jouter un cours
	function ajouter($id = null)
	{
		$d['id'] = $id;
		if($this->request->data){
				$this->loadModel('Cour');
				$this->Cour->save($this->request->data);
				$this->Session->setFlash('Le cours a bien été ajouté');
				$this->request->data->password = ''; 
				$this->redirect('listeCours'); 
		}elseif($id){
			$this->request->data = $this->Personnel->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$d['id'] = $id; 
		$this->set($d);
	}
	// fonction qui permet de supprimer un cours
	function delete($id)
	{
		$this->loadModel('Cour');
		$this->Cour->delete($id);
		$this->Session->setFlash('Le Cours a bien été supprimé'); 
		$this->redirect('listeCours'); 
	}


}