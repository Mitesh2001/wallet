<?php

namespace App\Http\Controllers;

use App\Models\ExpenseDetails;
use App\Models\IncomeDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function show()
    {
        $incomeRecords = IncomeDetails::all();
        $expenseRecords = ExpenseDetails::all();

        $data['paymentModeTotals'] = $incomeRecords->groupBy('mode')
            ->map(function ($items) {
                return $items->sum('amount');
            });

        $data['paymentModeTotals1'] = $expenseRecords->groupBy('mode')
            ->map(function ($items) {
                return $items->sum('amount');
            });

        $data['cash'] =  $data['paymentModeTotals']['Cash'] - $data['paymentModeTotals1']['Cash'];
        $data['Digital'] =  $data['paymentModeTotals']['Digital'] - $data['paymentModeTotals1']['Digital'];

        $data['totalIncomeByAccount']  = DB::table('income_details')
            ->select('account_id', DB::raw('SUM(amount) as total_income'))
            ->where('user_id', Auth::id())
            ->groupBy('account_id')
            ->get();
        return view('admin.index', $data);
    }
}
