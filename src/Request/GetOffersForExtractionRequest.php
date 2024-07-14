<?php

namespace JobSearcherBridge\Request;

use JobSearcherBridge\DTO\Offers\Exclusion\ExcludedOfferData;
use JobSearcherBridge\DTO\Offers\Filter\JobOfferFilterDto;

/**
 * Request for fetching the offers for
 *
 * @package JobSearcherBridge\Request
 */
class GetOffersForExtractionRequest extends BaseRequest
{
    private const URI = "offers/get/";

    /**
     * @var int $extractionId
     */
    private int $extractionId;

    /**
     * @var JobOfferFilterDto $filter
     */
    private JobOfferFilterDto $filter;

    /**
     * @var ExcludedOfferData[] $excludedOffersData
     */
    private array $excludedOffersData = [];

    /**
     * @var array $userExtractionIds
     */
    private array $userExtractionIds = [];

    /**
     * @return int
     */
    public function getExtractionId(): int
    {
        return $this->extractionId;
    }

    /**
     * {@inherticdoc}
     */
    public function getRequestUri(): string
    {
        $fullUri = self::URI . $this->getExtractionId();
        return $fullUri;
    }

    /**
     * @param int $extractionId
     */
    public function setExtractionId(int $extractionId): void
    {
        $this->extractionId = $extractionId;
    }

    /**
     * @return JobOfferFilterDto
     */
    public function getFilter(): JobOfferFilterDto
    {
        return $this->filter;
    }

    /**
     * @param JobOfferFilterDto $filter
     */
    public function setFilter(JobOfferFilterDto $filter): void
    {
        $this->filter = $filter;
    }

    /**
     * @return array
     */
    public function getExcludedOffersData(): array
    {
        return $this->excludedOffersData;
    }

    /**
     * @param array $excludedOffersData
     */
    public function setExcludedOffersData(array $excludedOffersData): void
    {
        $this->excludedOffersData = $excludedOffersData;
    }

    /**
     * @return array
     */
    public function getUserExtractionIds(): array
    {
        return $this->userExtractionIds;
    }

    /**
     * @param array $userExtractionIds
     */
    public function setUserExtractionIds(array $userExtractionIds): void
    {
        $this->userExtractionIds = $userExtractionIds;
    }

}