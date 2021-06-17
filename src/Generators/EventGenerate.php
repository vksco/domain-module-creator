<?php

namespace Vksco\DomainModuleCreator\Generators;

/**
 * Class EventGenerate.
 */
class EventGenerate
{
    /**
     * The Parser instance.
     */
    private $parser;

    /**
     * Create new ModelGenerate instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->paths = app()->make('Path');
        $this->dataSystem = app()->make('Datasystem');
        $this->parser = app()->make('Parser');
    }

    /**
     * Compile model template.
     *
     * @return string
     */
    public function generate($type)
    {
        return "<?php\n\n".view('module-interface::template.events.event', [
            'parser'        => $this->parser,
            'dataSystem'    => $this->dataSystem,
            'namespace'     => $this->paths->getNamespace(),
            'event_type'    => ucfirst($type)
        ])->render();
    }
}
