<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
	public function index(){
		$posts = Post::with('author')->paginate(10);
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

		}

	}
}
