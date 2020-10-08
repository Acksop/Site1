<?php

namespace MVC\Classe;
class Application
{
	public $url;
	
	public function __construct(){
		$this->url = new Url();
	}

	public function launch(){

		$controlleur = new Controlleur($this);
		if(!$this->url->page['control']) {
			//on affiche la page si ce n'est pas un traitement
            print($controlleur->vue->ecran);
        }
	}
	
}
