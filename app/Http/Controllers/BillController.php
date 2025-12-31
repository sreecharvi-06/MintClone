<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;

class BillController extends Controller
{
 public function create() {
    return view('bills.create');
}

public function store(Request $request) {
    Bill::create([
        'user_id'=>auth()->id(),
        'name'=>$request->name,
        'amount'=>$request->amount,
        'due_date'=>$request->due_date
    ]);
    return redirect('/dashboard');
}

}
