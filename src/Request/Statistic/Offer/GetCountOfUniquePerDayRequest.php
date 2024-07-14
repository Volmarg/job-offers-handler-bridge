<?php

namespace JobSearcherBridge\Request\Statistic\Offer;

use JobSearcherBridge\Request\BaseRequest;

/**
 * Request for count of unique offers found per day in month of year
 */
class GetCountOfUniquePerDayRequest extends BaseRequest
{
    private const URI = "statistic/offers/count-of-unique-per-day";

    /**
     * @var array $extractionIds
     */
    private array $extractionIds;

    /**
     * @return array
     */
    public function getExtractionIds(): array
    {
        return $this->extractionIds;
    }

    /**
     * @param array $extractionIds
     */
    public function setExtractionIds(array $extractionIds): void
    {
        $this->extractionIds = $extractionIds;
    }

    /**
     * {@inherticdoc}
     */
    public function getRequestUri(): string
    {
        $fullUri = self::URI;
        return $fullUri;
    }

}