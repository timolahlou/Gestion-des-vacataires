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
		$this->loadModel("Cour");
		$d['cours'] = $this->Cour->find();
		$this->loadModel("Horaire");
		if($this->Session->user('ROLE') == '2')
		{
			$conditions = array('Personnel.ID' => $this->Session->user('ID'));
			$d['horaires'] = $this->Horaire->find(array(
			'fields'     => ' Horaire.ID,Horaire.DATEHORAIRE,Horaire.ETATHORAIRE,Horaire.DUREE,Horaire.SALLE,Cour.ID as idCours,Cour.LIBELLE,Cour.TYPE,Personnel.NOM,Formation.LIBELLEFORMATION',
			'conditions' => $conditions,
			'join'       => array('Cours as Cour'=>'Cour.id=Horaire.ID_PLANIFIE', 'Personnels as Personnel' => 'Cour.ID_ENSEIGNE=Personnel.id','Formations as Formation' => 'Cour.ID_APPARTIENT=Formation.id'
			)));
		}else{
			$d['horaires'] = $this->Horaire->find(array(
			'fields'     => ' Horaire.ID,Horaire.DATEHORAIRE,Horaire.ETATHORAIRE,Horaire.DUREE,Horaire.SALLE,Cour.ID as idCours,Cour.LIBELLE,Cour.TYPE,Personnel.NOM,Formation.LIBELLEFORMATION',
			'join'       => array('Cours as Cour'=>'Cour.id=Horaire.ID_PLANIFIE', 'Personnels as Personnel' => 'Cour.ID_ENSEIGNE=Personnel.id','Formations as Formation' => 'Cour.ID_APPARTIENT=Formation.id'
			)));
		}
		
		$this->set($d);
	}

	function ajouter($id = null)
	{
		$d['id'] = $id;
		if($this->request->data){
				$this->loadModel('Horaire');
				$this->Horaire->save($this->request->data);
				$this->Session->setFlash('horaire a bien été ajouté');
				$this->redirect('horaires'); 
		}elseif($id){
			$this->request->data = $this->Horaire->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$d['id'] = $id; 
		$this->set($d);
	}

	function delete($id)
	{
		$this->loadModel('Horaire');
		$this->Horaire->delete($id);
		$this->Session->setFlash('horaire a bien été supprimé'); 
		$this->redirect('horaires'); 
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
}