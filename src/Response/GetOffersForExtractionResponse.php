<?php

namespace JobSearcherBridge\Response;

use JobSearcherBridge\DTO\Offers\Filter\Values\FilterValuesDto;
use JobSearcherBridge\DTO\Offers\JobOfferAnalyseResultDto;
use JobSearcherBridge\Exception\MalformedJsonException;
use JobSearcherBridge\Request\GetOffersForExtractionRequest;
use JobSearcherBridge\Service\Serializer\SerializerService;

/**
 * Response for {@see GetOffersForExtractionRequest}
 *
 * @package JobSearcherBridge\Request
 */
class GetOffersForExtractionResponse extends BaseResponse
{
    /**
     * @var JobOfferAnalyseResultDto[] $offers
     */
    private array $offers = [];

    /**
     * @var FilterValuesDto $filterValues
     */
    private FilterValuesDto $filterValues;

    /**
     * @var int $allFoundOffersCount
     */
    private int $allFoundOffersCount;

    /**
     * @var int $returnedOffersCount
     */
    private int $returnedOffersCount;

    /**
     * @return JobOfferAnalyseResultDto[]
     */
    public function getOffers(): array
    {
        return $this->offers;
    }

    /**
     * @param JobOfferAnalyseResultDto[] $offers
     */
    public function setOffers(array $offers): void
    {
        $this->offers = $offers;
    }

    /**
     * @return int
     */
    public function getAllFoundOffersCount(): int
    {
        return $this->allFoundOffersCount;
    }

    /**
     * @param int $allFoundOffersCount
     */
    public function setAllFoundOffersCount(int $allFoundOffersCount): void
    {
        $this->allFoundOffersCount = $allFoundOffersCount;
    }

    /**
     * @return FilterValuesDto
     */
    public function getFilterValues(): FilterValuesDto
    {
        return $this->filterValues;
    }

    /**
     * @param FilterValuesDto $filterValues
     */
    public function setFilterValues(FilterValuesDto $filterValues): void
    {
        $this->filterValues = $filterValues;
    }

    /**
     * @return int
     */
    public function getReturnedOffersCount(): int
    {
        return $this->returnedOffersCount;
    }

    /**
     * @param int $returnedOffersCount
     */
    public function setReturnedOffersCount(int $returnedOffersCount): void
    {
        $this->returnedOffersCount = $returnedOffersCount;
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

        $allDtos                   = [];
        $dataArray                 = json_decode($json, true);
        $offersArray               = $dataArray['offersArray'];
        $filterValuesDataArray     = $dataArray['filterValues'];
        $this->allFoundOffersCount = $dataArray['allFoundOffersCount'];
        $this->returnedOffersCount = $dataArray['returnedOffersCount'];
        foreach ($offersArray as $jobOfferArray) {
            $jobOfferJson = json_encode($jobOfferArray);
            $allDtos[]    = SerializerService::getSerializer()->deserialize($jobOfferJson, JobOfferAnalyseResultDto::class, "json");
        }

        $filterValuesJson = json_encode($filterValuesDataArray);
        $filterValues     = SerializerService::getSerializer()->deserialize($filterValuesJson, FilterValuesDto::class, "json");

        $response->setOffers($allDtos);
        $response->setFilterValues($filterValues);

        return $response;
    }

}