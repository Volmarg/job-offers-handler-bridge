<?php

namespace JobSearcherBridge\Enum\JobOfferExtraction;

enum StatusEnum: string
{
    /**
     * Either new entry or it's in progress
     */
    case STATUS_IN_PROGRESS = "IN_PROGRESS";

    /**
     * Something went wrong and could not extract data at all
     */
    case STATUS_FAILED = "FAILED";

    /**
     * Everything has been fully extracted
     */
    case STATUS_IMPORTED = "IMPORTED";

    /**
     * Something went wrong but managed to continue and extracted part of the data
     */
    case STATUS_PARTIALLY_IMPORTED = "PARTIALLY_IMPORTED";
}
