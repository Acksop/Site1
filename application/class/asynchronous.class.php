<?php

class Asyncronous{

    private $css;
    private $javascript;

    public function __construct()
    {
        $this->css = "";
        $this->javascript = "";
    }

    public function addCss($code){
        $this->css .= "\n";
        $this->css .= $code;
    }

    public function addJs($code){
        $this->javascript .= "\n";
        $this->javascript .= $code;
    }

    public function printCss(){
        echo $this->css;
    }

    public function printJs(){
        echo $this->javascript;
    }

}