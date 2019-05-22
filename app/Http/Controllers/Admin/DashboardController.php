<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard', [
            'count_client' => Client::all()->count(),
            'count_contract' => Contract::all()->count(),
        ]);
    }
}
