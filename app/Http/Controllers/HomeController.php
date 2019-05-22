<?php

namespace App\Http\Controllers;

use App\Contribution;
use App\Credit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'contributions' => Contribution::all(),
            'credits' => Credit::all()
        ]);
    }

    public function calcContribution(){
        return view('calculators.contributions', [
            'contributions' => json_encode(Contribution::all(),  JSON_UNESCAPED_UNICODE)
        ]);
    }

    public function calcCredit(Credit $credit){
        return view('calculators.credit', [
            'credit' => json_encode($credit,  JSON_UNESCAPED_UNICODE)
        ]);
    }

    public function rates()
    {
        return view('rates', [
            'contributions' => Contribution::all(),
            'credits' => Credit::all()
        ]);
    }

}
