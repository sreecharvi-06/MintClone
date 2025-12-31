<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::where('user_id', auth()->id())->get();
        return view('accounts.index', compact('accounts'));
    }

    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:asset,liability',
            'balance' => 'required|numeric'
        ]);

        Account::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'type' => $request->type,
            'balance' => $request->balance,
        ]);

        return redirect('/dashboard');
    }
}
