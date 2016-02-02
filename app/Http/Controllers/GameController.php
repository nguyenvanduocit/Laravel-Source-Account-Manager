<?php

namespace App\Http\Controllers;

use App\Account;
use App\Game;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller {

	public function getIndex() {
		$games = DB::table( 'games' )->paginate( 10 );
		$page_title = "Game list";
		return view( 'game.index', [ 'games' => $games, 'page_title'=>$page_title ] );
	}

	public function getShow( $gameId ) {
		$game = Game::findOrFail( $gameId );
		$account = Account::where('user_id','=',Auth::user()->id)->where('game_id', '=', $gameId)->first();
		$servers = $game->servers()->paginate( 10 );
		return view( 'game.show', [ 'game' => $game, 'account'=>$account, 'servers'=>$servers, 'page_title'=>'Game Detail' ] );
	}
}
