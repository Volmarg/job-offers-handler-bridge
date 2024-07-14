<?php

namespace JobSearcherBridge\Request;

/**
 * Base class for building any bridge between services
 *
 * @package JobSearcherBridge\Request
 */
abstract class BaseRequest
{

    public function __construct(
        private string $requestMethod,
        private string $baseUrl
    ){}

    /**
     * Request Uri to be called
     *
     * @return string
     */
    public abstract function getRequestUri(): string;

    /**
     * @return string
     */
    public function getRequestMethod(): string
    {
        return $this->requestMethod;
    }

    /**
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

}