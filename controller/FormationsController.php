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
			if($this->Session->isLogged()){
			if($this->Session->user('ROLE') == '1'){

				$this->loadModel('Formation');
				$d['formations'] = $this->Formation->find(array(
				'fields'     => ' Formation.ID,LIBELLEFORMATION,Personnel.ID as idD,Personnel.NOM as nomD,Personnel.PRENOM as nomS',
				'join'       => array('Personnels as Personnel'=>'Personnel.id=Formation.ID_DIRIGE')
				));
				$d['supervise'] = $this->Formation->find(array(
				'fields'     => ' Personnel.ID as idS,Personnel.NOM as nomS',
				'join'       => array('Personnels as Personnel'=>'Personnel.id=Formation.ID_SUPERVISE')
				));
				$this->set($d);
			}else{
				$this->redirect('/');
			}
		}
	}

	function ajouter($id = null)
	{
		var_dump($this->request);
		if($this->request->data){
				$this->loadModel('Formation');
				$this->Formation->save($this->request->data);
				$this->Session->setFlash('La Formation a bien été ajoutée');
				$this->request->data->password = ''; 
				$this->redirect('listeFormations'); 
		}elseif($id){
			$this->request->data = $this->Formation->findFirst(array(
				'conditions' => array('id'=>$id)
			));
		}
		$d['id'] = $id; 
		$this->set($d);
	}

	function delete($id)
	{
		$this->loadModel('Formation');
		$this->Formation->delete($id);
		$this->Session->setFlash('La Formation a bien été supprimée'); 
		$this->redirect('listeFormations'); 
	}


}