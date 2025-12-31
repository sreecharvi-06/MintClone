<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\Budget;
use App\Models\Bill;
use App\Models\Goal;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        /* =======================
           ACCOUNTS & NET WORTH
        ========================*/
        $assets = Account::where('user_id', $userId)
            ->where('type', 'asset')
            ->sum('balance');

        $liabilities = Account::where('user_id', $userId)
            ->where('type', 'liability')
            ->sum('balance');

        $netWorth = $assets - $liabilities;

        $accountsCount = Account::where('user_id', $userId)->count();

        /* =======================
           TRANSACTIONS
        ========================*/
        $transactions = Transaction::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        $transactionsCount = Transaction::where('user_id', $userId)->count();

        /* =======================
           SPENDING BY CATEGORY
        ========================*/
        $spendingByCategory = Transaction::where('user_id', $userId)
            ->selectRaw('category, SUM(amount) as total')
            ->groupBy('category')
            ->pluck('total', 'category');

        /* =======================
           BUDGETS (WITH SPENT)
        ========================*/
        $budgets = Budget::where('user_id', $userId)->get();

        foreach ($budgets as $budget) {
            $budget->spent = Transaction::where('user_id', $userId)
                ->where('category', $budget->category)
                ->sum('amount');
        }

        /* =======================
           BILLS & GOALS
        ========================*/
        $bills = Bill::where('user_id', $userId)
            ->orderBy('due_date')
            ->get();

        $goals = Goal::where('user_id', $userId)->get();

        /* =======================
           RETURN DASHBOARD VIEW
        ========================*/
        return view('dashboard.index', compact(
            'netWorth',
            'accountsCount',
            'transactionsCount',
            'transactions',
            'spendingByCategory',
            'budgets',
            'bills',
            'goals'
        ));
    }
}
