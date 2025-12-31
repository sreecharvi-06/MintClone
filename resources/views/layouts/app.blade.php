<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MintFinance</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(135deg, #020617, #020617);
        }
    </style>
</head>
<body class="text-white">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-[#020617] border-r border-gray-800 p-6 flex flex-col justify-between">
        <div>
            <h1 class="text-2xl font-bold text-green-400 mb-8">MintFinance</h1>

            <nav class="space-y-3">
                <a href="/dashboard" class="block text-gray-300 hover:text-green-400">Dashboard</a>
                <a href="/accounts" class="block text-gray-300 hover:text-green-400">Accounts</a>
                <a href="/budgets" class="block text-gray-300 hover:text-green-400">Budgets</a>
                <a href="/goals" class="block text-gray-300 hover:text-green-400">Goals</a>
                <a href="/bills" class="block text-gray-300 hover:text-green-400">Bills</a>
                <a href="/investments" class="block text-gray-300 hover:text-green-400">Investments</a>
            </nav>
        </div>

        {{-- LOGOUT --}}
        <form method="POST" action="/logout">
            @csrf
            <button class="text-red-400 hover:text-red-500">
                Logout
            </button>
        </form>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 p-10 bg-gradient-to-br from-[#020617] to-[#020617]">
        @yield('content')
    </main>

</div>

</body>
</html>
