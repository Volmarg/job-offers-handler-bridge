<?php

namespace JobSearcherBridge\Request\Extraction;

use JobSearcherBridge\Request\BaseRequest;

/**
 * Check how many extractions are currently running
 */
class CountRunningExtractionsRequest extends BaseRequest
{
    private const URI = "extraction/count-running/";

    private int $hoursOffset = 0;

    /**
     * @return int
     */
    public function getHoursOffset(): int
    {
        return $this->hoursOffset;
    }

    /**
     * @param int $hoursOffset
     */
    public function setHoursOffset(int $hoursOffset): void
    {
        $this->hoursOffset = $hoursOffset;
    }

    /**
     * {@inherticdoc}
     */
    public function getRequestUri(): string
    {
        $fullUri = self::URI . $this->getHoursOffset();
        return $fullUri;
    }

}