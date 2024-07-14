<?php

namespace JobSearcherBridge\Request;

use JobSearcherBridge\DTO\Offers\Filter\JobOfferFilterDto;

/**
 * Request for pinging the job searcher
 *
 * @package JobSearcherBridge\Request
 */
class PingRequest extends BaseRequest
{
    private const URI = "ping/";

    public function getRequestUri(): string
    {
        return self::URI;
    }
}