<?php

namespace MVC\Classe;
Class Controlleur{
	
	public $modele;
	public $vue;
	
	public function __construct($application){

	    if($application->url->page['control']){
            $url_params = $application->url->page['params'];
	        require TRAITEMENT_PATH . DIRECTORY_SEPARATOR . $application->url->page['name'] . '.php';
        } else {
            $this->modele = new modele($application->url->page);
            $this->vue = new vue($this);
        }
	}
	
}
