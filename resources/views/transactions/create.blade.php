@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-6">Add Transaction</h2>

<form method="POST" action="/transactions" class="bg-[#111827] p-6 rounded-xl w-96">
    @csrf

    <div class="mb-4">
        <label>Description</label>
        <input name="description" class="w-full p-3 bg-transparent border rounded" required>
    </div>

    <div class="mb-4">
        <label>Category</label>
        <input name="category" class="w-full p-3 bg-transparent border rounded" required>
    </div>

    <div class="mb-4">
        <label>Amount</label>
        <input type="number" name="amount" class="w-full p-3 bg-transparent border rounded" required>
    </div>

    <div class="mb-4">
        <label>Date</label>
        <input type="date" name="date" class="w-full p-3 bg-transparent border rounded" required>
    </div>

    <button class="bg-green-500 text-black px-6 py-2 rounded">
        Save Transaction
    </button>
</form>

@endsection
