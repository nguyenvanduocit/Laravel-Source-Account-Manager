<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
	use SoftDeletes;

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['deleted_at'];
	protected $fillable = [
		'username', 'password', 'user_id', 'game_id'
	];
	public function game(){
		return $this->belongsTo('App\Game');
	}
	public function user(){
		return $this->belongsTo('App\User');
	}
	public static function boot(){
		parent::boot();
		static::deleted(function ($account) {
			$suser = Suser::where('account_id','=', $account->id)->first();
			if($suser){
				$suser->delete();
			}
		});
		static::saved(function ($account) {
			$suser = Suser::where('account_id','=', $account->id)->first();
			if(!$suser){
				$suser = new Suser();
				$suser->account_id = $account->id;
			}
			$suser->authtype = 'name';
			$suser->identity = $account->username;
			$suser->password = $account->password;
			$suser->flags = 't';
			$suser->name = '';
			$suser->immunity = 0;
			$suser->save();

		});
	}
}
