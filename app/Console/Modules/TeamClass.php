<?php

namespace App\Console\Modules;


class TeamClass {

     public $teamName;

     public function __construct(string $teamName)
     {
         $this->teamName=$teamName;
     }

}

