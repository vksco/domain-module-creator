<?php

namespace Vksco\DomainModuleCreator\Generators;

/**
 * Class ModelGenerate.
 *
 */
class ModelGenerate
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
    public function generate()
    {
        return "<?php\n\n".view('module-interface::template.model.model', [
            'parser' => $this->parser,
            'dataSystem' => $this->dataSystem,
            'namespace' => $this->paths->getNamespace(),
        ])->render();
    }
}
