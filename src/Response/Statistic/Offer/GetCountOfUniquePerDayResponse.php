<?php

namespace JobSearcherBridge\Response\Statistic\Offer;

use JobSearcherBridge\DTO\Statistic\JobSearch\CountOfUniquePerDayDto;
use JobSearcherBridge\Exception\MalformedJsonException;
use JobSearcherBridge\Response\BaseResponse;

/**
 * Response for {@see GetCountOfUniquerPerDayRequest}
 */
class GetCountOfUniquePerDayResponse extends BaseResponse
{
    /**
     * @var CountOfUniquePerDayDto[]
     */
    private array $dtos;

    /**
     * @return array
     */
    public function getDtos(): array
    {
        return $this->dtos;
    }

    /**
     * @param array $dtos
     */
    public function setDtos(array $dtos): void
    {
        $this->dtos = $dtos;
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
        $dtosData  = $dataArray['dtos'] ?? [];
        $dtos      = [];

        foreach ($dtosData as $dtoData) {
            $dtos[] = new CountOfUniquePerDayDto(
                $dtoData['offersCount'],
                $dtoData['year'],
                $dtoData['month'],
                $dtoData['day'],
                $dtoData['extractionId'],
            );
        }

        $response->setDtos($dtos);

        return $response;
    }

}