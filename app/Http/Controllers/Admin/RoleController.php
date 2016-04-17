<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Mockery\CountValidator\Exception;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
	protected $rules = [
		'name'       => 'required|unique:roles,name',
		'description'      => 'required'
	];
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('role:administrator');
		$this->middleware('permission:manage_role');
	}


    public function index(){
	    $roles = Role::with('perms')->paginate(10);
	    return view('admin.role.index', ['roles'=>$roles]);
    }

	public function show($roleId){
		$role = Role::findOrFail($roleId);
		return view('admin.role.show', ['role'=>$role]);
	}

	public function edit($roleId){
		$role = Role::findOrFail($roleId);
		return view('admin.role.edit', ['role'=>$role]);
	}

	public function create(){
		return view('admin.role.create');
	}

	public function store(){
		$validator = Validator::make(Input::all(), $this->rules);
		if($validator->fails()){
			return Redirect::back()
			               ->withErrors($validator)
			               ->withInput();
		}
		else{
			// store
			$role = new Role();
			$role->name       = Input::get('name');
			$role->description      =  Input::get('description');
			$role->save();

			// redirect
			Session::flash('message', 'Successfully');
			return Redirect::to(route('admin.role.show', ['id'=>$role->id]));
		}
	}
	public function update($roleId){
		$rules = $this->rules;
		$rules['name'] .=','.$roleId;
		$validator = Validator::make(Input::all(), $rules);
		// process the login
		if ($validator->fails()) {
			return Redirect::back()
			               ->withErrors($validator)
			               ->withInput();
		} else {
			// store
			$role = Role::findOrFail($roleId);
			$role->name       = Input::get('name');
			$role->description      =  Input::get('description');
			$role->save();

			// redirect
			Session::flash('message', 'Successfully updated nerd!');
			return Redirect::to(route('admin.role.show', ['id'=>$role->id]));
		}
	}

	public function destroy($roleId){
		try{
			$role = Role::findOrFail($roleId);
			$role->delete();
		}
		catch(Exception $e){
			Session::flash('message', 'Fail : '. $e->getMessage());
		}
		return Redirect::back();
	}

}
