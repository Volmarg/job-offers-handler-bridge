<?php

namespace JobSearcherBridge\Service;

use GuzzleHttp\Exception\ClientException;
use JobSearcherBridge\Request\BaseRequest;
use JobSearcherBridge\Request\Extraction\CountRunningExtractionsRequest;
use JobSearcherBridge\Request\Extraction\GetExtractionsMinimalDataRequest;
use JobSearcherBridge\Request\GetOffersForExtractionRequest;
use JobSearcherBridge\Request\JobServices\GetSupportedAreasRequest;
use JobSearcherBridge\Request\Offer\GetDescriptionRequest;
use JobSearcherBridge\Request\Offer\GetSingleOfferRequest;
use JobSearcherBridge\Request\PingRequest;
use JobSearcherBridge\Request\Statistic\Offer\GetCountOfUniquePerDayRequest;
use JobSearcherBridge\Response\Extraction\CountRunningExtractionsResponse;
use JobSearcherBridge\Response\Extraction\GetExtractionsMinimalDataResponse;
use JobSearcherBridge\Response\GetOffersForExtractionResponse;
use JobSearcherBridge\Response\BaseResponse;
use JobSearcherBridge\Response\JobServices\GetSupportedAreasResponse;
use JobSearcherBridge\Response\Offer\GetDescriptionResponse;
use JobSearcherBridge\Response\Offer\GetSingleOfferResponse;
use JobSearcherBridge\Response\PingResponse;
use JobSearcherBridge\Response\Statistic\Offer\GetCountOfUniquePerDayResponse;
use JobSearcherBridge\Service\External\GuzzleHttpService;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use JobSearcherBridge\Service\Jwt\JwtTokenService;
use JobSearcherBridge\Service\Serializer\SerializerService;
use LogicException;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Logger;
use Symfony\Component\HttpFoundation\Request;
use Throwable;
use TypeError;

/**
 * Class BridgeService - used for performing calls toward other / external service (project)
 * @package JobSearcherBridge
 */
class BridgeService
{
    private const TOKEN_QUERY_NAME = "jwt";

    private GuzzleHttpService $guzzleHttpService;

    private Logger $logger;

    public function __construct(
        private readonly JwtTokenService $jwtTokenService,
        readonly string                  $logFilePath,
        readonly string                  $loggerName
    )
    {
        $handler = new RotatingFileHandler($this->logFilePath, 4, Logger::DEBUG);

        $this->guzzleHttpService = new GuzzleHttpService();
        $this->logger            = new Logger($loggerName);
        $this->logger->pushHandler($handler);
    }

    /**
     * Will call the job search for the job offers found for given extraction
     *
     * @throws GuzzleException
     */
    public function getOffersForExtraction(GetOffersForExtractionRequest $request): GetOffersForExtractionResponse
    {
        $response = new GetOffersForExtractionResponse();

        /** @var GetOffersForExtractionResponse */
        $baseResponse = $this->sendRequest($request, $response);

        return $baseResponse;
    }

    /**
     * Will ping the job searcher
     *
     * @throws GuzzleException
     */
    public function ping(PingRequest $request): PingResponse
    {
        $response = new PingResponse();

        /** @var PingResponse */
        $baseResponse = $this->sendRequest($request, $response);

        return $baseResponse;
    }

    /**
     * For more information see {@see GetSupportedAreasRequest}
     *
     * @throws GuzzleException
     */
    public function getSupportedAreaNames(GetSupportedAreasRequest $request): GetSupportedAreasResponse
    {
        $response = new GetSupportedAreasResponse();

        /** @var GetSupportedAreasResponse */
        $baseResponse = $this->sendRequest($request, $response);

        return $baseResponse;
    }

    /**
     * For more information see {@see GetDescriptionRequest}
     *
     * @throws GuzzleException
     */
    public function getOfferDescription(GetDescriptionRequest $request): GetDescriptionResponse
    {
        $response = new GetDescriptionResponse();

        /** @var GetDescriptionResponse */
        $baseResponse = $this->sendRequest($request, $response);

        return $baseResponse;
    }

    /**
     * For more information see {@see GetCountOfUniquePerDayRequest}
     *
     * @throws GuzzleException
     */
    public function getCountOfUniquePerDay(GetCountOfUniquePerDayRequest $request): GetCountOfUniquePerDayResponse
    {
        $response = new GetCountOfUniquePerDayResponse();

        /** @var GetCountOfUniquePerDayResponse */
        $baseResponse = $this->sendRequest($request, $response);

        return $baseResponse;
    }

    /**
     * For more information see {@see GetSingleOfferRequest}
     *
     * @throws GuzzleException
     */
    public function getSingleOffer(GetSingleOfferRequest $request): GetSingleOfferResponse
    {
        $response = new GetSingleOfferResponse();

        /** @var GetSingleOfferResponse $baseResponse */
        $baseResponse = $this->sendRequest($request, $response);

        return $baseResponse;
    }

