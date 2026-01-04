<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bill;

class BillController extends Controller
{
    /* =========================
       SHOW ALL BILLS
    ==========================*/
    public function index()
    {
        $bills = Bill::where('user_id', Auth::id())
            ->orderBy('due_date')
            ->get();

        return view('bills.create', compact('bills'));
    }

    /* =========================
       SHOW CREATE BILL FORM
    ==========================*/
    public function create()
    {
        return view('bills.create');
    }

    /* =========================
       STORE BILL
    ==========================*/
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
        ]);

        Bill::create([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'amount' => $request->amount,
            'due_date' => $request->due_date,
        ]);

        return redirect('/dashboard')->with('success', 'Bill added successfully');
    }
}
