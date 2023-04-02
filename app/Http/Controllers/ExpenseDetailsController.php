<?php

namespace App\Http\Controllers;

use App\Models\AccountDetails;
use App\Models\ExpenseDetails;
use App\Models\ExpensesCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['allData'] = ExpenseDetails::where('user_id', Auth::user()->id)->get();
        return view('wallet.expenses.ExpensesDetails.view_expense _details', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['category'] = ExpensesCategory::all();
        $data['account_details'] = AccountDetails::all();
        return view('wallet.expenses.ExpensesDetails.add_expense _details', $data);
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

        $expense = new ExpenseDetails();
        $expense->user_id = Auth::user()->id;
        $expense->category = $request->category;
        $expense->mode = $request->mode;
        $expense->account_id = $request->account_id;
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->save();

        return redirect()->route('expense.view');
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
        $data['expense_details'] = ExpenseDetails::find($id);
        $data['category'] = ExpensesCategory::all();
        $data['account_details'] = AccountDetails::all();
        return view('wallet.expenses.ExpensesDetails.edit_expense _details',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $expense =  ExpenseDetails::find($id);

        $validationData = $request->validate([
            'mode' => 'required',
            'amount' => 'required'
        ]);

        $expense->user_id = Auth::user()->id;
        $expense->category = $request->category;
        $expense->mode = $request->mode;
        $expense->account_id = $request->account_id;
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->save();

        return redirect()->route('expense.view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $expense =  ExpenseDetails::find($id);
        $expense->delete();
        return redirect()->route('expense.view');
    }
}
