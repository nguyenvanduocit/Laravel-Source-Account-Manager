<?php

namespace App\Http\Controllers;

use App\Account;
use App\Game;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Validator;

class AccountController extends Controller
{
	protected $rules = [
		'username' =>['required','regex:/^[a-z0-9_-]*$/i','unique:accounts,username'],
		'password' =>'required',
		'game_id' =>'required|exists:games,id'
	];

	protected $updateRules = [
		'password' =>'required',
		'current_password' =>'required'
	];

	public function __construct() {
		$this->middleware('auth');

	}

	public function getShow($accountId){
		$account = Account::withTrashed()->with('game')->findOrFail($accountId);
		return view('account.show', ['account' => $account, 'page_title'=>'Account detail']);
	}

	public function getCreate($gameId){
		$game = Game::findOrFail($gameId);
		return view('account.create',['game'=>$game]);
	}

	public function postStore(){
		$validator = Validator::make( Input::all(), $this->rules );
		if ( $validator->fails() ) {
			return Redirect::back()
			               ->withErrors( $validator )
			               ->withInput();
		}else{
			$game = Game::findOrFail(Input::get('game_id'));
			$account = new Account([
				'username'=>Input::get('username'),
				'password'=>Input::get('password'),
				'user_id'=>Auth::user()->id,
				'game_id'=>$game->id
			]);
			$account->save();
			return Redirect::to(route('account.show', $account->id));
		}
	}

	public function getEdit($accountId){
		$account = Account::findOrFail($accountId);
		if(Gate::denies('update', $account)){
			return "Hey guy, Don't try to hack, This account is not belong to you.";
		}
		return view('account.edit', ['account'=>$account]);
	}

	public function patchUpdate($accountId){
		$validator = Validator::make( Input::all(), $this->updateRules );
		if ( $validator->fails() ) {
			return Redirect::back()
			               ->withErrors( $validator )
			               ->withInput();
		}else{
			$account = Account::findOrFail($accountId);

			if(Gate::denies('update', $account)){
				return "Hey guy, Don't try to hack, This account is not belong to you.";
			}
			if(Input::get('current_password') != $account->password)
			{
				return Redirect::back()
				               ->withErrors( ['current_password' => 'Mật khẩu cũ không đúng.'] )
				               ->withInput();
			}

			$account->password = Input::get('password');

			$account->save();
			return Redirect::to(route('account.show', $account->id));
		}
	}
	public function getPassword($gameId){
		$game = Game::findOrFail($gameId);
		return view('account.forgotPassword', ['game'=>$game]);
	}
	public function postPassword($gameId){
		$rule = [
			'username' => 'required'
		];
		$validator = Validator::make( Input::all(), $rule );
		if ( $validator->fails() ) {
			return Redirect::back()
			               ->withErrors( $validator )
			               ->withInput();
		}
		$account = Account::where('username', '=', Input::get('username'))->where('game_id', '=', $gameId)->where('user_id','=',Auth::user()->id)->first();
		if(!$account){
			return Redirect::back()
			               ->withErrors( ['username'=>'User name is not exist'] )
			               ->withInput();
		}
		if(Gate::denies('update', $account)){
			return "Hey guy, Don't try to hack, This account is not belong to you.";
		}

		$password = Str::random(16);
		$account->password = $password;
		$account->save();
		$user = Auth::user();
		Mail::send('emails.forgetAccountPassword', ['user' => $user,'account'=>$account, 'password' => $password], function ($m) use ($user) {
			$m->from('cs@senviet.org', 'CS4VN');
			$m->to($user->email, $user->name)->subject('Mật Khẩu CS4VN');
		});
		return Redirect::back();
	}
	public function getMyGames(){
		$games = Auth::user()->accounts()->withTrashed()->join('games', 'accounts.game_id', '=', 'games.id')->paginate(10, ['accounts.id as account_id', 'accounts.username', 'accounts.deleted_at', 'games.id as game_id', 'games.name', 'games.description']);
		return view('account.mygames', ['games'=>$games]);
	}
}
