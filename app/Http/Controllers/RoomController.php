<?php

namespace App\Http\Controllers;

use App\Account;
use App\Contract;
use App\Contribution;
use App\Credit;
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

    //изменение данных клиента
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

    //открытие нового вклада
    public function openContribution(Request $request){
        $contribution = Contribution::find($request->input('id'));

        $acc = new Account();
        $acc->client_id = $request->user()->client->id;
        $acc->balance = $request->input('balance');


        $contribution->accounts()->save($acc);

        //создание контратка
        $acc->contract()->create([
            'period' => $request->input('period'),
            'amount' => $request->input('balance'),
            'percent' => $request->input('percent'),
            'expirationDate' => Carbon::now()->addDays($request->input('period'))
        ]);

        return redirect()->route('profile.contract', $acc->contract);
    }

    //открытие нового кредита
    public function openCredit(Request $request){
        $credit = Credit::find($request->input('id'));

        $acc = new Account();
        $acc->client_id = $request->user()->client->id;
        $acc->balance = $request->input('balance');

        $credit->accounts()->save($acc);

        //создание контратка
        $acc->contract()->create([
            'period' => $request->input('period'),
            'amount' => $request->input('balance'),
            'percent' => $request->input('percent'),
            'expirationDate' => Carbon::now()->addMonths($request->input('period'))
        ]);

        return redirect()->route('profile.contract', $acc->contract);
    }

    public function showContract(Contract $contract){
        if($contract->account->offerable_type == 'App\Contribution'){
            return view('contracts.contribution', [ 'contract' => $contract ]);
        }else{
            return view('contracts.credit', [ 'contract' => $contract ]);
        }
    }


    //страница с счетами клиента
    public function showAccount(Request $request){

        return view('profile.accounts',[
            'data' => $request->user()->client->accounts->mapToGroups(function ($item, $key) {
                return [ $item['offerable_type'] => $item->load('offerable', 'contract')]; })
                ->sortByDesc('created_at')->toJson(JSON_UNESCAPED_UNICODE)]);
    }

}
