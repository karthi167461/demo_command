<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use App\Console\Modules\SettingsClass;
use App\Console\Modules\startGame as startGameClass;
class startgame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start the game';

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
     * @return mixed
     */
    public function handle(SettingsClass $settings)
    {
        (new startGameClass($this,$settings))->play();
    }
}
