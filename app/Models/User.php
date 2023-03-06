<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    protected $connection = 'mysql';
    protected $table = 't_log_util';

}
