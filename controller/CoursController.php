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
		if($this->Session->user('ROLE') == '1'){
				$d['p'] = "Responsable administratif";
			}elseif ($this->Session->user('ROLE') == '2') {
				$d['p'] = "Vacataire";
			}elseif ($this->Session->user('ROLE') == '3') {
				$d['p'] = "Responsable financier";
			}
				
		$this->loadModel('Cour');
		if ($this->Session->user('ROLE') == '2') {
			$conditions = array('Personnel.ROLE' => '2');
			$d['cours'] = $this->Cour->find(array(
			'fields'     => ' Cour.ETATCOURS,Cour.ID_VALIDE_COURS,Cour.ID,Cour.LIBELLE,Cour.TYPE,Personnel.NOM as Ens,Personnel.ROLE as role ',
			'conditions' =>  $conditions,
			'join'       => array('Personnels as Personnel'=>'Personnel.id=Cour.ID_ENSEIGNE')));
		}else{
			$d['cours'] = $this->Cour->find(array(
			'fields'     => ' Cour.ETATCOURS,Cour.ID_VALIDE_COURS,Cour.ID,Cour.LIBELLE,Cour.TYPE,Personnel.NOM as Ens,Personnel.ROLE as role ',
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