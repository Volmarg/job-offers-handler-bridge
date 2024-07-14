<?php

namespace JobSearcherBridge\DTO\Offers;

use DateTime;

/**
 * Contains all the offer data alongside with contact data etc.
 */
class JobOfferAnalyseResultDto
{
    /**
     * @var string|null $identifier
     */
    private ?string $identifier;

    /**
     * @var string $jobDescription
     */
    private string $jobDescription;

    /**
     * @var string $jobTitle
     */
    private string $jobTitle;

    /**
     * @var string $jobOfferUrl
     */
    private string $jobOfferUrl;

    /**
     * @var string|null $jobOfferLanguage
     */
    private ?string $jobOfferLanguage;

    /**
     * @var SalaryDto $salary
     */
    private SalaryDto $salary;

    /**
     * @var CompanyDetailDto $companyDetail
     */
    private CompanyDetailDto $companyDetail;

    /**
     * @var ContactDetailDto $contactDetail
     */
    private ContactDetailDto $contactDetail;

    /**
     * @var string|null $jobPostedDateTime
     */
    private ?string $jobPostedDateTime = null;

    /**
     * @var array $humanLanguages
     */
    private array $humanLanguages = [];

    /**
     * @var bool $hasMail
     */
    private bool $hasMail = false;

    /**
     * @var bool $hasPhone
     */
    private bool $hasPhone = false;

    /**
     * @var bool $hasSalary
     */
    private bool $hasSalary = false;

    /**
     * @var bool $hasLocation
     */
    private bool $hasLocation = false;

    /**
     * @var bool $hasHumanLanguages
     */
    private bool $hasHumanLanguages = false;

    /**
     * @var bool $hasJobDateTimePostedInformation
     */
    private bool $hasJobDateTimePostedInformation = false;

    /**
     * @var bool $remoteJobMentioned
     */
    private bool $remoteJobMentioned = false;

    /**
     * @var string|null
     */
    private ?string $appliedAt = null;

    /**
     * @return string
     */
    public function getJobDescription(): string
    {
        return $this->jobDescription;
    }

    /**
     * @param string $jobDescription
     */
    public function setJobDescription(string $jobDescription): void
    {
        $this->jobDescription = $jobDescription;
    }

    /**
     * @return string
     */
    public function getJobTitle(): string
    {
        return $this->jobTitle;
    }

    /**
     * @param string $jobTitle
     */
    public function setJobTitle(string $jobTitle): void
    {
        $this->jobTitle = $jobTitle;
    }

    /**
     * @return string
     */
    public function getJobOfferUrl(): string
    {
        return $this->jobOfferUrl;
    }

    /**
     * @param string $jobOfferUrl
     */
    public function setJobOfferUrl(string $jobOfferUrl): void
    {
        $this->jobOfferUrl = $jobOfferUrl;
    }

    /**
     * @return string|null
     */
    public function getJobOfferLanguage(): ?string
    {
        return $this->jobOfferLanguage;
    }

    /**
     * @param string|null $jobOfferLanguage
     */
    public function setJobOfferLanguage(?string $jobOfferLanguage): void
    {
        $this->jobOfferLanguage = $jobOfferLanguage;
    }

    /**
     * @return SalaryDto
     */
    public function getSalary(): SalaryDto
    {
        return $this->salary;
    }

    /**
     * @param SalaryDto $salary
     */
    public function setSalary(SalaryDto $salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return CompanyDetailDto
     */
    public function getCompanyDetail(): CompanyDetailDto
    {
        return $this->companyDetail;
    }

    /**
     * @param CompanyDetailDto $companyDetail
     */
    public function setCompanyDetail(CompanyDetailDto $companyDetail): void
    {
        $this->companyDetail = $companyDetail;
    }

    /**
     * @return ContactDetailDto
     */
    public function getContactDetail(): ContactDetailDto
    {
        return $this->contactDetail;
    }

    /**
     * @param ContactDetailDto $contactDetail
     */
    public function setContactDetail(ContactDetailDto $contactDetail): void
    {
        $this->contactDetail = $contactDetail;
    }

    /**
     * @return string|null
     */
    public function getJobPostedDateTime(): ?string
    {
        return $this->jobPostedDateTime;
    }

    /**
     * @param string|null $jobPostedDateTime
     */
    public function setJobPostedDateTime(?string $jobPostedDateTime): void
    {
        $this->jobPostedDateTime = $jobPostedDateTime;
    }

    /**
     * @return array
     */
    public function getHumanLanguages(): array
    {
        return $this->humanLanguages;
    }

    /**
     * @param array $humanLanguages
     */
    public function setHumanLanguages(array $humanLanguages): void
    {
        $this->humanLanguages = $humanLanguages;
    }

    /**
     * @return bool
     */
    public function isHasMail(): bool
    {
        return $this->hasMail;
    }

    /**
     * @param bool $hasMail
     */
    public function setHasMail(bool $hasMail): void
    {
        $this->hasMail = $hasMail;
    }

    /**
     * @return bool
     */
    public function isHasPhone(): bool
    {
        return $this->hasPhone;
    }

    /**
     * @param bool $hasPhone
     */
    public function setHasPhone(bool $hasPhone): void
    {
        $this->hasPhone = $hasPhone;
    }

    /**
     * @return bool
     */
    public function isHasSalary(): bool
    {
        return $this->hasSalary;
    }

    /**
     * @param bool $hasSalary
     */
    public function setHasSalary(bool $hasSalary): void
    {
        $this->hasSalary = $hasSalary;
    }

    /**
     * @return bool
     */
    public function isHasLocation(): bool
    {
        return $this->hasLocation;
    }

    /**
     * @param bool $hasLocation
     */
    public function setHasLocation(bool $hasLocation): void
    {
        $this->hasLocation = $hasLocation;
    }

    /**
     * @return bool
     */
    public function isHasHumanLanguages(): bool
    {
        return $this->hasHumanLanguages;
    }

    /**
     * @param bool $hasHumanLanguages
     */
    public function setHasHumanLanguages(bool $hasHumanLanguages): void
    {
        $this->hasHumanLanguages = $hasHumanLanguages;
    }

    /**
     * @return bool
     */
    public function isHasJobDateTimePostedInformation(): bool
    {
        return $this->hasJobDateTimePostedInformation;
    }

    /**
     * @param bool $hasJobDateTimePostedInformation
     */
    public function setHasJobDateTimePostedInformation(bool $hasJobDateTimePostedInformation): void
    {
        $this->hasJobDateTimePostedInformation = $hasJobDateTimePostedInformation;
    }

    /**
     * @return string|null
     */
    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    /**
     * @param string|null $identifier
     */
    public function setIdentifier(?string $identifier): void
    {
        $this->identifier = $identifier;
    }

    /**
     * @return bool
     */
    public function isRemoteJobMentioned(): bool
    {
        return $this->remoteJobMentioned;
    }

    /**
     * @param bool $remoteJobMentioned
     */
    public function setRemoteJobMentioned(bool $remoteJobMentioned): void
    {
        $this->remoteJobMentioned = $remoteJobMentioned;
    }

    /**
     * @return string|null
     */
    public function getAppliedAt(): ?string
    {
        return $this->appliedAt;
    }

    /**
     * @param string|null $appliedAt
     */
    public function setAppliedAt(?string $appliedAt): void
    {
        $this->appliedAt = $appliedAt;
    }

}