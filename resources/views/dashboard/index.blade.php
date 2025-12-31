<!-- <h1 class="text-3xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-2 gap-6">

<div class="bg-gray-800 p-5 rounded">
<h2>Accounts</h2>
<a href="/accounts/create" class="text-green-400">+ Add</a>
@if(isset($accounts) && $accounts->count())
    @foreach($accounts as $a)
        <p>{{ $a->name }} - ₹{{ $a->balance }}</p>
    @endforeach
@else
    <p class="text-gray-400">No accounts added yet</p>
@endif

</div>

<div class="bg-gray-800 p-5 rounded">
<h2>Transactions</h2>
<a href="/transactions/create" class="text-green-400">+ Add</a>
@foreach($transactions as $t)
<p>{{ $t->description }} - ₹{{ $t->amount }}</p>
@endforeach
</div>

<div class="bg-gray-800 p-5 rounded">
<h2>Budgets</h2>
<a href="/budgets/create" class="text-green-400">+ Add</a>
@foreach($budgets as $b)
<p>{{ $b->category }} - ₹{{ $b->limit_amount }}</p>
@endforeach
</div>

<div class="bg-gray-800 p-5 rounded">
<h2>Bills</h2>
<a href="/bills/create" class="text-green-400">+ Add</a>
@foreach($bills as $b)
<p>{{ $b->name }} - ₹{{ $b->amount }}</p>
@endforeach
</div>

<div class="bg-gray-800 p-5 rounded col-span-2">
<h2>Goals</h2>
<a href="/goals/create" class="text-green-400">+ Add</a>
@foreach($goals as $g)
<p>{{ $g->name }} (₹{{ $g->current_amount }}/₹{{ $g->target_amount }})</p>
@endforeach
</div>

</div> -->





@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<h1 class="text-3xl font-bold mb-8">
    Good Morning, <span class="text-green-400">{{ auth()->user()->name }}</span>
</h1>

{{-- TOP CARDS --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

<div class="bg-[#111827] p-6 rounded-xl">
    <p class="text-gray-400">Net Worth</p>
    <h2 class="text-3xl font-bold text-green-400">₹{{ number_format($netWorth,2) }}</h2>
</div>

<div class="bg-[#111827] p-6 rounded-xl">
    <p class="text-gray-400">Accounts</p>
<h2 class="text-3xl font-bold">{{ $accountsCount }}</h2>
</div>

<div class="bg-[#111827] p-6 rounded-xl">
    <p class="text-gray-400">Transactions</p>
    <h2 class="text-3xl font-bold">{{ $transactions->count() }}</h2>
</div>

</div>

{{-- MAIN GRID --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

{{-- TRANSACTIONS --}}
<div class="bg-[#111827] p-6 rounded-xl">
    <div class="flex justify-between mb-4">
        <h3 class="text-xl font-semibold">Recent Transactions</h3>
        <a href="/transactions/create" class="text-green-400">+ Add</a>
    </div>

    @foreach($transactions as $t)
        <div class="flex justify-between py-3 border-b border-gray-700">
            <div>
                <p>{{ $t->description }}</p>
                <p class="text-sm text-gray-400">{{ $t->category }}</p>
            </div>
            <div class="flex gap-2">
                <span class="{{ $t->amount < 0 ? 'text-red-400':'text-green-400' }}">
                    ₹{{ $t->amount }}
                </span>
                <a href="/transactions/{{ $t->id }}/edit" class="text-blue-400">Edit</a>
                <form method="POST" action="/transactions/{{ $t->id }}">
                    @csrf @method('DELETE')
                    <button class="text-red-400">Del</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

{{-- BUDGETS --}}
<div class="bg-[#111827] p-6 rounded-xl">
    <div class="flex justify-between mb-4">
        <h3 class="text-xl font-semibold">Budgets</h3>
        <a href="/budgets/create" class="text-green-400">+ Add</a>
    </div>

    @foreach($budgets as $b)
        @php
            $spent = $transactions->where('category',$b->category)->sum('amount');
            $percent = min(100, ($spent/$b->limit_amount)*100);
        @endphp

        <div class="mb-5">
            <div class="flex justify-between text-sm mb-1">
                <span>{{ $b->category }}</span>
                <span>₹{{ $spent }} / ₹{{ $b->limit_amount }}</span>
            </div>
            <div class="w-full bg-gray-700 h-2 rounded">
                <div class="h-2 rounded {{ $percent>100?'bg-red-500':'bg-green-400' }}"
                     style="width: {{ $percent }}%">
                </div>
            </div>
        </div>
    @endforeach
</div>

</div>

{{-- BOTTOM GRID --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-10">

{{-- SPENDING CHART --}}
<div class="bg-[#111827] p-6 rounded-xl">
    <h3 class="text-xl font-semibold mb-4">Spending by Category</h3>
    <canvas id="spendingChart"></canvas>
</div>

{{-- GOALS --}}
<div class="bg-[#111827] p-6 rounded-xl">
    <div class="flex justify-between mb-4">
        <h3 class="text-xl font-semibold">Goals</h3>
        <a href="/goals/create" class="text-green-400">+ Add</a>
    </div>

    @foreach($goals as $g)
        @php $p = ($g->current_amount/$g->target_amount)*100; @endphp
        <div class="mb-4">
            <p>{{ $g->name }}</p>
            <div class="w-full bg-gray-700 h-2 rounded mt-2">
                <div class="bg-blue-400 h-2 rounded" style="width:{{ $p }}%"></div>
            </div>
        </div>
    @endforeach
</div>

</div>

{{-- CHART SCRIPT --}}
<script>
new Chart(document.getElementById('spendingChart'), {
    type: 'bar',
    data: {
        labels: {!! json_encode($spendingByCategory->keys()) !!},
        datasets: [{
            data: {!! json_encode($spendingByCategory->values()) !!},
            backgroundColor: ['#22c55e','#3b82f6','#f97316','#a855f7','#ef4444']
        }]
    }
});
</script>

@endsection
