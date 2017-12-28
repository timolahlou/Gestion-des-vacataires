<?php 
class HorairesController extends Controller{
	
	function index(){
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}
		$this->loadModel('Personnel');
		$d['personnels'] = $this->Personnel->find();
		if($this->Session->user('ROLE') == '1'){
				$d['p'] = "Responsable administratif";
			}elseif ($this->Session->user('ROLE') == '2') {
				$d['p'] = "Vacataire";
			}elseif ($this->Session->user('ROLE') == '3') {
				$d['p'] = "Responsable financier";
			}

		$this->loadModel("Horaire");
		$d['horaires'] = $this->Horaire->find(array(
			'fields'     => ' Horaire.ID,Horaire.DATEHORAIRE,Horaire.DUREE,Horaire.SALLE,Cour.LIBELLE,Cour.TYPE',
			'join'       => array('Cours as Cour'=>'Cour.id=Horaire.ID_PLANIFIE')
		));
		$this->set($d);
	}
}