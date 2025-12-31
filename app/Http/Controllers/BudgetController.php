<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;

class BudgetController extends Controller
{
    public function create()
    {
        return view('budgets.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'category' => 'required',
        'limit_amount' => 'required|numeric'
    ]);

    Budget::create([
        'user_id' => auth()->id(),
        'category' => $request->category,
        'limit_amount' => $request->limit_amount
    ]);

    return redirect('/dashboard');
}

}
