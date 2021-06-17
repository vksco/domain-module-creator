<?php

namespace Vksco\DomainModuleCreator\Commands;

use Illuminate\Console\Command;

class ModuleCreate extends Command
{
    public $signature = 'module:create {name} {--api-version=} {--api} {--soft-deletes} {--no-timestamps} {--notifications}';

    public $description = 'Create a module for laravel boilerplate.';

    public function handle()
    {
        $this->comment('Compiling Data & Request...');
        sleep(2);
        $requestApi = app()->make('Request');
        $requestApi->setRequest([
            'TableName'     => $this->argument('name'),
            'template'      => null,
            'softdeletes'   => $this->option('soft-deletes'),
            'no-timestamps' => $this->option('no-timestamps'),
            'notifications' => $this->option('notifications'),
            'version'       => $this->option('api-version'),
        ]);

        $parser     = app()->make('Parser');
        $generator  = app()->make('Generator');

        $commands = [
            [
                'execute'   => array($generator , 'createModel'),
                'type'      => 'Model'
            ], [
                'execute'   => array($generator, 'createEvents'),
                'type'      => 'Events'
            ], [
                'execute'   => array($generator, 'createListners'),
                'type'      => 'Listners'
            ], [
                'execute'   => array($generator, 'createNotifications'),
                'type'      => 'Notifications'
            ], [
                'execute'   => array($generator, 'createObservers'),
                'type'      => 'Observers'
            ], [
                'execute'   => array($generator, 'createServices'),
                'type'      => 'Services'
            ], [
                'execute'   => array($generator, 'createRoutes'),
                'type'      => 'Routes'
            ], [
                'execute'   => array($generator, 'createController'),
                'type'      => 'Controller'
            ], [
                'execute'   => array($generator, 'createRequests'),
                'type'      => 'Requests'
            ], [
                'execute'   => array($generator, 'createMigration'),
                'type'      => 'Requests'
            ]
        ];

        foreach ($commands as $command) {
            $this->runSingleCommand($command['execute'], $command['type']);
        }


        // create HTTP

        $this->comment('');
        $this->comment('All files & assets created successfully, Happy Coding.');
    }

    /**
     * Run command seperatly
     *
     * @param Array $command
     * @param String $type
     */
    private function runSingleCommand($command, $type)
    {
        $this->comment("");
        $this->comment("Creating $type");
        call_user_func($command);
        // sleep(1);
        $this->info("Created $type");
    }
}
