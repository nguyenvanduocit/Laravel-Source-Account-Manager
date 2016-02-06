<?php

namespace App\Http\Controllers;

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
}
