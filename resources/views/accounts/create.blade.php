@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Add Account</h2>

<form method="POST" action="/accounts" class="bg-[#111827] p-6 rounded-xl w-96">
@csrf

<input name="name" placeholder="Account Name"
 class="w-full p-3 mb-3 bg-transparent border rounded" required>

<select name="type"
 class="w-full p-3 mb-3 bg-transparent border rounded">
    <option value="asset">Asset (Bank / Cash)</option>
    <option value="liability">Liability (Loan / Credit Card)</option>
</select>

<input name="balance" type="number"
 placeholder="Balance"
 class="w-full p-3 mb-3 bg-transparent border rounded" required>

<button class="bg-green-500 px-6 py-2 rounded text-black">
    Save Account
</button>
</form>
@endsection
