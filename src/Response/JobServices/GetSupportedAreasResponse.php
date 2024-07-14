<?php

namespace JobSearcherBridge\Response\JobServices;

use JobSearcherBridge\Exception\MalformedJsonException;
use JobSearcherBridge\Response\BaseResponse;

class GetSupportedAreasResponse extends BaseResponse
{
    /**
     * @var array $areaNames
     */
    private array $areaNames = [];

    /**
     * @return array
     */
    public function getAreaNames(): array
    {
        return $this->areaNames;
    }

    /**
     * @param array $areaNames
     */
    public function setAreaNames(array $areaNames): void
    {
        $this->areaNames = $areaNames;
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
        $response     = parent::prefillBaseFieldsFromJsonString($json);
        $dataArray    = json_decode($json, true);
        $countryNames = $dataArray['areaNames'];

        $response->setAreaNames($countryNames);

        return $response;
    }

}
