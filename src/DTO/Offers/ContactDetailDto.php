<?php

namespace JobSearcherBridge\DTO\Offers;

/**
 * Contain company details
 */
class ContactDetailDto
{
    /**
     * @var string|null $email
     */
    private ?string $email = "";

    /**
     * @var string|null $phoneNumber
     */
    private ?string $phoneNumber = "";

    /**
     * @var bool $emailFromJobOffer
     */
    private bool $emailFromJobOffer = false;

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string|null $phoneNumber
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function isEmailFromJobOffer(): bool
    {
        return $this->emailFromJobOffer;
    }

    public function setEmailFromJobOffer(bool $emailFromJobOffer): void
    {
        $this->emailFromJobOffer = $emailFromJobOffer;
    }

}