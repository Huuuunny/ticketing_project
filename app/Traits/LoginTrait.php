<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use App\Traits\ControlTrait;
use App\Models\Ticket;
use App\Models\User;

trait LoginTrait{

    use ControlTrait;

    public function auth($userID)
    {
        $id = $this->ctrl($userID);

        // Requète récupérant l'automenu10 qui valide ou non l'acces a l'application
        $query = DB::table('t_salarie')
            ->select('automenu10')
            ->join('t_log_util', 't_salarie.CodeSal' ,'=', 't_log_util.Util')
            ->where('t_log_util.id',  $id)
            ->get();

        // Test pour savoir si la requète est vide ou non    
        $rowCount = $query->count();
        if($rowCount === 0){
            abort(403);
            die();
        }
        
        // Récupération du 5eme bit de l'automenu 10
        // si il est égal a 1 l'utilisateur à les droits
        // sinon accès non autorisé
        $queryAutoM10 = explode(":", $query);
        $autoM10 = str_split($queryAutoM10[1]);
        if($autoM10[6] === "1"){
            return;
        }
        abort(403);
    }
}