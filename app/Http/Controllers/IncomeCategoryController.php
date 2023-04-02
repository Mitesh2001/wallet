<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use Illuminate\Http\Request;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['allData'] = IncomeCategory::all();
        return view('wallet.income.category.view_income_category',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wallet.income.category.add_income_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            'IncomeCategory' => 'required | unique:income_categories,name' 
        ]);

        $category = new IncomeCategory();
        $category->name = $request->IncomeCategory;
        $category->save();

        return redirect()->route('income.category.view');
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
        $category = IncomeCategory::find($id);
        return view('wallet.income.category.edit_income_category',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = IncomeCategory::find($id);
        
        $validationData = $request->validate([
            'IncomeCategory' => 'required | unique:income_categories,name,'. $category->id,
        ]);

        $category->name = $request->IncomeCategory;
        $category->save();

        return redirect()->route('income.category.view');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = IncomeCategory::find($id);
        $category->delete();

        return redirect()->route('income.category.view');
    }
}
