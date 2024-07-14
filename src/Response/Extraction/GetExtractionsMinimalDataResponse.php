<?php

namespace JobSearcherBridge\Response\Extraction;

use JobSearcherBridge\Exception\MalformedJsonException;
use JobSearcherBridge\Request\Extraction\GetExtractionsMinimalDataRequest;
use JobSearcherBridge\Response\BaseResponse;

/**
 * Response for {@see GetExtractionsMinimalDataRequest}
 */
class GetExtractionsMinimalDataResponse extends BaseResponse
{
    private array $foundOffersCount = [];
    private array $clientIdStatuses = [];
    private array $clientIdPercentageDone = [];
    private array $clientIdExtractionId = [];

    /**
     * Returns int if extraction id data is present in {@see self::$foundOffersCount}, null otherwise
     *
     * @param int $id
     *
     * @return int|null
     */
    public function getOffersCountForExtractionId(int $id): ?int
    {
        return $this->foundOffersCount[$id] ?? null;
    }

    public function getFoundOffersCount(): array
    {
        return $this->foundOffersCount;
    }

    public function setFoundOffersCount(array $foundOffersCount): void
    {
        $this->foundOffersCount = $foundOffersCount;
    }

    public function getClientIdStatuses(): array
    {
        return $this->clientIdStatuses;
    }

    public function setClientIdStatuses(array $clientIdStatuses): void
    {
        $this->clientIdStatuses = $clientIdStatuses;
    }

    public function getClientIdPercentageDone(): array
    {
        return $this->clientIdPercentageDone;
    }

    public function setClientIdPercentageDone(array $clientIdPercentageDone): void
    {
        $this->clientIdPercentageDone = $clientIdPercentageDone;
    }

    public function getClientIdExtractionId(): array
    {
        return $this->clientIdExtractionId;
    }

    public function setClientIdExtractionId(array $clientIdExtractionId): void
    {
        $this->clientIdExtractionId = $clientIdExtractionId;
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

        $count                  = $dataArray['foundOffersCount'];
        $clientIdStatuses       = $dataArray['clientIdStatuses'];
        $clientIdPercentageDone = $dataArray['clientIdPercentageDone'];
        $clientIdExtractionId   = $dataArray['clientIdExtractionId'];

        $response->setFoundOffersCount($count);
        $response->setClientIdStatuses($clientIdStatuses);
        $response->setClientIdPercentageDone($clientIdPercentageDone);
        $response->setClientIdExtractionId($clientIdExtractionId);

        return $response;
    }

}