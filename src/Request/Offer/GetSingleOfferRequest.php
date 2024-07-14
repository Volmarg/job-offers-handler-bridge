<?php

namespace JobSearcherBridge\Request\Offer;

use JobSearcherBridge\DTO\Offers\Filter\JobOfferFilterDto;
use JobSearcherBridge\Request\BaseRequest;

/**
 * Request for fetching single offer
 */
class GetSingleOfferRequest extends BaseRequest
{
    private const URI = "offers/get-single-analysed-offer/";

    /**
     * @var int $offerId
     */
    private int $offerId;

    /**
     * @var JobOfferFilterDto $filter
     */
    private JobOfferFilterDto $filter;

    /**
     * @return int
     */
    public function getOfferId(): int
    {
        return $this->offerId;
    }

    /**
     * @param int $offerId
     */
    public function setOfferId(int $offerId): void
    {
        $this->offerId = $offerId;
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
     * {@inherticdoc}
     */
    public function getRequestUri(): string
    {
        $fullUri = self::URI . $this->getOfferId();
        return $fullUri;
    }

}