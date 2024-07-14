<?php

namespace JobSearcherBridge\Response\Offer;

use JobSearcherBridge\DTO\Offers\JobOfferAnalyseResultDto;
use JobSearcherBridge\Exception\MalformedJsonException;
use JobSearcherBridge\Request\Offer\GetSingleOfferRequest;
use JobSearcherBridge\Response\BaseResponse;
use JobSearcherBridge\Service\Serializer\SerializerService;

/**
 * Response for {@see GetSingleOfferRequest}
 */
class GetSingleOfferResponse extends BaseResponse
{
    /**
     * @var JobOfferAnalyseResultDto $offers
     */
    private JobOfferAnalyseResultDto $offer;

    /**
     * @return JobOfferAnalyseResultDto
     */
    public function getOffer(): JobOfferAnalyseResultDto
    {
        return $this->offer;
    }

    /**
     * @param JobOfferAnalyseResultDto $offer
     */
    public function setOffer(JobOfferAnalyseResultDto $offer): void
    {
        $this->offer = $offer;
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

        $dataArray          = json_decode($json, true);
        $jobOfferData       = $dataArray['offerData'];
        $jobOfferJson       = json_encode($jobOfferData);
        $offerAnalyseResult = SerializerService::getSerializer()->deserialize($jobOfferJson, JobOfferAnalyseResultDto::class, "json");

        $response->setOffer($offerAnalyseResult);

        return $response;
    }

}