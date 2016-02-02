<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){

	    $userCount = User::count();

	    $now = time(); // or your date as well
	    $startDay = "2010-01-01";
	    $your_date = strtotime("2010-01-01");
	    $datediff = $now - $your_date;
	    $runDay = floor($datediff/(60*60*24));
	    return view('admin.index',['userCount' => $userCount, 'startDay' => $startDay,'runDay' => $runDay]);
    }
}
