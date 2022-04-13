<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

use App\Models\video;

class everyMin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minute :update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Video';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        video::where('created_at', '<', Carbon::now()->subHours(1))->delete();

    }
}
