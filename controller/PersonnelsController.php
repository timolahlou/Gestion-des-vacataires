<?php 
class PersonnelsController extends Controller{
	
	/**
	* Login
	**/
	function login(){
		if($this->request->data){
			$data = $this->request->data;
			$data->password = sha1($data->password);
			$this->loadModel('Personnel'); 
			$user = $this->Personnel->findFirst(array(
				'conditions' => array('EMAIL' => $data->login,'MDP' => $data->password
			)));
			if(!empty($user)){
				$this->Session->write('Personnel',$user); 
			}
			$this->request->data->password = ''; 
		}
		if($this->Session->isLogged()){
			if($this->Session->user('ROLE') == '1'){
				$this->redirect('vacataires');
			}else{
				$this->redirect('/');
			}
		}
	}

	/**
	* Logout
	**/
	function logout(){
		unset($_SESSION['Personnel']);
		$this->Session->setFlash('Vous ête mainenant déconnecté'); 
		$this->redirect('/'); 
	}

}