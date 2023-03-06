<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $connection = 'mysql2';
    protected $table      = 't_ticket';
    protected $primaryKey = 'ID_Ticket';
    protected $dates      = ['DateCreation', 'DateFinTicket', 'DateTicket'];
    public $timestamps    = false;
}
