<?php

define('HELPER_CLASS', APPLICATION_PATH . DIRECTORY_SEPARATOR . "helper/class");
define('HELPER_ACTION', APPLICATION_PATH . DIRECTORY_SEPARATOR . "helper/action");

include HELPER_CLASS . DIRECTORY_SEPARATOR . "historique.class.php";
include HELPER_CLASS . DIRECTORY_SEPARATOR . "trash.class.php";

Class Logger
{
    public static function serializerData(Array $array){
        $newtab = array();
        foreach($array as $key => $value){
            $newtab[$key] = base64_encode($value);
        }

        //return base64_encode(json_encode($newtab));
        return base64_encode(serialize($newtab));
    }

    public static function deserializerData($string){
        //$tab = json_decode(base64_decode($string));
        $tab = unserialize(base64_decode($string));
        $newtab = array();
        foreach($tab as $key => $value){
            $newtab[$key] = addslashes(utf8_encode(base64_decode($value)));
        }
        return $newtab;

    }

}