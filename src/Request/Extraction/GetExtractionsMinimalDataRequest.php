<?php

namespace JobSearcherBridge\Request\Extraction;

use JobSearcherBridge\Request\BaseRequest;

/**
 * Check how many extractions are currently running
 */
class GetExtractionsMinimalDataRequest extends BaseRequest
{
    private const URI = "extraction/get-minimal-data";

    // these are the known extraction ids on search offers tool
    private array $extractionIds;

    // these are the ids stored in the client which calls the job searches (these are NOT extraction ids)
    private array $clientSearchIds;

    public function getExtractionIds(): array
    {
        return $this->extractionIds;
    }

    public function setExtractionIds(array $extractionIds): void
    {
        $this->extractionIds = $extractionIds;
    }

    public function getClientSearchIds(): array
    {
        return $this->clientSearchIds;
    }

    public function setClientSearchIds(array $clientSearchIds): void
    {
        $this->clientSearchIds = $clientSearchIds;
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