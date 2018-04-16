<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OT extends Model
{
	protected $connection = 'sqlsrv';
	protected $table = 'dbo.OT';
}
