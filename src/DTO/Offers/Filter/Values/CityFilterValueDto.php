<?php

namespace JobSearcherBridge\DTO\Offers\Filter\Values;

/**
 * Provides city based values to be used in filtering
 */
class CityFilterValueDto
{

    /**
     * @var int $offersCount
     */
    private int $offersCount = 0;

    public function __construct(
        private readonly string $cityName,
    ) {
    }

    /**
     * @return string
     */
    public function getCityName(): string
    {
        return $this->cityName;
    }

    /**
     * @return int
     */
    public function getOffersCount(): int
    {
        return $this->offersCount;
    }

    public function increaseCount(): void
    {
        $this->offersCount++;
    }
}