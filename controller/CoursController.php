<?php 
class CoursController extends Controller{
	


	function index(){
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}
		$this->loadModel('Personnel');
		$d['personnels'] = $this->Personnel->find();
		$this->loadModel('Cour');
		$d['cours'] = $this->Cour->find(array(
			'fields'     => ' Cour.ID_VALIDE_COURS,Cour.ID,Cour.LIBELLE,Cour.TYPE,Personnel.NOM as Ens',
			'join'       => array('Personnels as Personnel'=>'Personnel.id=Cour.ID_VALIDE_COURS')));
		if($this->Session->user('ROLE') == '1'){
				$d['p'] = "Responsable administratif";
			}elseif ($this->Session->user('ROLE') == '2') {
				$d['p'] = "Vacataire";
			}elseif ($this->Session->user('ROLE') == '3') {
				$d['p'] = "Responsable financier";
			}
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