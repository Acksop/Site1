<?php

namespace MVC\Classe;

define( "LAYOUT_PATH" , APPLICATION_PATH . DIRECTORY_SEPARATOR . "layout");
include CLASSES_PATH . DIRECTORY_SEPARATOR . "asynchronous.class.php";


class Vue{
	
	public $ecran;
	public $block_body;
	
	public function __construct($baseControlleur){
		
		//Extraction des variables de la page
		extract( $baseControlleur->modele->page );
		//Extraction des variables provenant de l'url
		extract( $urlParams );

<<<<<<< HEAD:application/class/vue.class.php
		$asynchroneLoader = new Asyncronous();

=======
		//Mise en tampon du block de contenu
>>>>>>> nude-composer:application/class/Vue.php
		ob_start();
        require CONTROLLER_PATH.DIRECTORY_SEPARATOR.$name.'.php';
        require VIEW_PATH.DIRECTORY_SEPARATOR.$name.'.phtml';
		$this->block_body = ob_get_clean();

		//Mise en tampon du contenu html
		ob_start();
		require LAYOUT_PATH.DIRECTORY_SEPARATOR.$layout.".phtml";
		$this->ecran = ob_get_clean();

	}
	
}
