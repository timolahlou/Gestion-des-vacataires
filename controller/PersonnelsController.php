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
				$this->redirect('listePersonnes');
			}elseif ($this->Session->user('ROLE') == '2') {
				$this->redirect('listeCours');
			}elseif ($this->Session->user('ROLE') == '3') {
				$this->redirect('virements');
			}
		}
	}
// fonction qui permet d'afficher les personnes
	function index(){
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}
		$this->loadModel('Personnel');

		if($this->Session->isLogged()){
			if($this->Session->user('ROLE') == '1' || $this->Session->user('ROLE') == '3'){

			$d['personnels'] = $this->Personnel->find();
		
				$d['p'] = $this->Session->user('NOM');
			
		$this->set($d);
			}else{
				$this->redirect('/');
			}
		}
	}
// fonction qui permet d'ajouter une personnel
	function ajouter($id = null)
	{
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}
		$d['id'] = $id;
		$role = $this->request->data->ROLE;
		if ($role == "Responsable administratif") {
			$this->request->data->ROLE = 1;
		}elseif ($role == "Vacataire") {
			$this->request->data->ROLE = 2;
		}elseif ($role == "Responsable financier") {
			$this->request->data->ROLE = 3;
		}
		if($this->request->data){
				$this->request->data->MDP = sha1($this->request->data->MDP);
				$this->loadModel('Personnel');
				$this->Personnel->save($this->request->data);
				$this->Session->setFlash('La personne a bien été ajoutée');
				$this->request->data->password = ''; 
				$this->redirect('listePersonnes'); 
		}elseif($id){
			$this->request->data = $this->Personnel->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$d['id'] = $id; 
		$this->set($d);
	}

// fonction qui permet de supprimer une personnel
	function delete($id)
	{
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}
		$this->loadModel('Personnel');
		$this->Personnel->delete($id);
		$this->Session->setFlash('La Personne a bien été supprimée'); 
		$this->redirect('listePersonnes'); 
	}

	function edit($id){
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}
		$this->loadModel('Personnel');

		$d['personnels'] = $this->Personnel->find();
		$conditions = array('ID' => $id);
		$d['pers'] = $this->Personnel->findFirst(array(
			'conditions'     => $conditions
		));
		if($this->Session->user('ROLE') == '1'){
				$d['p'] = "Responsable administratif";
			}elseif ($this->Session->user('ROLE') == '2') {
				$d['p'] = "Vacataire";
			}elseif ($this->Session->user('ROLE') == '3') {
				$d['p'] = "Responsable financier";
			}
		$d['id'] = $id; 
		if($this->request->data){
			$role = $this->request->data->ROLE;
			if ($role == "Responsable administratif") {
				$this->request->data->ROLE = 1;
			}elseif ($role == "Vacataire") {
				$this->request->data->ROLE = 2;
			}elseif ($role == "Responsable financier") {
				$this->request->data->ROLE = 3;
			}
			$this->request->data->MDP = sha1($this->request->data->MDP);
				$this->Personnel->save($this->request->data);
				$this->Session->setFlash('Le contenu a bien été modifié'); 
				$this->redirect('listePersonnes'); 
		}else{
			$this->request->data = $this->Personnel->findFirst(array(
				'conditions' => array('ID'=>$id)
			));
		}
		$this->set($d);
	}

	function vacataires()
	{
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}

		$this->loadModel('Personnel');
		$conditions = array('ROLE'=> '2');
		$d['personnels'] = $this->Personnel->find(array('conditions' => $conditions));
		$d['p'] = $this->Session->user('NOM');
		if($this->Session->user('ROLE') == '1'){
			$d['p'] = $this->Session->user('NOM');
		}
		$this->set($d);
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