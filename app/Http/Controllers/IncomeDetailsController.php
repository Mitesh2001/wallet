<?php

namespace App\Http\Controllers;

use App\Models\AccountDetails;
use App\Models\IncomeCategory;
use App\Models\IncomeDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['allData'] = IncomeDetails::where('user_id',Auth::user()->id)->get();
        return view('wallet.income.incomeDetails.view_income_details',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['category'] = IncomeCategory::all();
        $data['account_details'] = AccountDetails::all();
        return view('wallet.income.incomeDetails.add_income_details',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            'mode' => 'required',
            'amount' => 'required'
        ]);

        $income = new IncomeDetails();
        $income->user_id = Auth::user()->id;
        $income->category = $request->category;
        $income->mode = $request->mode;
        $income->account_id = $request->account_id;
        $income->amount = $request->amount;
        $income->save();

        return redirect()->route('income.view');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['income_details'] = IncomeDetails::find($id);
        $data['category'] = IncomeCategory::all();
        $data['account_details'] = AccountDetails::all();
        return view('wallet.income.incomeDetails.edit_income_details',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $income =  IncomeDetails::find($id);

        $validationData = $request->validate([
            'mode' => 'required',
            'amount' => 'required'
        ]);

        $income->user_id = Auth::user()->id;
        $income->category = $request->category;
        $income->mode = $request->mode;
        $income->account_id = $request->account_id;
        $income->amount = $request->amount;
        $income->save();

        return redirect()->route('income.view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $income =  IncomeDetails::find($id);
        $income->delete();
        return redirect()->route('income.view');

    }
}
