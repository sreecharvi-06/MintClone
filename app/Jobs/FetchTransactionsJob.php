<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;

class FetchTransactionsJob implements ShouldQueue
{
    public function handle()
    {
        // Fetch from Plaid
        // Save to DB
    }
}
