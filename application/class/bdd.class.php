<?php

include CLASSES_PATH . DIRECTORY_SEPARATOR . "caracter.class.php";

class Bdd
{
    public $bdd;

    public function __construct($bdd = 'fiches3')
    {
        switch ($bdd) {
            case 'fiches3':
                $this->bdd = new PDO(DSN_FICHES, USER_FICHES, PASS_FICHES);
                break;
            case 'abitop':
                $this->bdd = new PDO(DSN_ABITOP, USER_ABITOP, PASS_ABITOP);
                break;
            default:
                $this->bdd = new PDO(DSN_FICHES, USER_FICHES, PASS_FICHES);
        }
    }

    public function faireUneRequete($sql)
    {
        try {
            $req = $this->bdd->query($sql, PDO::FETCH_ASSOC);
        }
        catch (PDOException $e){
            echo $e->getMessage();
            die();
        }
        return $req;
    }

    public function creerTableau($res)
    {

        $tab = array();
        foreach ($res as $key => $row) {
            if (is_string($row)) {
                $row = Caracter::normalise_ChaineDeCaracteresDownload($row);
            }
            $tab[$key] = $row;
        }
        return $tab;
    }

    public function __destruct(){
        $this->bdd = NULL;
    }
}