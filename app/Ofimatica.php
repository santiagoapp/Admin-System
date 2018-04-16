<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ofimatica extends Model
{
    protected $connection = 'sqlsrv';
	protected $table = 'dbo.OT';
}
