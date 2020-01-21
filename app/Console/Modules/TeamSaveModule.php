<?php

namespace App\Console\Modules;

use Illuminate\Console\Command;

use App\Console\Modules\CommonFunc;

use \Cache;


class TeamSaveModule extends CommonFunc {

    
    protected $team;

    protected $terminal;

    protected $playerInStringFormat;

    protected $playerInArrayFormat;

    

    public function __construct(TeamClass $team,Command $console)
    {
        $this->team = $team;
        $this->terminal=$console;
    }

    public function getTeamPlayer()
     {
        $this->playerInStringFormat = $this->terminal->ask("Enter ".$this->team->teamName." Teams players:");
        return $this;
     }

     public function savePlayer()
     {
        $this->playerInArrayFormat = $this->convertToArray();
        if($this->checkArrayCount())
        {
            $this->saveToCache();
            $this->terminal->line("Added Successfully");
        }
        else
        {
            $this->terminal->line("Minimum five persons in a team");
        }
        
     }

     public function checkArrayCount()
     {
           if(count($this->playerInArrayFormat) === $this->teamSize)
           {
               return true;
           }
           return false;
     }

}

