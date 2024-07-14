<?php

namespace JobSearcherBridge\Response\Offer;

use JobSearcherBridge\Exception\MalformedJsonException;
use JobSearcherBridge\Request\Offer\GetDescriptionRequest;
use JobSearcherBridge\Response\BaseResponse;

/**
 * Response for {@see GetDescriptionRequest}
 */
class GetDescriptionResponse extends BaseResponse
{
    /**
     * @var string $description
     */
    private string $description = "";

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * {@inheritDoc}
     * @param string $json
     *
     * @return $this
     * @throws MalformedJsonException
     */
    public function prefillBaseFieldsFromJsonString(string $json): static
    {
        $response    = parent::prefillBaseFieldsFromJsonString($json);
        $dataArray   = json_decode($json, true);
        $description = $dataArray['description'];

        $response->setDescription($description);

        return $response;
    }

}