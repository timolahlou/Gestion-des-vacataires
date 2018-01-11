<?php
class Conf{
	
	static $debug = 1; 

	static $databases = array(

		'default' => array(
			'host'		=> 'localhost',
			'database'	=> 'gestionvacataires',
			'login'		=> 'root',
			'password'	=> ''
		)
	);


}

Router::prefix('cockpit','admin');

Router::connect('','personnels/login');
Router::connect('listePersonnes','personnels/index');
Router::connect('ajouter','personnels/ajouter');
Router::connect('listeFormations','formations/index');
Router::connect('listeVacataires','personnels/vacataires');
Router::connect('ajouter','formations/ajouter');
Router::connect('listeCours','cours/index');
Router::connect('ajouter','cours/ajouter');
Router::connect('listeContrats','contrats/index');
Router::connect('afficherContrat','contrats/index');
Router::connect('horaires','horaires/index');
Router::connect('documents','documents/index');
Router::connect('ajouterDocument','documents/ajouterDocument');
Router::connect('listeVirements','virements/listeVirements');
Router::connect('virements','virements/index');
Router::connect('virments/ajouter','virements/ajouter');
Router::connect('virments/ajouter2','virements/ajouter2');
Router::connect('cockpit','cockpit/posts/index');
Router::connect('page/:slug-:id','pages/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('blog/:slug-:id','posts/view/id:([0-9]+)/slug:([a-z0-9\-]+)');
Router::connect('blog/category/:slug','posts/category/slug:([a-z0-9\-]+)');
Router::connect('blog/*','posts/*');
