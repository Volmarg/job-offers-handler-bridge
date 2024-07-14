<?php

namespace JobSearcherBridge\Response\Extraction;

use JobSearcherBridge\Exception\MalformedJsonException;
use JobSearcherBridge\Request\Extraction\CountRunningExtractionsRequest;
use JobSearcherBridge\Response\BaseResponse;

/**
 * Response for {@see CountRunningExtractionsRequest}
 */
class CountRunningExtractionsResponse extends BaseResponse
{
    private int $count = 0;

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount(int $count): void
    {
        $this->count = $count;
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
        $response  = parent::prefillBaseFieldsFromJsonString($json);
        $dataArray = json_decode($json, true);
        $count     = $dataArray['count'];

        $response->setCount($count);

        return $response;
    }

}