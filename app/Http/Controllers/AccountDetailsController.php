<?php

namespace App\Http\Controllers;

use App\Models\AccountDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['allData'] = AccountDetails::where('user_id',Auth::user()->id)->get();
        return view('wallet.income.account.view_account_details', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wallet.income.account.add_account_details');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            'name' => 'required',
            'number' => 'required | unique:account_details,account_number',
            'type' => 'required'
        ]);
        $account = new AccountDetails();
        $account->user_id = Auth::user()->id;
        $account->account_name = $request->name;
        $account->account_number = $request->number;
        $account->type = $request->type;
        $account->save();

        return redirect()->route('account.details.view');
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
        $account = AccountDetails::find($id);
        return view('wallet.income.account.edit_account_details', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $account = AccountDetails::find($id);
        
        // $validationData = $request->validate([
        //     'name' => 'required',
        //     'number' => 'required | unique:account_details,account_number',
        //     'type' => 'required'
        // ]);

        $account->user_id = Auth::user()->id;
        $account->account_name = $request->name;
        $account->account_number = $request->number;
        $account->type = $request->type1;
        $account->save();

        return redirect()->route('account.details.view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $account = AccountDetails::find($id);
        $account->delete();
        return redirect()->route('account.details.view');
    }
}
