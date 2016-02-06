<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
	protected $updateRoles = [
		'name'=>'required',
		'email'=>'required|unique:users,email',
		'facebook_id'=>'required|unique:users,facebook_id',
		'roles'=>'required|exists:roles,id'
	];
	public function index(){
		$users  = User::with('roles')->paginate(10);
		return view('admin.user.index', ['users' => $users]);
	}
	public function edit($userId){
		$user = User::with('roles')->findOrFail($userId);
		$userRoleIds = $user->roles->modelKeys();
		$roles = Role::whereNotIn('id', $userRoleIds)->get();
		return view('admin.user.edit', ['user'=>$user, 'roles'=>$roles]);
	}
	public function create(){
		return view('admin.user.create');
	}
	public function destroy($userId){
		$user = User::findOrFail($userId);
		$isForce = Input::get('forceDelete');
		if(isset($isForce) && $isForce =='true')
		{
			$user->forceDelete();
		}
		else{
			$user->delete();
		}
		return Redirect::to(route('admin.user.index', $user->id));
	}
	public function store(){

	}
	public function update($userId){
		$updateRoles = $this->updateRoles;
		$updateRoles['email'] .=','.$userId;
		$updateRoles['facebook_id'] .=','.$userId;

		$validator = Validator::make(Input::all(), $updateRoles);
		if($validator->fails()){
			return Redirect::back()
			               ->withErrors( $validator )
			               ->withInput();
		}
		$user = User::findOrFail($userId);
		if(Input::has('password')){
			$user->password = bcrypt(Input::get('password'));
		}
		$user->email = Input::get('email');
		$user->facebook_id = Input::get('facebook_id');
		$roles = Input::get('roles');
		$user->roles()->sync($roles);
		$user->save();
		return Redirect::back();
	}
	public function show($userId){
		$user = User::findOrFail($userId);
		$games = $user->accounts()->withTrashed()->join('games', 'accounts.game_id', '=', 'games.id')->paginate(10, ['accounts.id as account_id', 'accounts.username','accounts.password', 'games.id as game_id', 'games.name', 'games.description']);

		return view('admin.user.profile', ['user'=>$user, 'games'=>$games]);
	}
}
