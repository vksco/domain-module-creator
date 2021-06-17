<?php

namespace Vksco\DomainModuleCreator\Generators;

use Vksco\DomainModuleCreator\Filesystem\Filesystem;


/**
 * Class     Generator.
 *
 * @author Vikash Sharma <vikashsharma2039@gmail.com>
 */
class Generator extends Filesystem
{

    /**
     * The ModelGenerate instance.
     */
    private $model;

    /**
     * The EventGenerate instance.
     */
    private $event;

    /**
     * The ListnerGenerate instance.
     */
    private $listners;

    /**
     * The NotificationGenerator instance.
     */
    private $notifications;

    /**
     * The ObserverGenerator instance.
     */
    private $observers;

    /**
     * The ServiceGenerator instance.
     */
    private $services;

    /**
     * The RouteGenerator instance.
     */
    private $routes;

    /**
     * The ControllerGenerator instance.
     */
    private $controller;

    /**
     * The RequestsGenerator instance.
     */
    private $requests;

    /**
     * The Parser instance.
     */
    private $parser;

    /**
     * The Path Instance
     */
    private $paths;

    /**
     * The Request Instance
     */
    private $request;

    /**
     * Create new Generator instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->paths        = app()->make('Path');
        $this->parser       = app()->make('Parser');
        $this->request      = app()->make('Request');

        $this->model        = app()->make('ModelGenerate');
        $this->event        = app()->make('EventGenerate');
        $this->listners     = app()->make('ListenerGenerator');
        $this->notifications= app()->make('NotificationGenerator');
        $this->observers    = app()->make('ObserverGenerator');
        $this->services     = app()->make('ServiceGenerator');
        $this->routes       = app()->make('RouteGenerator');
        $this->controller   = app()->make('ControllerGenerator');
        $this->requests     = app()->make('RequestsGenerator');
        $this->migration    = app()->make('MigartionGenerator');
    }

    /**
     * Generate Model.
     *
     * @return void
     */
    public function createModel()
    {
        $this->makeDir($this->paths->modelPath());
        $this->make($this->paths->modelPath() . '/' . ucfirst($this->parser->singular()) . '.php', $this->model->generate());
    }

    /**
     * Generate Events.
     *
     * @return void
     */
    public function createEvents()
    {
        $eventTypes = config('domain-module-creator.event_types');

        $this->makeDir($this->paths->eventPath());
        foreach ($eventTypes as $key => $eventType) {
            $this->make($this->paths->eventPath() . '/' . ucfirst($this->parser->singular()) . ucfirst($eventType) . '.php', $this->event->generate($eventType));
        }
    }

    /**
     * Generate Listners.
     *
     * @return void
     */
    public function createListners()
    {
        $this->makeDir($this->paths->listnersPath());
        $this->make($this->paths->listnersPath() . '/' . ucfirst($this->parser->singular()) . 'EventListners' . '.php', $this->listners->generate());
    }

    /**
     * Generate notifications.
     *
     * @return void
     */
    public function createNotifications()
    {
        $data = $this->request->getRequest();

        // checl if request has notification to create
        if( $data['notifications'] == false ) return;

        $this->makeDir($this->paths->notificationsPath());
        $eventTypes = config('domain-module-creator.event_types');

        foreach ($eventTypes as $key => $eventType) {
            $this->make($this->paths->notificationsPath() . '/' . ucfirst($this->parser->singular()) . ucfirst($eventType) ."Notification" . '.php', $this->notifications->generate($eventType));
        }
    }

    /**
     * Generate Observers.
     *
     * @return void
     */
    public function createObservers()
    {
        $this->makeDir($this->paths->observersPath());
        $this->make($this->paths->observersPath() . '/' . ucfirst($this->parser->singular()) . 'Observer' . '.php', $this->observers->generate());
    }

    /**
     * Generate Services.
     *
     * @return void
     */
    public function createServices()
    {
        $this->makeDir($this->paths->servicesPath());
        $this->make($this->paths->servicesPath() . '/' . ucfirst($this->parser->singular()) . 'Service' . '.php', $this->services->generate());
    }

    /**
     * Generate Routes.
     *
     * @return void
     */
    public function createRoutes()
    {
        $this->makeDir($this->paths->routePath());
        $this->make($this->paths->routePath() . '/' . $this->parser->singular() . '.php', $this->routes->generate());
    }

    /**
     * Generate create Controller.
     *
     * @return void
     */
    public function createController()
    {
        $this->makeDir($this->paths->controllerPath());
        $this->make($this->paths->controllerPath() . '/' . ucfirst($this->parser->singular()) . 'Controller.php', $this->controller->generate());
    }

    /**
     * Generate Requests.
     *
     * @return void
     */
    public function createRequests()
    {
        $eventTypes = ['store', 'edit', 'delete', 'update'];
        $this->makeDir($this->paths->requestsPath());

        foreach ($eventTypes as $key => $eventType) {
            $this->make($this->paths->requestsPath() . '/' . ucFirst($eventType) . ucfirst($this->parser->singular()) . 'Request.php', $this->requests->generate($eventType));
        }
    }

    /**
     * Generate Migration.
     *
     * @return void
     */
    public function createMigration()
    {
        $fileName = date('Y').'_'.date('m').'_'.date('d').'_'.date('his').'_create_'.$this->parser->plural().'_table.php';

        $this->make(database_path() . "/migrations/" . $fileName , $this->migration->generate());
    }

}
