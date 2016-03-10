<?php

    /**
     * Created by PhpStorm.
     * User: jkirkby91
     * Date: 10/03/2016
     * Time: 15:14
     */

    namespace UniApiClient\Enum;

    /**
     * Class HttpErrorCode
     *
     * Implementation of error codes found here https://en.wikipedia.org/wiki/List_of_HTTP_status_codes
     *
     * @TODO check any other nginx status codes
     * @TODO check other web server status codes
     *
     * @package UniApiClient\Enum
     */
    class HttpErrorCode {

        // 4XX Client Error Codes
        const BadRequest = 'Bad Request';//400
        const Unauthorized = 'Unauthorized';//401
        const PaymentRequired = 'Payment Required';//402
        const Forbidden = 'Forbidden';//403
        const NotFound = 'Not Found';//404
        const MethodNotAllowed = 'Method Not Allowed';//405
        const NotAcceptable = 'Not Acceptable';//406
        const ProxyAuthenticationRequired = 'Proxy Authentication Required';//407
        const RequestTimeout = 'Request Timeout';//408
        const Conflict = 'Conflict';//409
        const Gone = 'Gone';//410
        const LengthRequired = 'Length Required';//411
        const PreconditionFailed = 'Precondition Failed';//412
        const PayloadTooLarge = 'Payload Too Large';//413
        const URITooLong = 'URI Too Long';//414
        const UnsupportedMediaType = 'Unsupported Media Type';//415
        const RangeNotSatisfiable = 'Range Not Satisfiable';//416
        const ExpectationFailed = 'Expectation Failed';//417
        const ImATeapot = "I'm a teapot";//418
        const MisdirectedRequest = 'Misdirected Request';//421
        const UnprocessableEntity = 'Unprocessable Entity';//422
        const Locked = 'Locked'; //423
        const FailedDependency = 'Failed Dependency';//424
        const UpgradeRequired = 'Upgrade Required';//426
        const PreconditionRequired = 'Precondition Required';//428
        const TooManyRequests = 'Too Many Requests';//429
        const RequestHeaderFieldsTooLarge = 'Request Header Fields Too Large';//431

        // 5XX Server Error Codes
        const InternalServerError = 'Internal Server Error';//500
        const NotImplemented = 'Not Implemented';//501
        const BadGateway = 'Bad Gateway';//502
        const ServiceUnavailable = 'Service Unavailable';//503
        const GatewayTimeout = 'Gateway Timeout';//504
        const VersionNotSupported = 'HTTP Version Not Supported';//505
        const VariantAlsoNegotiates = 'Variant Also Negotiates';//506
        const InsufficientStorage  = 'Insufficient Storage';//507
        const LoopDetected = 'Loop Detected';//508
        const NotExtended = 'Not Extended';//510
        const NetworkAuthenticationRequired = 'Network Authentication Required';//511

        // Unofficial Codes - not specified in RFC but specific to some 3rd party web services
        const Checkpoint = 'Checkpoint';//103
        const MethodFailure = 'Method Failure';//420
        const BlockedByWindowsParentalControls = 'Blocked by Windows Parental Controls';//450
        const InvalidToken = 'Invalid Token';//498
        const BandwidthLimitExceeded = 'Bandwidth Limit Exceeded';//509

        // IIS Web server specific codes
        const LoginTimeout = 'Login Timeout';//440
        const RetryWith = 'Retry With';//449
        const UnavailableForLegalReasons =  'Unavailable for legal reasons';//451

        // Nginx specific error codes
        const NoResponse = 'No Response'; //444
        const SSLCertificateError = 'SSL Certificate Error'; //495
        const CertificateRequired = 'SSL Certificate Required'; //496
        const HTTPRequestSentToHTTPSPort = 'HTTP Request Sent to HTTPS Port';//497
        const ClientClosedRequest = 'Client Closed Request';//499

        // Cloudlfare error codes
        const UnknownError = 'Unknown Error';//520
        const WebServerIsDown = 'Web Server Is Down';//521
        const ConnectionTimedOut = 'Connection Timed Out';//522
        const OriginIsUnreachable = 'Origin Is Unreachable';//523
        const ATimeoutOccurred = 'A Timeout Occurred';//524
        const SSLHandshakeFailed = 'SSL Handshake Failed';//525
        const InvalidSSLCertificate = 'Invalid SSL Certificate';//526

        // Unknown Status Code
        const UnknownStatusCode = 'Unknown Status Code';//any not listed

        public function __construct(){}

    }