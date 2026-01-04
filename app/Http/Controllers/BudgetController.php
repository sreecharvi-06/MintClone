<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index()
    {
        $budgets = Budget::where('user_id', auth()->id())->get();
        return view('budgets.create', compact('budgets'));
    }

    public function create()
    {
        return view('budgets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'amount' => 'required|numeric',
        ]);

        Budget::create([
            'user_id' => auth()->id(),
            'category' => $request->category,
            'amount' => $request->amount,
        ]);

        return redirect('/budgets');
    }
}
