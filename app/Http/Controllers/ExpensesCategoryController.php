<?php

namespace App\Http\Controllers;

use App\Models\ExpensesCategory;
use Illuminate\Http\Request;

class ExpensesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['allData'] = ExpensesCategory::all();
        return view('wallet.expenses.category.view_expenses_category',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wallet.expenses.category.add_expenses_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            'ExpenseCategory' => 'required | unique:expenses_categories,name' 
        ]);

        $category = new ExpensesCategory();
        $category->name = $request->ExpenseCategory;
        $category->save();

        return redirect()->route('expenses.category.view');
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
        $category = ExpensesCategory::find($id);
        return view('wallet.expenses.category.edit_expenses_category',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = ExpensesCategory::find($id);
        
        $validationData = $request->validate([
            'ExpenseCategory' => 'required | unique:expenses_categories,name,'. $category->id,
        ]);

        $category->name = $request->ExpenseCategory;
        $category->save();

        return redirect()->route('expenses.category.view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ExpensesCategory::find($id);
        $category->delete();

        return redirect()->route('expenses.category.view');
    }
}
