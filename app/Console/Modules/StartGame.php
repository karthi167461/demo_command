<?php

namespace App\Console\Modules;

use App\Console\Modules\CommonFunc;
use App\Console\Modules\SettingsClass;
use Illuminate\Console\Command;


class StartGame extends CommonFunc {

    protected $terminal;

    protected $settings;

    protected $teams=[];

     public function __construct(Command $console,SettingsClass $settings)
     {
         $this->settings = $settings;
        $this->terminal=$console;
     }

     public function setTeamValue(string $teamName)
     {
         $team = $this->convertToArray($this->getFromCache($teamName));
         if(is_array($team) && count($team) == 5)
         {
            $this->teams[] = $team;
         }
         else
         {
            $this->terminal->error("please import team first!!!.");
            exit;
         }
        
     }

     public function loadTeamArray()
     {
         foreach($this->settings->teamsName as $teamName)
         {
             $this->setTeamValue($teamName);
         }
     }

     public function play()
     {
         $this->loadTeamArray();
         for($i=0;$i<$this->teamSize;$i++)
         {
                if($this->teams[0][$i] < $this->teams[1][$i])
                {
                    $this->terminal->line("you lose");
                    return false;
                }
         }
         $this->terminal->line("you won");
     }



    

}

