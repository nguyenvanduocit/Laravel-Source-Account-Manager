<?php

namespace app\Http\Controllers\Admin;

use App\Game;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'download_url' => 'required|url',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $games = DB::table('games')->paginate(10);
        $page_title = 'Game list';

        return view('admin.game.index', ['games' => $games, 'page_title' => $page_title]);
    }

    public function show($gameId)
    {
        $game = Game::findOrFail($gameId);
        $servers = $game->servers()->paginate(10);

        return view('admin.game.show', ['game' => $game, 'servers' => $servers]);
    }

    public function edit($gameId)
    {
        $game = Game::findOrFail($gameId);

        return view('admin.game.edit', ['game' => $game]);
    }

    public function update($gameId)
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Redirect::back()
                           ->withErrors($validator)
                           ->withInput();
        } else {
            // store
            $game = Game::findOrFail($gameId);
            $game->name = Input::get('name');
            $game->description = Input::get('description');
            $game->download_url = Input::get('download_url');
            $game->save();

            // redirect
            Session::flash('message', 'Successfully updated nerd!');

            return Redirect::to(route('game.show', ['id' => $game->id]));
        }
    }

    public function store()
    {
        $validator = Validator::make(Input::all(), $this->rules);
        if ($validator->fails()) {
            return Redirect::back()
                           ->withErrors($validator)
                           ->withInput();
        } else {
            // store
            $game = new Game();
            $game->name = Input::get('name');
            $game->description = Input::get('description');
            $game->download_url = Input::get('download_url');
            $game->save();

            // redirect
            Session::flash('message', 'Successfully ');

            return Redirect::to(route('game.show', ['id' => $game->id]));
        }
    }

    public function create()
    {
        return view('admin.game.create');
    }

    public function destroy($gameId)
    {
        try {
            $game = Game::findOrFail($gameId);
            $game->delete();
        } catch (Exception $e) {
            Session::flash('message', 'Fail : '.$e->getMessage());

            return Redirect::back();
        }

        return Redirect::to(route('admin.game.index'));
    }
}
