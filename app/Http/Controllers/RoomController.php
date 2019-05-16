<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index(){
        return view('profile.index', [ 'user' => Auth::user() ]);
    }
}
