<?php

namespace JobSearcherBridge\Request\JobServices;

use JobSearcherBridge\Request\BaseRequest;

/**
 * Request for getting the supported countries for which offers can be searched for
 */
class GetSupportedAreasRequest extends BaseRequest
{
    private const URI = "country-area/get-supported-areas";

    public function getRequestUri(): string
    {
        return self::URI;
    }
}