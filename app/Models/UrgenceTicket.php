<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrgenceTicket extends Model
{
    protected $connection = 'mysql2';
    protected $table = 't_urgenceticket';
    protected $primaryKey = 'id_UrgenceTicket';
}
