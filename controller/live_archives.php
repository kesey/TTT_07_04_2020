<?php

/*
 * AUTEUR: Fabien Meunier
 * PROJECT: Third_Type_Tapes
 * PATH: Third_Type_Tapes/controller/
 * NAME: live_archives.php
 */

class Live_archives extends Controller{
    var $models = array('live_archive');

    // affiche la vue
    public function index(){
        $this->render('index');
    }
}
