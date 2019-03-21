<?php

define( "LAYOUT_PATH" , APPLICATION_PATH . DIRECTORY_SEPARATOR . "layout");
include CLASSES_PATH . DIRECTORY_SEPARATOR . "asynchronous.class.php";


class Vue{
	
	public $ecran;
	public $block_body;
	
	public function __construct($baseControlleur){
		
		extract( $baseControlleur->modele->page );

		$asynchroneLoader = new Asyncronous();

		ob_start();
        require CONTROLLER_PATH.DIRECTORY_SEPARATOR.$name.'.php';
        require VIEW_PATH.DIRECTORY_SEPARATOR.$name.'.phtml';
		$this->block_body = ob_get_clean();

		ob_start();
		require LAYOUT_PATH.DIRECTORY_SEPARATOR."standard.phtml";
		$this->ecran = ob_get_clean();

	}
	
}
