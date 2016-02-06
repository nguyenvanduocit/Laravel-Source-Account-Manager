<?php

namespace App\Http\Controllers\Admin;

use App\Account;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){

	    $userCount = User::count();
	    $accountCount = Account::count();

	    $now = time(); // or your date as well
	    $startDay = "2016-02-05";
	    $your_date = strtotime($startDay);
	    $datediff = $now - $your_date;
	    $runDay = floor($datediff/(60*60*24));
	    return view('admin.index',['userCount' => $userCount,'accountCount'=>$accountCount, 'startDay' => $startDay,'runDay' => $runDay]);
    }
}
