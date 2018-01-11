<?php 
class ContratsController extends Controller{


		function index()
		{
			if(!$this->Session->user('ROLE'))
			{
				$this->redirect('personnels/login');
			}
			$d['p'] = $this->Session->user('NOM');

				$this->loadModel('Personnel');
				$conditions = array('ROLE' => '2');
				$d['personnels'] = $this->Personnel->find(array(
						'conditions' => $conditions
				));
				$this->loadModel('Contrat');
				$d['contrats'] = $this->Contrat->find(array(
				'fields'     => ' Personnel.ID,Personnel.NOM as nomV',
				'join'       => array('Personnels as Personnel'=>'Personnel.id=Contrat.ID_SIGNE')
				));
				if ($this->request->data) {

					$idV =  $this->request->data->idV;
					$condition = array('ID_SIGNE' => $idV);
					$d['contrat'] = $this->Contrat->findFirst(array(
					'fields'     => ' Contrat.PrixTP,Contrat.PrixTD,Contrat.PrixCM,Personnel.NOM as nomV',
					'conditions' => $condition,
					'join'       => array('Personnels as Personnel'=>'Personnel.id=Contrat.ID_SIGNE')
					));
				}
				
			$this->set($d);
		}

		function ajouter($id = null)
		{
			if(!$this->Session->user('ROLE'))
			{
				$this->redirect('personnels/login');
			}
			$d['id'] = $id;
			if($this->request->data){
					$this->loadModel('Contrat');
					$this->Contrat->save($this->request->data);
					$this->Session->setFlash('Le contrat a bien été ajouté');
					$this->redirect('listeContrats'); 
			}elseif($id){
				$this->request->data = $this->Contrat->findFirst(array(
					'conditions' => array('id'=>$id)
				));
			}
			$d['id'] = $id; 
			$this->set($d);
		}

		function afficherContrat()
		{
			if(!$this->Session->user('ROLE'))
			{
				$this->redirect('personnels/login');
			}
			$this->loadModel('Personnel');

			$d['personnels'] = $this->Personnel->find();
					$d['p'] = $this->Session->user('NOM');
				
				$idV =  $this->request->data->idV;
				$conditions = array('ID_SIGNE' => $idV);
				$this->loadModel('Contrat');
				$d['contrat'] = $this->Contrat->findFirst(array(
				'fields'     => ' Contrat.ID,Contrat.PrixTP,Contrat.PrixTD,Contrat.PrixCM,Personnel.NOM as nomV',
				'conditions' => $conditions,
				'join'       => array('Personnels as Personnel'=>'Personnel.id=Contrat.ID_SIGNE')
				));
			$this->set($d);
		}

		function delete($id)
		{
			if(!$this->Session->user('ROLE'))
			{
				$this->redirect('personnels/login');
			}
			$this->loadModel('Contrat');
			$this->Contrat->delete($id);
			$this->Session->setFlash('Le Contrat a bien été supprimé'); 
			$this->redirect('listeContrats'); 
		}

}