<?php

namespace App\Http\Controllers\Admin;

use App\Game;
use App\Server;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Mockery\CountValidator\Exception;

class ServerController extends Controller
{
	protected $rules = [
		'name' =>'required|unique:servers,name',
		'ip' =>'required',
		'port' =>'required|numeric',
		'status' =>'required|digits_between:0,1',
		'game_id'=>'required|exists:games,id'
	];
	public function index(){
		$servers = Server::with('game')->paginate( 10 );
		$page_title = "Server list";
		return view( 'admin.server.index', [ 'servers' => $servers, 'page_title'=>$page_title ] );
	}
	public function create(){
		$games = Game::all();
		return view('admin.server.create',['games'=>$games]);
	}

	public function edit($serverId){
		$server = Server::with('game')->findOrFail($serverId);
		$games = Game::all();
		return view('admin.server.edit', ['server'=>$server, 'games'=>$games, 'page_title'=>'Edit server']);
	}
	public function show($serverId){
		$server = Server::with('game')->findOrFail($serverId);
		$status = false;
		$sourceQuery = new \xPaw\SourceQuery\SourceQuery();
		try{
			$sourceQuery->Connect( $server->ip, $server->port, 1, '730' );
			$status['info'] = $serverInfo = $sourceQuery->GetInfo();
			$status['players'] = $sourceQuery->GetPlayers();
		}
		catch(Exception $e){

		}
		finally
		{
			$sourceQuery->Disconnect( );
		}

		return view('admin.server.show', ['server'=>$server,'status'=>$status, 'page_title'=>'Server detail']);
	}
	public function store(){
		$validator = \Validator::make( Input::all(), $this->rules );
		if ( $validator->fails() ) {
			return Redirect::back()
			               ->withErrors( $validator )
			               ->withInput();
		}else{
			$game = Game::findOrFail(Input::get('game_id'));
			$server = new Server();
			$server->name = Input::get('name');
			$server->ip = Input::get('ip');
			$server->port = Input::get('port');
			$server->status = Input::get('status');
			$server->game_id = $game->id;
			$server->save();
			return Redirect::to(route('admin.server.show', $server->id));
		}
	}
	public function update($serverId){
		$rules = $this->rules;
		$rules['name'] .=','.$serverId;
		$validator = \Validator::make( Input::all(), $rules );
		if ( $validator->fails() ) {
			return Redirect::back()
			               ->withErrors( $validator )
			               ->withInput();
		}else{
			$server = Server::findOrFail($serverId);
			$game = Game::findOrFail(Input::get('game_id'));
			$server->name = Input::get('name');
			$server->ip = Input::get('ip');
			$server->port = Input::get('port');
			$server->status = Input::get('status');
			$server->game_id = $game->id;
			$server->save();
			return Redirect::to(route('admin.server.show', $server->id));
		}
	}
	public function destroy($serverId){
		$server = Server::findOrFail($serverId);
		$server->delete();
		return Redirect::to(route('admin.server.index'));
	}
}
