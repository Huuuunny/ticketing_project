<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeTicket extends Model
{
    protected $connection = 'mysql2';
    protected $table = 't_typeticket';
    protected $primaryKey = 'ID_TypeTicket';
}