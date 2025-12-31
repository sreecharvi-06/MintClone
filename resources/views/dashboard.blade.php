<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\{Account,Transaction,Budget,Bill,Goal};

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();

        return view('dashboard.index', [
            'user'=>$user,
            'accounts'=>Account::whereUserId($user->id)->get(),
            'transactions'=>Transaction::whereUserId($user->id)->latest()->take(5)->get(),
            'budgets'=>Budget::whereUserId($user->id)->get(),
            'bills'=>Bill::whereUserId($user->id)->get(),
            'goals'=>Goal::whereUserId($user->id)->get()
        ]);
    }
}
