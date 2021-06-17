<?php

namespace Vksco\DomainModuleCreator\Filesystem;

/**
 * Class Path.
 *
 * @author Vikash Sharma <vikashsharma2039@gmail.com>
 */
class Path
{
    /**
     * The Parser instance.
     */
    private $parser;

    /**
     * The Request instance.
     */
    private $request;

    private $data;

    /**
     * Model file path.
     *
     * @var string
     */
    public $modelPath;

    /**
     * Create new Paths instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->parser = app()->make('Parser');

        $this->request = app()->make('Request');
        $this->data = $this->request->getRequest();
    }

    public function getNamespace()
    {
        return "App\\" . config('domain-module-creator.domain_folder_name') . "\\" . ucfirst($this->parser->singular());
    }

    /**
     * Get file path.
     *
     * @return string
     */
    public function modelPath()
    {
        $model_name = ucfirst($this->parser->singular());

        return config('domain-module-creator.domain_path') . "/" .config("domain-module-creator.domain_folder_name") . "/$model_name/Models";
    }

    /**
     * Get file path.
     *
     * @return string
     */
    public function eventPath()
    {
        $model_name = ucfirst($this->parser->singular());

        return config('domain-module-creator.domain_path') . "/" .config("domain-module-creator.domain_folder_name") . "/$model_name/Events";
    }

    /**
     * Get file path.
     *
     * @return string
     */
    public function listnersPath()
    {
        $model_name = ucfirst($this->parser->singular());

        return config('domain-module-creator.domain_path') . "/" .config("domain-module-creator.domain_folder_name") . "/$model_name/Listeners";
    }

    /**
     * Get file path.
     *
     * @return string
     */
    public function notificationsPath()
    {
        $model_name = ucfirst($this->parser->singular());

        return config('domain-module-creator.domain_path') . "/" .config("domain-module-creator.domain_folder_name") . "/$model_name/Notifications";
    }

    /**
     * Get file path.
     *
     * @return string
     */
    public function observersPath()
    {
        $model_name = ucfirst($this->parser->singular());

        return config('domain-module-creator.domain_path') . "/" .config("domain-module-creator.domain_folder_name") . "/$model_name/Observers";
    }

    /**
     * Get file path.
     *
     * @return string
     */
    public function servicesPath()
    {
        $model_name = ucfirst($this->parser->singular());

        return config('domain-module-creator.domain_path') . "/" .config("domain-module-creator.domain_folder_name") . "/$model_name/Services";
    }

    /**
     * Get file path.
     *
     * @return string
     */
    public function routePath()
    {
        $version = "";

        if (array_key_exists('version', $this->data) && $this->data ['version']) {
            $version = strtoupper($this->data['version']);

            return base_path() . "/routes/$version";
        }

        $model_name = ucfirst($this->parser->singular());

        return base_path() . "/routes/$model_name";
    }

    /**
     * Get file path.
     *
     * @return string
     */
    public function controllerPath()
    {
        $version = "";

        if (array_key_exists('version', $this->data) && $this->data ['version']) {
            $version = strtoupper($this->data['version']);
        }

        $model_name = ucfirst($this->parser->singular());

        return config('domain-module-creator.domain_path') . "/" .config("domain-module-creator.domain_folder_name") . "/$model_name/Http/Controllers/$version";
    }

    /**
     * Get file path.
     *
     * @return string
     */
    public function requestsPath()
    {
        $model_name = ucfirst($this->parser->singular());

        return config('domain-module-creator.domain_path') . "/" .config("domain-module-creator.domain_folder_name") . "/$model_name/Http/Requests";
    }
}
