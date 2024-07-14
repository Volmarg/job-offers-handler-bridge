<?php

namespace JobSearcherBridge\DTO\Offers;

/**
 * Contain company details
 */
class CompanyDetailDto
{

    /**
     * @var array $industries
     */
    private array $industries = [];

    /**
     * @var string|null $companyName
     */
    private ?string $companyName = "";

    /**
     * @var array $companyLocations
     */
    private array $companyLocations = [];

    /**
     * @var string|null $websiteUrl
     */
    private ?string $websiteUrl = null;

    /**
     * @var string|null $linkedinProfileUrl
     */
    private ?string $linkedinProfileUrl = null;

    /**
     * @var string|null $employeesRange
     */
    private ?string $employeesRange = null;

    /**
     * @var int|null $ageOld
     */
    private ?int $ageOld = null;

    /**
     * @return string|null
     */
    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    /**
     * @param string|null $companyName
     */
    public function setCompanyName(?string $companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return array
     */
    public function getCompanyLocations(): array
    {
        return $this->companyLocations;
    }

    /**
     * @param array $companyLocations
     */
    public function setCompanyLocations(array $companyLocations): void
    {
        $this->companyLocations = $companyLocations;
    }

    /**
     * @param string $locationName
     */
    public function addCompanyLocation(string $locationName): void
    {
        $this->companyLocations[] = $locationName;
    }

    /**
     * @return array
     */
    public function getIndustries(): array
    {
        return $this->industries;
    }

    /**
     * @param array $industries
     */
    public function setIndustries(array $industries): void
    {
        $this->industries = $industries;
    }

    /**
     * @return string|null
     */
    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    /**
     * @param string|null $websiteUrl
     */
    public function setWebsiteUrl(?string $websiteUrl): void
    {
        $this->websiteUrl = $websiteUrl;
    }

    /**
     * @return string|null
     */
    public function getLinkedinProfileUrl(): ?string
    {
        return $this->linkedinProfileUrl;
    }

    /**
     * @param string|null $linkedinProfileUrl
     */
    public function setLinkedinProfileUrl(?string $linkedinProfileUrl): void
    {
        $this->linkedinProfileUrl = $linkedinProfileUrl;
    }

    /**
     * @return int|null
     */
    public function getAgeOld(): ?int
    {
        return $this->ageOld;
    }

    /**
     * @param int|null $ageOld
     */
    public function setAgeOld(?int $ageOld): void
    {
        $this->ageOld = $ageOld;
    }

    /**
     * @return string|null
     */
    public function getEmployeesRange(): ?string
    {
        return $this->employeesRange;
    }

    /**
     * @param string|null $employeesRange
     */
    public function setEmployeesRange(?string $employeesRange): void
    {
        $this->employeesRange = $employeesRange;
    }

}