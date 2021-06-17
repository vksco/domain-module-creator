<?php

namespace Vksco\DomainModuleCreator\Commands;

use Illuminate\Console\Command;

class ModuleUpdate extends Command
{
    public $signature = 'module:delete {name}';

    public $description = 'Delete a module.';

    public function handle()
    {
        $this->comment('Good job');
    }
}
