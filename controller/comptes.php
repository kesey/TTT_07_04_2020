<?php

/*
 * AUTEUR: Fabien Meunier
 * PROJECT: Third_Type_Tapes
 * PATH: Third_Type_Tapes/controller/
 * NAME: comptabilites.php
 */

class Comptes extends Controller{
    var $models = array('exemplaire', 'cassette', 'admin', 'compte');

    private function ventes($who, $id){
        $model = $this->models[0];

        $d['ventes'][$who] = $this->$model->findAll(array("fields" => "SUM(prix_vente_euros) AS somme",
                                                      "conditions" => "id_vendeur = ".$id));

        $d['ventes'][$who] = $d['ventes'][$who][0];
        return $d['ventes'][$who];
    }

    private function compta($who, $id){
        $model = $this->models[0];
        $modelAdm = $this->models[2];

        $d['compta'][$who]['recupere'] = $this->$model->findAll(array("fields" => "SUM(montant_frais_de_port) AS somme",
                                                                  "conditions" => "id_vendeur = ".$id." AND frais_de_port_rembourses = 0"));

        $d['compta'][$who]['recupere'] = $d['compta'][$who]['recupere'][0];
        /*$d['compta'][$who]['doit'] = $this->$model->findAll(array("fields" => "SUM(prix_vente_euros) AS somme",
                                                              "conditions" => "id_vendeur = ".$id." AND vente_remboursee = 0 AND (montant_frais_de_port = 0 OR montant_frais_de_port IS NULL)"));*/

        // à partir du changement de comptabilité on souhaite ne pas prendre en compte les 24 premières releses
        $d['compta'][$who]['doit'] = $this->$model->findAll(array("fields" => "SUM(3) AS somme",
                                                              "conditions" => "id_vendeur = ".$id." AND vente_remboursee = 0 AND (montant_frais_de_port = 0 OR montant_frais_de_port IS NULL) AND id_cassette >= 25"));

        $d['compta'][$who]['doit'] = $d['compta'][$who]['doit'][0];

        // prise en compte des sommmes déjà remboursées
        $dejaRembourse = $this->$modelAdm->findAll(array("fields" => "a_rembourse",
                                                  "conditions" => "id_admin = ".$id));
        $d['compta'][$who]['doit']['somme'] = (float)$d['compta'][$who]['doit'][0] - (float)$dejaRembourse[0]['a_rembourse'];

        $dejaRecupere = $this->$modelAdm->findAll(array("fields" => "a_recupere",
                                                 "conditions" => "id_admin = ".$id));
        $d['compta'][$who]['recupere']['somme'] = (float)$d['compta'][$who]['recupere'][0] - (float)$dejaRecupere[0]['a_recupere'];

        return $d['compta'][$who];
    }

    public function updateCompta() {
        $modelAdm = $this->models[2];
        $model = $this->models[3];
        unset($this->data['action']);
        $this->data['combien'] = (float)$this->data['combien'];
        if ($this->$model->verifications($this->data)){
            if ($this->data['rembRec'] == "a_rembourse") {
                $dejaRembourse = $this->$modelAdm->findAll(array("fields" => "a_rembourse",
                                                          "conditions" => "id_admin = ".$this->data['id_admin']));
                $this->data['a_rembourse'] = (float)$this->data['combien'] + (float)$dejaRembourse[0]['a_rembourse'];
            } else {
                $dejaRecupere = $this->$modelAdm->findAll(array("fields" => "a_recupere",
                                                         "conditions" => "id_admin = ".$this->data['id_admin']));
                $this->data['a_recupere'] = (float)$this->data['combien'] + (float)$dejaRecupere[0]['a_recupere'];
            }
            unset($this->data['rembRec']);
            unset($this->data['combien']);
            $this->$modelAdm->save($this->data);
        };
    }

    public function index(){
        $model = $this->models[0];
        $modelCass = $this->models[1];
        $modelAdm = $this->models[2];
        $d['admins'] = $this->$modelAdm->findAll(array('fields' => 'nom, id_admin'));
        $d['adminInfos'] = $d['admins'];
        foreach ($d['admins'] as $key => $value){
            $d['admins'][$key] = $value['nom'];
            $d['ventes'][$value['nom']] = [];
            $d['compta'][$value['nom']] = [];
            /*----------------------------------------------------------------------compta & ventes individuelles----------------------------------------------------------------------------------------*/
            $d['ventes'][$value['nom']] = array_merge($d['ventes'][$value['nom']], $this->ventes($value['nom'], $value['id_admin']));
            $d['compta'][$value['nom']] = array_merge($d['compta'][$value['nom']], $this->compta($value['nom'], $value['id_admin']));
        }
        $d['dateTime'] = date("d-m-Y H:i:s");
    /*----------------------------------------------------------------------etat du stock----------------------------------------------------------------------------------------------------------------*/
        $d['stock'] = $this->$model->findAll(array("fields" => "COUNT(id_etat) AS enStock",
                                               "conditions" => "id_etat = 1"));
        $d['stock'] = $d['stock'][0];
        $d['depot'] = $this->$model->findAll(array("fields" => "COUNT(id_etat) AS enDepot",
                                               "conditions" => "id_etat = 4"));
        $d['depot'] = $d['depot'][0];
        $d['don'] = $this->$model->findAll(array("fields" => "COUNT(id_etat) AS donnes",
                                             "conditions" => "id_etat = 5"));
        $d['don'] = $d['don'][0];
        $d['noStock'] = $this->$model->findAll(array("fields" => "COUNT(id_etat) AS horsStock",
                                                 "conditions" => "id_etat = 3"));
        $d['noStock'] = $d['noStock'][0];
        $d['vendus'] = $this->$model->findAll(array("fields" => "COUNT(id_etat) AS ventes",
                                                "conditions" => "id_etat = 2"));
        $d['vendus'] = $d['vendus'][0];
    /*----------------------------------------------------------------------compta general---------------------------------------------------------------------------------------------------------------*/
        $d['infosCassettes'] = $this->$modelCass->findAll(array("fields" => "SUM(nombre_de_download) AS telechargement_total"));
        $d['infosCassettes'] = $d['infosCassettes'][0];
        $d['total'] = $this->$model->findAll(array("fields" => "SUM(prix_vente_euros) AS somme",
                                               "conditions" => "id_etat = 2"));
        $d['total'] = $d['total'][0];
        $d['due'] = $this->$model->findAll(array("fields" => "SUM(montant_frais_de_port) AS somme"));
        $d['due'] = $d['due'][0];
        $d['gainReel'] = $d['total']['somme'] - $d['due']['somme'];

        $this->set($d);
        $this->render('index');
    }
}
