<?php

namespace Vksco\DomainModuleCreator\Commands;

use Illuminate\Console\Command;

class DomainModuleCreatorCommand extends Command
{
    public $signature = 'domain-module-creator';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