    /**
     * For more information see {@see CountRunningExtractionsRequest}
     *
     * @throws GuzzleException
     */
    public function countRunningExtractions(CountRunningExtractionsRequest $request): CountRunningExtractionsResponse
    {
        $response = new CountRunningExtractionsResponse();

        /** @var CountRunningExtractionsResponse $baseResponse */
        $baseResponse = $this->sendRequest($request, $response);

        return $baseResponse;
    }

    /**
     * For more information see {@see GetExtractionsMinimalDataRequest}
     *
     * @throws GuzzleException
     */
    public function getExtractionsMinimalData(GetExtractionsMinimalDataRequest $request): GetExtractionsMinimalDataResponse
    {
        $response = new GetExtractionsMinimalDataResponse();

        /** @var GetExtractionsMinimalDataResponse $baseResponse */
        $baseResponse = $this->sendRequest($request, $response);

        return $baseResponse;
    }

    /**
     * Performs base request for any type of request and returns base response
     *
     * @param BaseRequest  $baseRequest
     * @param BaseResponse $response
     * @return BaseResponse
     * @throws GuzzleException
     */
    private function sendRequest(BaseRequest $baseRequest, BaseResponse $response): BaseResponse
    {
        try {
            $jwtToken          = $this->jwtTokenService->encode();
            $absoluteCalledUrl = $this->buildAbsoluteCalledUrlForRequest($baseRequest, $jwtToken);

            $this->logCalledApiMethod($baseRequest, $absoluteCalledUrl);

            $guzzleResponse = $this->sendGuzzleRequest($baseRequest, $absoluteCalledUrl);
            $response->prefillBaseFieldsFromJsonString($guzzleResponse);

            $this->logResponse($response);
        } catch (Exception|TypeError $e) {
            $this->logThrowable($e);

            if ($e instanceof ClientException) {
                if (
                        $e->getResponse()->getStatusCode() >= 400
                    &&  $e->getResponse()->getStatusCode() < 500
                ) {
                    return $response->prefillBadRequest($e->getResponse()->getStatusCode());
                }
            }

            return $response->prefillInternalBridgeError();
        }

        return $response;
    }

    /**
     * Will return the absolute url to be called by guzzle
     *
     * @param BaseRequest $request
     * @param string      $jwtToken
     *
     * @return string
     */
    private function buildAbsoluteCalledUrlForRequest(BaseRequest $request, string $jwtToken): string
    {
        $outputUrl = $request->getBaseUrl();
        if (!str_ends_with($outputUrl, DIRECTORY_SEPARATOR)) {
            $outputUrl .= DIRECTORY_SEPARATOR;
        }

        return $outputUrl . $request->getRequestUri() . "?" . self::TOKEN_QUERY_NAME . "=" . $jwtToken;
    }

    /**
     * @param Throwable $e
     */
    private function logThrowable(Throwable $e): void
    {
        $this->logger->critical("Exception was thrown", [
            "message" => $e->getMessage(),
            "code"    => $e->getCode(),
            "trace"   => $e->getTraceAsString(),
        ]);
    }

    /**
     * Will log information about current api call
     *
     * @param BaseRequest $request
     * @param string      $absoluteCalledUrl
     */
    private function logCalledApiMethod(BaseRequest $request, string $absoluteCalledUrl): void
    {
        $this->logger->info("Now calling api: ", [
            "calledMethod"  => debug_backtrace()[1]['function'], // need to use backtrace to get the correct calling method
            "baseUrl"       => $absoluteCalledUrl,
            "requestUri"    => $request->getRequestUri(),
        ]);
    }

    /**
     * Will log the response data
     *
     * @param BaseResponse $response
     */
    private function logResponse(BaseResponse $response): void
    {
        $this->logger->info("Got response from called endpoint", [
            // logging small chunk else the log will be big soon enough, due to for example fetching offers descriptions etc.
            "response" => substr($response->toJson(), 0, 400) . "...",
        ]);
    }

    /**
     * Will send request via guzzle and return the string response
     *
     * @param BaseRequest $baseRequest
     * @param string      $absoluteCalledUrl
     *
     * @return string
     * @throws GuzzleException
     */
    private function sendGuzzleRequest(BaseRequest $baseRequest, string $absoluteCalledUrl): string
    {
        $baseRequestJson  = SerializerService::getSerializer()->serialize($baseRequest, "json");
        $baseRequestArray = json_decode($baseRequestJson, true);

        switch ($baseRequest->getRequestMethod())
        {
            case Request::METHOD_POST:
            {
                return $this->guzzleHttpService->sendPostRequest($absoluteCalledUrl, $baseRequestArray);
            }

            case Request::METHOD_GET:
            {
                return $this->guzzleHttpService->sendGetRequest($absoluteCalledUrl);
            }

            default:
            {
                throw new LogicException("Sending guzzle request for method type: {$baseRequest->getRequestMethod()}");
            }
        }

    }

}