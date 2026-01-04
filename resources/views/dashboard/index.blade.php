<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MintClone Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body {
            margin: 0;
            background: radial-gradient(circle at top, #1e1b4b, #020617);
            color: #fff;
        }

        /* Layout */
        .container { display: flex; min-height: 100vh; }
        .sidebar {
            width: 240px;
            background: linear-gradient(180deg, #020617, #1e1b4b);
            padding: 20px;
        }
        .sidebar h2 { color: #22c55e; }
        .sidebar a {
            display: block;
            color: #cbd5f5;
            padding: 12px;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 6px;
        }
        .sidebar a:hover { background: #312e81; }

        .content {
            flex: 1;
            padding: 30px;
        }

        /* Header */
        .header h1 { margin: 0; color: #f472b6; }
        .header p { color: #c7d2fe; }

        /* Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 30px;
        }
        .card {
            background: linear-gradient(145deg, #020617, #312e81);
            padding: 20px;
            border-radius: 16px;
        }
        .card span { color: #94a3b8; font-size: 14px; }
        .card h2 { margin-top: 10px; }

        /* Sections */
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 30px;
        }
        .section {
            background: linear-gradient(145deg, #020617, #312e81);
            padding: 20px;
            border-radius: 16px;
        }
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .section-header a {
            color: #f472b6;
            text-decoration: none;
            font-size: 14px;
        }

        .item {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #334155;
        }
        .item:last-child { border-bottom: none; }
        .negative { color: #ef4444; }
        .positive { color: #22c55e; }

        @media (max-width: 900px) {
            .cards { grid-template-columns: 1fr; }
            .grid-2 { grid-template-columns: 1fr; }
            .sidebar { display: none; }
        }
    </style>
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>MintClone</h2>
        <a href="/dashboard">Dashboard</a>
        <a href="/accounts">Accounts</a>
        <a href="/transactions">Transactions</a>
        <a href="/budgets">Budgets</a>
        <a href="/bills">Bills</a>
        <a href="/goals">Goals</a>
    </div>

    <!-- MAIN -->
    <div class="content">

        <!-- HEADER -->
        <div class="header">
            <h1>Welcome back, {{ auth()->user()->name }}!</h1>
            <p>It is the best time to manage your finances</p>
        </div>

        <!-- STATS -->
        <div class="cards">
            <div class="card">
                <span>Total Balance</span>
                <h2>₹{{ number_format($netWorth + ($transactionsCount ?? 0), 2) }}</h2>
            </div>
            <div class="card">
                <span>Total Expense</span>
                <h2 class="negative">₹{{ number_format($transactions->sum('amount'), 2) }}</h2>
            </div>
            <div class="card">
                <span>Remaining Balance</span>
                <h2 class="positive">₹{{ number_format($netWorth, 2) }}</h2>
            </div>
        </div>

        <!-- LOWER GRID -->
        <div class="grid-2">

            <!-- BILLS -->
            <div class="section">
                <div class="section-header">
                    <h3>Upcoming Bills</h3>
                    <a href="/bills/create">+ Add</a>
                </div>
                @forelse($bills as $bill)
                    <div class="item">
                        <span>{{ $bill->name }}</span>
                        <span class="negative">₹{{ $bill->amount }}</span>
                    </div>
                @empty
                    <p>No bills added</p>
                @endforelse
            </div>

            <!-- TRANSACTIONS -->
            <div class="section">
                <div class="section-header">
                    <h3>Recent Transactions</h3>
                    <a href="/transactions/create">+ Add</a>
                </div>
                @forelse($transactions as $tx)
                    <div class="item">
                        <span>{{ $tx->category }}</span>
                        <span class="negative">-₹{{ $tx->amount }}</span>
                    </div>
                @empty
                    <p>No transactions yet</p>
                @endforelse
            </div>

        </div>

    </div>
</div>

</body>
</html>
