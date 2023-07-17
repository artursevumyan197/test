<?php

namespace App\Console\Commands;

use App\Models\Log;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class CleanUpTableEntryCommand extends Command
{
    protected $signature = 'clean:table-entry';
    protected $description = 'Cleans up table entries added after a week with no pivot table entries';

    public function handle()
    {
        // Log the start of the script
        $this->info('Cleaning up table entries...');

        $logStart = Carbon::now();

        $thresholdDate = Carbon::now()->subWeek();

        Product::where('created_at', '<=', $thresholdDate)
            ->whereDoesntHave('user')
            ->delete();

        $logEnd = Carbon::now();

        Log::create([
            'start_time' => $logStart,
            'end_time' => $logEnd,
        ]);

        $this->info('Clean up complete!');
    }
}
