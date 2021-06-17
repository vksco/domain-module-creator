<?php

namespace Vksco\DomainModuleCreator\Request;

/**
 * Class Request.
 *
 * @author Vikash Sharma <vikashsharma2039@gmail.com>
 */
class Request
{
    /**
     * Request.
     *
     * @var array
     */
    protected $request;

    /**
     * Set request.
     *
     * @param array $request
     *
     * @return void
     */
    public function setRequest(array $request)
    {
        $this->request = $request;
    }

    /**
     * Get request.
     *
     * @return array $request
     */
    public function getRequest()
    {
        return $this->request;
    }
}
