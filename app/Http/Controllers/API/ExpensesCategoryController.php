<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ExpensesCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ExpensesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required| unique:expenses_categories,name',
            ]);
        } catch (ValidationException $exception) {
            return response()->json(['error' => 'Expense category name already exists'], 422);
        }

        $expenseCategory = new ExpensesCategory;
        $expenseCategory->name = $validatedData['name'];
        $expenseCategory->save();

        return response()->json(['message' => 'Expense category created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpensesCategory $expensesCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExpensesCategory $expensesCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpensesCategory $expensesCategory)
    {
        //
    }
}
