<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
	public function index(){
		$posts = Post::with(['user'])->paginate(20);
		return view('admin.post.index', ['posts'=>$posts]);
	}
	public function create(){
		return view('admin.post.create');
	}
	public function store(){
		$rules = [
			'title'=>"required|unique:posts,title",
			'content'=>'required'
		];
		$validator = \Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()
			               ->withErrors($validator)
			               ->withInput();
		}else{
			$post = new Post();
			$post->title = Input::get('title');
			$post->content = Input::get('content');
			$post->user_id = Auth::user()->id;
			$post->save();
			return Redirect::to( route( 'admin.post.show', [ 'id' => $post->id ] ) );
		}
	}
	public function show($postId){
		$post = Post::with('user')->findOrFail($postId);
		return view('admin.post.show', ['post'=>$post, 'page_title'=>$post->title]);
	}
	public function edit($postId){
		$post = Post::with('user')->findOrFail($postId);
		return view('admin.post.edit', ['post'=>$post, 'page_title'=>"Edit : ".$post->title]);
	}
	public function update($postId){
		$rules = [
			'title'=>"required|unique:posts,title,".$postId,
			'content'=>'required'
		];
		$validator = \Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()
			               ->withErrors($validator)
			               ->withInput();
		}else{
			$post = Post::findOrFail($postId);
			$post->title = Input::get('title');
			$post->content = Input::get('content');
			$post->save();
			return Redirect::to( route( 'admin.post.show', [ 'id' => $post->id ] ) );
		}
	}
	public function destroy( $postId ) {
		try {
			$post = Post::findOrFail( $postId );
			$post->delete();
		} catch ( Exception $e ) {
			Session::flash( 'message', 'Fail : ' . $e->getMessage() );

			return Redirect::back();
		}

		return Redirect::to( route( 'admin.post.index' ) );
	}
}
