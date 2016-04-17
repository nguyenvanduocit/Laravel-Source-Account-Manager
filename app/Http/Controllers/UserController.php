<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function index(){
		$user = Auth::user();
		$games = Auth::user()->accounts()->withTrashed()->join('games', 'accounts.game_id', '=', 'games.id')->paginate(10, ['accounts.id as account_id', 'accounts.username', 'games.id as game_id', 'games.name', 'games.description', 'games.id as game_id']);
		$page_title = "Profile";
		return view('user.profile', ['user'=>$user,'games'=>$games, 'page_title'=>$page_title]);
	}
}
