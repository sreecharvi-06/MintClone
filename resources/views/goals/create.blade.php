@extends('layouts.app')

@section('content')

<h2 class="text-2xl font-bold mb-6">Add Goal</h2>

<form method="POST" action="/goals" class="bg-[#111827] p-6 rounded-xl w-96">
    @csrf

    <div class="mb-4">
        <label class="block mb-1">Goal Name</label>
        <input
            type="text"
            name="name"
            class="w-full p-3 bg-transparent border border-gray-600 rounded"
            placeholder="Emergency Fund"
            required
        >
    </div>

    <div class="mb-4">
        <label class="block mb-1">Target Amount</label>
        <input
            type="number"
            name="target_amount"
            class="w-full p-3 bg-transparent border border-gray-600 rounded"
            placeholder="50000"
            required
        >
    </div>

    <div class="mb-4">
        <label class="block mb-1">Current Amount</label>
        <input
            type="number"
            name="current_amount"
            class="w-full p-3 bg-transparent border border-gray-600 rounded"
            placeholder="10000"
            required
        >
    </div>

    <button class="bg-green-500 text-black px-6 py-2 rounded">
        Save Goal
    </button>
</form>

@endsection
