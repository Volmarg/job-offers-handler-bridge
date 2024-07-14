<?php

namespace JobSearcherBridge\DTO\Offers;

/**
 * Represents the salary for job offer
 */
class SalaryDto
{

    /**
     * @var int $salaryMin
     */
    private int $salaryMin = 0;

    /**
     * @var int $salaryMax
     */
    private int $salaryMax = 0;

    /**
     * @var int $salaryAverage
     */
    private int $salaryAverage = 0;

    /**
     * @return int
     */
    public function getSalaryMin(): int
    {
        return $this->salaryMin;
    }

    /**
     * @param int $salaryMin
     */
    public function setSalaryMin(int $salaryMin): void
    {
        $this->salaryMin = $salaryMin;
    }

    /**
     * @return int
     */
    public function getSalaryMax(): int
    {
        return $this->salaryMax;
    }

    /**
     * @param int $salaryMax
     */
    public function setSalaryMax(int $salaryMax): void
    {
        $this->salaryMax = $salaryMax;
    }

    /**
     * @return int
     */
    public function getSalaryAverage(): int
    {
        return $this->salaryAverage;
    }

    /**
     * @param int $salaryAverage
     */
    public function setSalaryAverage(int $salaryAverage): void
    {
        $this->salaryAverage = $salaryAverage;
    }

}