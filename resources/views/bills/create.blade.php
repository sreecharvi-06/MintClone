@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-6">Add Your Bills</h2>

<form method="POST" action="/bills" class="bg-[#111827] p-6 rounded-xl w-96">
    @csrf

    <div class="mb-4">
        <label class="block mb-1">Bill name</label>
        <input
            type="text"
            name="category"
            class="w-full p-3 bg-transparent border border-gray-600 rounded"
            placeholder="e.g. Food, Travel"
            required
        >
    </div>

    <div class="mb-4">
        <label class="block mb-1">Amount</label>
        <input
            type="number"
            name="limit_amount"
            class="w-full p-3 bg-transparent border border-gray-600 rounded"
            placeholder="e.g. 5000"
            required
        >
    </div>


    <div class="mb-4">
        <label class="block mb-1">Due date</label>
        <input
            type="date"
            name="limit_amount"
            class="w-full p-3 bg-transparent border border-gray-600 rounded"
         
            required
        >
    </div>

    <button class="bg-green-500 text-black px-6 py-2 rounded">
        Save Budget
    </button>

</form>

@endsection
