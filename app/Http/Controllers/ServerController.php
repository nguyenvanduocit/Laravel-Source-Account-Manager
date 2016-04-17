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
		return view('server.show', ['server'=>$server, 'page_title'=>'Server detail']);
	}
}
