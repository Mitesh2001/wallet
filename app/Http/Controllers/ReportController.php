<?php

namespace App\Http\Controllers;

use App\Models\ExpenseDetails;
use App\Models\IncomeDetails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ReportController extends Controller
{
    public function income_report(Request $request)
    {

        $from = $request->input('from');
        $to = $request->input('to');
        $mode = $request->input('mode');

        // Handle form submission from both buttons here
        if ($request->has('pdf')) {
            return redirect()->route('income.report.pdf', $request);
        } elseif ($request->has('mail')) {
            return redirect()->route('income.mail', $request);
        }


        $data = IncomeDetails::where('user_id', Auth::id())
            ->whereBetween('created_at', [$from, $to])
            ->when($mode, function ($query, $mode) {
                return $query->where('mode', $mode);
            })
            ->get();

        return view('wallet.report.IncomeReport', compact('data', 'from', 'to', 'mode'));
    }

    public function expense_report(Request $request)
    {

        $from = $request->input('from');
        $to = $request->input('to');
        $mode = $request->input('mode');

        // Handle form submission from both buttons here
        if ($request->has('pdf')) {
            return redirect()->route('expense.report.pdf', $request);
        } elseif ($request->has('mail')) {
            return redirect()->route('expense.mail', $request);
        }

        $data = ExpenseDetails::where('user_id', Auth::id())
            ->whereBetween('created_at', [$from, $to])
            ->when($mode, function ($query, $mode) {
                return $query->where('mode', $mode);
            })
            ->get();
        return view('wallet.report.ExpensesReport', compact('data', 'from', 'to', 'mode'));
    }

    public function full_report(Request $request)
    {
        // return  $request;
        $from ="2023-03-01";
        $to = "2023-04-01";
        $mode = $request->input('mode');

        // Handle form submission from both buttons here
        if ($request->has('pdf')) {
            return redirect()->route('expense.report.pdf', $request);
        } elseif ($request->has('mail')) {
            return redirect()->route('expense.mail', $request);
        }

        $data['expense'] = ExpenseDetails::where('user_id', Auth::id())
            ->whereBetween('created_at', [$from, $to])
            ->when($mode, function ($query, $mode) {
                return $query->where('mode', $mode);
            })
            ->get();

        $data['income'] = IncomeDetails::where('user_id', Auth::id())
            ->whereBetween('created_at', [$from, $to])
            ->when($mode, function ($query, $mode) {
                return $query->where('mode', $mode);
            })
            ->get();
            return $data;
        // return view('wallet.report.fullReport', compact('data', 'from', 'to', 'mode'));
    }
}
