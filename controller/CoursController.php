<?php 
class CoursController extends Controller{
	


	function index(){
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}
		$this->loadModel('Personnel');
		$d['personnels'] = $this->Personnel->find();
		$this->loadModel('Formation');
			$d['formations'] = $this->Formation->find();
		
				$d['p'] = $this->Session->user('NOM');;
			
				
		$this->loadModel('Cour');
		if ($this->Session->user('ROLE') == '2') {
			
			$conditions = array('Personnel.ID' => $this->Session->user('ID'));
			$d['cours'] = $this->Cour->find(array(
			'fields'     => ' Cour.ID_VALIDE_COURS,Cour.ID,Cour.LIBELLE,Cour.TYPE,Personnel.NOM as Ens,Personnel.ROLE as role ',
			'conditions' =>  $conditions,
			'join'       => array('Personnels as Personnel'=>'Personnel.id=Cour.ID_ENSEIGNE')));
		}else{
			$d['cours'] = $this->Cour->find(array(
			'fields'     => ' Cour.ID_VALIDE_COURS,Cour.ID,Cour.LIBELLE,Cour.TYPE,Personnel.NOM as Ens,Personnel.ROLE as role ',
			'join'       => array('Personnels as Personnel'=>'Personnel.id=Cour.ID_ENSEIGNE')));
		}
		
		
		$this->set($d);
	}

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

	function delete($id)
	{
		$this->loadModel('Cour');
		$this->Cour->delete($id);
		$this->Session->setFlash('Le Cours a bien été supprimé'); 
		$this->redirect('listeCours'); 
	}


}