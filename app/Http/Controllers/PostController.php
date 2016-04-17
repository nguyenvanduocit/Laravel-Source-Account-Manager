<?php

namespace App\Http\Controllers;

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
		return view('post.index', ['posts'=>$posts]);
	}
	public function show($postId){
		$post = Post::with('user')->findOrFail($postId);
		return view('post.show', ['post'=>$post, 'page_title'=>$post->title]);
	}
}
