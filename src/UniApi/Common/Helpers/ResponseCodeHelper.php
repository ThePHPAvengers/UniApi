<?php

    namespace UniApi\Common\Helpers;

    use GuzzleHttp\Psr7;
    use UniApi\Common\Exception\Http;
    use UniApi\Common\Enum\HttpErrorCode;
    use Psr\Http\Message\ResponseInterface;
    use UniApi\Common\Exception\HttpException;
    use UniApi\Common\Exception\RuntimeException;

    /**
     * Class ResponseCodeHelper
     *
     * @package UniApi\Common\Helpers
     */
    trait ResponseCodeHelper {

        /**
         * @param ResponseInterface $response
         * @param Psr7\Request $request
         *
         * @return mixed
         * @throws \UniApi\Common\Exception\Http\NginxErrors\NoResponseException
         * @throws \UniApi\Common\Exception\RuntimeException
         */
        private function responseCodeAnalyser(ResponseInterface $response,Psr7\Request $request)
        {
            $responseCode = $response->getStatusCode();

            if(is_integer($responseCode)){
                switch ($responseCode) {
                    // 4XX Client Error Codes
                    case 400:
                        return Http\ClientErrors\BadRequestException::class;
                    case 401:
                        return Http\ClientErrors\UnauthorizedException::class;
                    case 402:
                        return Http\ClientErrors\PaymentRequiredException::class;
                    case 403:
                        return Http\ClientErrors\ForbiddenException::class;
                    case 404:
                        return Http\ClientErrors\NotFoundException::class;
                    case 405:
                        return Http\ClientErrors\MethodNotAllowedException::class;
                    case 406:
                        return Http\ClientErrors\NotAcceptableException::class;
                    case 407:
                        return Http\ClientErrors\ProxyAuthenticationRequiredException::class;
                    case 408:
                        return Http\ClientErrors\RequestTimeoutException::class;
                    case 409:
                        return Http\ClientErrors\ConflictException::class;
                    case 410:
                        return Http\ClientErrors\GoneException::class;
                    case 411:
                        return Http\ClientErrors\LengthRequiredException::class;
                    case 412:
                        return Http\ClientErrors\PreconditionFailedException::class;
                    case 413:
                        return Http\ClientErrors\PayloadTooLargeException::class;
                    case 414:
                        return Http\ClientErrors\URITooLongException::class;
                    case 415:
                        return Http\ClientErrors\UnsupportedMediaTypeException::class;
                    case 416:
                        return Http\ClientErrors\RangeNotSatisfiableException::class;
                    case 417:
                        return Http\ClientErrors\ExpectationFailedException::class;
                    case 418:
                        return Http\ClientErrors\ImATeapotException::class;
                    case 421:
                        return Http\ClientErrors\MisdirectedRequestException::class;
                    case 422:
                        return Http\ClientErrors\UnprocessableEntityException::class;
                    case 423:
                        return Http\ClientErrors\LockedException::class;
                    case 424:
                        return Http\ClientErrors\FailedDependencyException::class;
                    case 426:
                        return Http\ClientErrors\UpgradeRequiredException::class;
                    case 428:
                        return Http\ClientErrors\PreconditionRequiredException::class;
                    case 429:
                        return Http\ClientErrors\TooManyRequestsException::class;
                    case 431:
                        return Http\ClientErrors\RequestHeaderFieldsTooLargeException::class;

                    // 5XX Server Error Codes
                    case 500:
                        return Http\ServerErrors\InternalServerErrorException::class;
                    case 501:
                        return Http\ServerErrors\NotImplementedException::class;
                    case 502:
                        return Http\ServerErrors\BadGatewayException::class;
                    case 503:
                        return Http\ServerErrors\ServiceUnavailableException::class;
                    case 504:
                        return Http\ServerErrors\GatewayTimeoutException::class;
                    case 505:
                        return Http\ServerErrors\VersionNotSupportedException::class;
                    case 506:
                        return Http\ServerErrors\VariantAlsoNegotiatesException::class;
                    case 507:
                        return Http\ServerErrors\InsufficientStorageException::class;
                    case 508:
                        return Http\ServerErrors\LoopDetectedException::class;
                    case 510:
                        return Http\ServerErrors\NotExtendedException::class;
                    case 511:
                        return Http\ServerErrors\NetworkAuthenticationRequiredException::class;

                    // Unofficial Codes
                    case 103:
                        return Http\UnofficialErrors\CheckpointException::class;
                    case 420:
                        return Http\UnofficialErrors\MethodFailureException::class;
                    case 450:
                        return Http\UnofficialErrors\BlockedByWindowsParentalControlsException::class;
                    case 498:
                        return Http\UnofficialErrors\InvalidTokenException::class;
                    case 509:
                        return Http\UnofficialErrors\BandwidthLimitExceededException::class;

                    // IIS
                    case 440:
                        return Http\IISErrors\LoginTimeoutException::class;
                    case 449:
                        return Http\IISErrors\RetryWithException::class;
                    case 451:
                        return Http\IISErrors\UnavailableForLegalReasonsException::class;

                    // Nginx
                    case 444:
                        throw new Http\NginxErrors\NoResponseException(HttpErrorCode::NORESPONSE,$responseCode,$request,$response);
                    case 495:
                        return Http\NginxErrors\SSLCertificateErrorException::class;
                    case 496:
                        return Http\NginxErrors\CertificateRequiredException::class;
                    case 497:
                        return Http\NginxErrors\HTTPRequestSentToHTTPSPortException::class;
                    case 499:
                        return Http\NginxErrors\ClientClosedRequestException::class;

                    // Cloudlfare
                    case 520:
                        return Http\CloudFlareErrors\UnknownErrorException::class;
                    case 521:
                        return Http\CloudFlareErrors\WebServerIsDownException::class;
                    case 522:
                        return Http\CloudFlareErrors\ConnectionTimedOutException::class;
                    case 523:
                        return Http\CloudFlareErrors\OriginIsUnreachableException::class;
                    case 524:
                        return Http\CloudFlareErrors\ATimeoutOccurredException::class;
                    case 525:
                        return Http\CloudFlareErrors\SSLHandshakeFailedException::class;
                    case 526:
                        return Http\CloudFlareErrors\InvalidSSLCertificateException::class;
                    default:
                        return HttpException::class;
                }
            } else {
                throw new RuntimeException;
            }
        }
    }