<?php

namespace App\Console\Commands;

use App\Actions\GetStreamTagsAction;
use App\Models\User;
use Illuminate\Console\Command;

class PullStreamTagsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'streams:get-tags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to pull twitch stream tags';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::first();
        if ($user) {
            GetStreamTagsAction::run([
                'user' => $user,
            ]);
        }
        return 0;
    }
}
