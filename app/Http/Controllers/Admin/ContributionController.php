<?php

namespace App\Http\Controllers\Admin;

use App\Contribution;
use App\Http\Requests\ContributionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ContributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.contributions.index',[
            'contributions' => Contribution::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contributions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContributionRequest $request)
    {
        Contribution::create($request->all());
        return redirect()->route('admin.contributions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function show(Contribution $contribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function edit(Contribution $contribution)
    {
        return view('admin.contributions.edit',[
            'contribution' => $contribution
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function update(ContributionRequest $request, Contribution $contribution)
    {

        $inputs = $request->all();
        $cheks = [ 'isReplenishment', 'isWithdrawal', 'isCapitalization'];
        foreach ($cheks as $item){
            if(!$request->has($item)){
               $inputs = array_merge($inputs, [ $item=> '0']);
            }
        }
        $contribution->update($inputs);
        return redirect()->route('admin.contributions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contribution  $contribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contribution $contribution)
    {
        $contribution->delete();
        return redirect()->route('admin.contributions.index');
    }
}
