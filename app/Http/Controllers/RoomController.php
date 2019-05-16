<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index()
    {
        return view('profile.index', [ 'user' => Auth::user() ]);
    }

    public function edit()
    {
        return view('profile.edit', [ 'user' => Auth::user() ]);
    }

    public function update(Request $request){
        Auth::user()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);
        Auth::user()->client()->update([
            'surname' => $request->input('surname'),
            'name' => $request->input('client_name'),
            'patronymic' => $request->input('patronymic'),
            'phone' => $request->input('phone'),
            'dateOfBirth' => $request->input('dateOfBirth'),
            'series' => $request->input('series'),
            'number' => $request->input('number'),
            'address' => $request->input('address'),
            'dateOfIssues' => $request->input('dateOfIssues'),
            'issued' => $request->input('issued')
        ]);
        return redirect()->route('profile.view');
    }
}
