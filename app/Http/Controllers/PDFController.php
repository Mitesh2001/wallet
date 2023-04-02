<?php

namespace App\Http\Controllers;

use App\Models\ExpenseDetails;
use App\Models\IncomeDetails;
use Barryvdh\DomPDF\PDF;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function IncomeReportPDF(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $mode = $request->input('mode');

        $incomeData = IncomeDetails::where('user_id', Auth::id())
            ->whereBetween('created_at', [$from, $to])
            ->when($mode, function ($query, $mode) {
                return $query->where('mode', $mode);
            })
            ->get();


        //For Income Total Amount
        $incomeRecords = IncomeDetails::where('user_id', Auth::id())->get();

        $data['paymentModeTotals'] = $incomeRecords->groupBy('mode')
            ->map(function ($items) {
                return $items->sum('amount');
            });


        if ($mode == 'Cash') {
            $total = $data['paymentModeTotals']['Cash'];
        } elseif ($mode == 'Digital') {
            $total = $data['paymentModeTotals']['Digital'];
        } else {
            $total = $data['paymentModeTotals']['Cash'] + $data['paymentModeTotals']['Digital'];
        }

        //For PDF
        $data = [
            'title' => 'Income Report',
            'date' => date('m/d/Y'),
            'from' => $from,
            'to' => $to,
            'data' => $incomeData,
            'total' => $total
        ];
        if ($incomeData->count() == 0) {
            return back()->with('error', 'No income data found.');
        }
        try {
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('wallet.PDF', $data);
        } catch (Exception $e) {
            return back()->with('error', 'Error generating PDF: ' . $e->getMessage());
        }
        // return $pdf->download('income_report_' . date('YmdHis') . '.pdf');
        return $pdf->stream();
    }

    public function ExpenseReportPDF(Request $request)
    {
        $from = $request->input('from');
        $to = $request->input('to');
        $mode = $request->input('mode');

        $expenseData = ExpenseDetails::where('user_id', Auth::id())
            ->whereBetween('created_at', [$from, $to])
            ->when($mode, function ($query, $mode) {
                return $query->where('mode', $mode);
            })
            ->get();



        //For Expense Total Amount
        $expenseRecords = ExpenseDetails::where('user_id', Auth::id())->get();

        $data['paymentModeTotals1'] = $expenseRecords->groupBy('mode')
            ->map(function ($items) {
                return $items->sum('amount');
            });


        if ($mode == 'Cash') {
            $total = $data['paymentModeTotals1']['Cash'];
        } elseif ($mode == 'Digital') {
            $total = $data['paymentModeTotals1']['Digital'];
        } else {
            $total = $data['paymentModeTotals1']['Cash'] + $data['paymentModeTotals1']['Digital'];
        }

        //For PDF
        $data = [
            'title' => 'Expense Report',
            'date' => date('m/d/Y'),
            'from' => $from,
            'to' => $to,
            'data' => $expenseData,
            'total' => $total
        ];
        if ($expenseData->count() == 0) {
            return back()->with('error', 'No Expenses data found.');
        }

        try {
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('wallet.PDF', $data);
        } catch (Exception $e) {
            return back()->with('error', 'Error generating PDF: ' . $e->getMessage());
        }
        // return $pdf->download('income_report_' . date('YmdHis') . '.pdf');
        return $pdf->stream();
    }

    public function FullReportPDF(Request $request)
    {

    }
}
