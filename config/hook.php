<?php
if($this->request->prefix == '1'){
	$this->layout = 'admin'; 
	if(!$this->Session->isLogged() || $this->Session->user('role') != '1'){
		$this->redirect('personnels/login');  
	}
}
?>