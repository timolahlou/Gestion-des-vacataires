<?php 
class FormationsController extends Controller{
	


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
			
			$this->loadModel('Formation');
			$d['formations'] = $this->Formation->find(array(
			'fields'     => ' LIBELLEFORMATION,Personnel.NOM as nomD,Personnel.PRENOM as nomS',
			'join'       => array('Personnels as Personnel'=>'Personnel.id=Formation.ID_DIRIGE')
		));
		$this->set($d);
	}


}