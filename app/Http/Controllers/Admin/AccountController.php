<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\Game;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Validator;

class AccountController extends Controller
{
	protected $rules = [
		'username' =>['required','regex:/^[a-z0-9_-]*$/i','unique:accounts,username'],
		'password' =>'required',
		'game_id' =>'required|exists:games,id',
		'user_id' =>'required|exists:users,id',
	];
	public function __construct() {
		$this->middleware('auth');
	}

	public function index(){
		$accounts = Account::with(['user', 'game'])->withTrashed()->paginate(20);
		return view('admin.account.index', ['accounts'=>$accounts]);
	}
	public function show($accountId){
		$account = Account::findOrFail($accountId);
		return view('admin.account.show', ['account' => $account]);
	}

	public function create(){
		//TODO Maybe crash
		$games = Game::all();
		$users = User::all();
		return view('admin.account.create',['users'=>$users, 'games'=>$games]);
	}
	public function store(){
		$validator = Validator::make( Input::all(), $this->rules );
		if ( $validator->fails() ) {
			return Redirect::back()
			               ->withErrors( $validator )
			               ->withInput();
		}else{
			$game = Game::findOrFail(Input::get('game_id'));
			$user = User::findOrFail(Input::get('user_id'));
			$account = new Account([
				'username'=>Input::get('username'),
				'password'=>Input::get('password'),
				'user_id'=>Input::get('user_id'),
				'game_id'=>Input::get('game_id')
			]);
			$account->save();
			return Redirect::to(route('admin.account.show', $account->id));
		}
	}

	public function edit($accountId){
		//TODO Maybe crash
		$games = Game::all();
		$users = User::all();
		$account = Account::findOrFail($accountId);
		return view('admin.account.edit', ['account'=>$account, 'users'=>$users, 'games'=>$games]);
	}

	public function update($accountId){
		$rule = $this->rules;
		$rule['username'][2] .=','.$accountId;
		$validator = Validator::make( Input::all(), $rule );

		if ( $validator->fails() ) {
			return Redirect::back()
			               ->withErrors( $validator )
			               ->withInput();
		}else{
			$game = Game::findOrFail(Input::get('game_id'));
			$user = User::findOrFail(Input::get('user_id'));
			$account = Account::findOrFail($accountId);
			$account->username = Input::get('username');
			$account->password = Input::get('password');
			$account->user_id = $user->id;
			$account->game_id = $game->id;

			$account->save();
			return Redirect::to(route('admin.account.show', $account->id));
		}
	}
	public function destroy($accountId){
		$account = Account::withTrashed()->findOrFail($accountId);
		$isForce = Input::get('forceDelete');
		if(isset($isForce) && $isForce =='true')
		{
			$account->forceDelete();
		}
		else{
			$account->delete();
		}
		return Redirect::to(route('admin.account.index', $account->id));
	}

	public function postRestore($accountId){
		$account = Account::withTrashed()->findOrFail($accountId);
		$account->restore();
		return Redirect::to(route('admin.account.index'));
	}
}
