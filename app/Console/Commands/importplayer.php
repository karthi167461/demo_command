<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Console\Modules\SettingsClass;
use App\Console\Modules\TeamClass;
use App\Console\Modules\TeamSaveModule;

class importplayer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import Player for Team';

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
        foreach($settings->teamsName as $teamName)
        {
            $team = new TeamClass($teamName);
            (new TeamSaveModule($team,$this))->getTeamPlayer()->savePlayer();
        }
        
    }
}
