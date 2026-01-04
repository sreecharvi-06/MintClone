<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;

class GoalController extends Controller
{
    public function index()
    {
        return view('goals.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'target_amount' => 'required|numeric',
            'current_amount' => 'required|numeric',
        ]);

        Goal::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'target_amount' => $request->target_amount,
            'current_amount' => $request->current_amount,
        ]);

        return redirect('/dashboard');
    }
}
