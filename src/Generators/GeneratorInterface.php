<?php

namespace Vksco\DomainModuleCreator\Generators;

interface GeneratorInterface
{
    /**
     * Generate.
     *
     * @return string|array
     */
    public function generate();
}
