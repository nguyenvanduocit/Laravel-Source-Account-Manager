<?php

namespace App;

use Zizaco\Entrust\EntrustRole;
use Zizaco\Entrust\Traits\EntrustRoleTrait;

class Role extends EntrustRole
{
	use EntrustRoleTrait;
	public function scopeAdministrator($query){
		return $query->where('name', '=', 'administrator');
	}
}
