<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    // SHOW CREATE FORM
    public function create()
    {
        return view('transactions.create');
    }

    // STORE TRANSACTION
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'category' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Transaction::create([
            'user_id' => auth()->id(),
            'description' => $request->description,
            'category' => $request->category,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);

        return redirect('/dashboard');
    }

    // EDIT FORM
    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    // UPDATE
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update($request->all());
        return redirect('/dashboard');
    }

    // DELETE
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect('/dashboard');
    }
}
