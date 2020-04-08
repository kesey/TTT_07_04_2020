<?php

/*
 * AUTEUR: Fabien Meunier
 * PROJECT: Third_Type_Tapes
 * PATH: Third_Type_Tapes/model/
 * NAME: compte.php
 */

class Compte extends Model{
    public $id;

   /**
    *  vérifie la/les donnée(s) passée(s) en argument
    *  @param array $data donnée(s) à vérifier
    **/
    public function verifications($data) {
        $isOk = TRUE;
        if(empty($data["combien"])){
            $_SESSION["info"] = "Veuillez renseigner un montant";
            $isOk = FALSE;
        }
        if(!$this->isPosDec($data["combien"])){
            $_SESSION["info"] = "Le montant renseigné est invalide";
            $isOk = FALSE;
        }
        return $isOk;
    }
}
