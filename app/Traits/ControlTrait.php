<?php

namespace App\Traits;

trait ControlTrait{
    
    // Fonction de controle d'injection SQL
    public function ctrl($chaine){
        $control = [";","$","#","%","'","\"","&"];
        foreach($control as $charCtrl){
            $chaine = str_replace($charCtrl, " ", $chaine);
        }
        return $chaine;
    }
}