<?php 
class VirementsController extends Controller{
	
	// fonction qui permet d'afficher les virements
	function index(){
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}elseif($this->Session->user('ROLE') == '3'){
		$this->loadModel("Horaire");
		$d['horaires'] = $this->Horaire->find(array(
			'fields'     => ' Horaire.ID,Horaire.DATEHORAIRE,Horaire.ETATHORAIRE,Horaire.DUREE,Horaire.SALLE,Cour.ID as idCours,Cour.LIBELLE,Cour.TYPE,Personnel.ID as idVacataire,Personnel.NOM,Personnel.EMAIL,Formation.LIBELLEFORMATION',
			'conditions' => array('Horaire.ETATHORAIRE' => 1),
			'join'       => array('Cours as Cour'=>'Cour.id=Horaire.ID_PLANIFIE', 'Personnels as Personnel' => 'Cour.ID_ENSEIGNE=Personnel.id','Formations as Formation' => 'Cour.ID_APPARTIENT=Formation.id'
			)));
		$d['p'] = $this->Session->user('NOM');
		$this->set($d);
		}else{
			$this->redirect('/');
		}
	}

// fonction qui permet d'ajouter un virement
	function ajouter($id = null)
	{
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}elseif ($this->Session->user('ROLE') == '3') {

		
	
				$idV = $this->request->data->idVacataire;
				$this->loadModel("Horaire");
				$d['horaires'] = $this->Horaire->find(array(
					'fields'     => ' Horaire.ID,Horaire.DATEHORAIRE,Horaire.DUREE,Cour.ID as idCours,Cour.TYPE,Personnel.ID as idVacataire,Personnel.NOM,Personnel.EMAIL,Contrat.PRIXTD,Contrat.PRIXCM,Contrat.PRIXTP',
					'conditions' => array('Horaire.ETATHORAIRE' => 1, 'Personnel.ID' => $idV),
					'join'       => array('Cours as Cour'=>'Cour.id=Horaire.ID_PLANIFIE', 'Personnels as Personnel' => 'Cour.ID_ENSEIGNE=Personnel.id','Contrats as Contrat' => 'Contrat.ID_SIGNE=Personnel.ID'
					)));
				$d['p'] = $this->Session->user('NOM');
				$this->set($d);
		}else{
			$this->redirect('/');
		}
	}

	function ajouter2()
	{
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}elseif ($this->Session->user('ROLE') == '3') {
			$this->request->data->ID_VALIDE_VIREMENT = $this->Session->user('ID');
			$this->request->data->ETATVIREMENT = '1';
			$this->loadModel('Virement');
			$this->Virement->save($this->request->data);
			$this->Session->setFlash('Le virement a bien été effectué');
			$this->redirect('listeVirements'); 
		}else{
			$this->redirect('/');
		}	
	}

	function listeVirements()
	{
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}elseif ($this->Session->user('ROLE') == '3') {
			$d['p'] = $this->Session->user('NOM');
			$this->loadModel("Virement");
			$d['virements'] = $this->Virement->find(array(
					'fields'     => ' Virement.MONTANT,Virement.DATEVIREMENT,Virement.ETATVIREMENT,Personnel.ID as idVacataire,Personnel.NOM,Personnel.EMAIL',
					'join'       => array('Personnels as Personnel' => 'Virement.ID_AVOIR_VIREMENT=Personnel.id'
					)));
			$this->set($d);
		}else{
			$this->redirect('/');
		}	
	}
// fonction qui permet de supprimer un virement
	function delete($id)
	{
		if(!$this->Session->user('ROLE'))
		{
			$this->redirect('personnels/login');
		}
		$this->loadModel('Horaire');
		$this->Horaire->delete($id);
		$this->Session->setFlash('horaire a bien été supprimé'); 
		$this->redirect('horaires'); 
	}

// fonction qui permet de modifier un virement
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