<?php

namespace App\Console\Modules;

use Illuminate\Console\Command;



use \Cache;

class CommonFunc {

    protected $teamSize = 5;

    public function saveToCache()
    {
        Cache::put($this->team->teamName,$this->playerInStringFormat);
    }

    public function convertToArray(string $playerInstringParam=null)
    {
        try{
           return explode(",",$playerInstringParam ?? $this->playerInStringFormat);   
        }
        catch(Execption $e)
        {
            $this->terminal->error("Invalid format of input");
        }
    }

    public function getFromCache(string $teamName)
    {
        return Cache::get($teamName);
    }

}