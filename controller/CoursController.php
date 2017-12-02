<?php 
class CoursController extends Controller{
	


	function dashboard(){
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}

		$this->loadModel('Personnel');

		$condition = array('ROLE' => 1); 
		$d['personnels'] = $this->Personnel->findFirst(array(
			'conditions' => $condition
		));
		$this->set($d);
	}

	function listeCours(){
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}
		$this->loadModel('Personnel');

		$condition = array('ROLE' => 1); 
		$d['personnels'] = $this->Personnel->findFirst(array(
			'conditions' => $condition
		));
		$this->set($d);
	}


}