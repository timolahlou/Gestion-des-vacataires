<?php 
class ContratsController extends Controller{


		function index()
		{
			if(!$this->Session->user('ROLE'))
			{
				$this->redirect('personnels/login');
			}
			if($this->Session->user('ROLE') == '1'){
					$d['p'] = "Responsable administratif";
				}elseif ($this->Session->user('ROLE') == '2') {
					$d['p'] = "Vacataire";
				}elseif ($this->Session->user('ROLE') == '3') {
					$d['p'] = "Responsable financier";
				}

				$this->loadModel('Personnel');
				$conditions = array('ROLE' => '2');
				$d['personnels'] = $this->Personnel->find(array(
						'conditions' => $conditions
				));
				$this->loadModel('Contrat');
				$d['contrats'] = $this->Contrat->find(array(
				'fields'     => ' Personnel.NOM as nomV',
				'join'       => array('Personnels as Personnel'=>'Personnel.id=Contrat.ID_SIGNE')
				));
			$this->set($d);
		}

		function ajouter($id = null)
		{
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

}