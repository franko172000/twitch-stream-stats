<?php

namespace App\Console\Commands;

use App\Actions\PullActiveStreamsAction;
use App\Models\User;
use Illuminate\Console\Command;

class PullActiveStreamsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'streams:get-active';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to pull active streams from twitch';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::first();
        if ($user) {
            PullActiveStreamsAction::run([
                'user' => $user,
            ]);
        }
        return 0;
    }
}
