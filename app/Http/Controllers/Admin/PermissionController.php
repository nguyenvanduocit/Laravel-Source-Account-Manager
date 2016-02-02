<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index(){
	    $permissions = Permission::with('roles')->paginate(10);
	    return view('admin.permission.index', ['permissions'=>$permissions]);
    }
}
