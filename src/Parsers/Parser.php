<?php

namespace Vksco\DomainModuleCreator\Parsers;

use Illuminate\Support\Str;

/**
 * Class Parser.
 *
 * @author Vikash Sharma <vikashsharma2039@gmail.com>
 */
class Parser
{
    /**
     * Parser data.
     *
     * @var array
     */
    protected $data;

    /**
     * Create new Parser instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->data = $request;
    }

    /**
     * Get the entity name singular.
     *
     * @return string
     */
    public function singular()
    {
        return Str::singular(Str::slug($this->data['TableName'], '_'));
    }

    /**
     * Get the entity name plural.
     *
     * @return string
     */
    public function plural()
    {
        return Str::plural(Str::slug($this->data['TableName'], '_'));
    }

    /**
     * Uppercase-ing the first charechter in the entity name.
     *
     * @return string
     */
    public function upperCaseFirst()
    {
        return ucfirst($this->singular());
    }

    /**
     * Replace String
     *
     * @return string
     */
    public function strReplace($replaceString, $withString, $originalString)
    {
        return Str::replace($replaceString, $withString, $originalString);
    }

    /**
     * Get Template.
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->data['template'];
    }

    /**
     * Parse template specification.
     *
     * @throws Exception
     *
     * @return string
     */
    public function getParse()
    {
        if (starts_with($this->data['template'], 'boot')) {
            return 'Bt';
        } else {
            return 'Mt';
        }

        throw new \Exception('Template Error');
    }
}
