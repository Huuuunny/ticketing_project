<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatutTicket extends Model
{
    protected $connection = 'mysql2';
    protected $table = 't_statutticket';
    protected $primaryKey = 'ID_TicketStatut';
}
