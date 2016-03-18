<?php

    namespace UniApi\Common\Enum;

    /**
     * Class HttpErrorCode
     *
     * Implementation of error codes found here https://en.wikipedia.org/wiki/List_of_HTTP_status_codes
     *
     * @TODO check any other nginx status codes
     * @TODO check other web server status codes
     *
     * @package UniApi\Common\Enum
     */
    class HttpErrorCode
    {

        // 4XX Client Error Codes
        const BADREQUEST = 'Bad Request';//400
        const UNAUTHORIZED = 'Unauthorized';//401
        const PAYMENTREQUIRED = 'Payment Required';//402
        const FORBIDDEN = 'Forbidden';//403
        const NOTFOUND = 'Not Found';//404
        const METHODNOTALLOWED = 'Method Not Allowed';//405
        const NOTACCEPTABLE = 'Not Acceptable';//406
        const PROXYAUTHENTICATIONREQUIRED = 'Proxy Authentication Required';//407
        const REQUESTTIMEOUT = 'Request Timeout';//408
        const CONFLICT = 'Conflict';//409
        const GONE = 'Gone';//410
        const LENGTHREQUIRED = 'Length Required';//411
        const PRECONDITIONFAILED = 'Precondition Failed';//412
        const PAYLOADTOOLARGE = 'Payload Too Large';//413
        const URITOOLONG = 'URI Too Long';//414
        const UNSUPPORTEDMEDIATYPE = 'Unsupported Media Type';//415
        const RANGENOTSATISFIABLE = 'Range Not Satisfiable';//416
        const EXCEPTIONFAILED = 'Expectation Failed';//417
        const IMATEAPOT = "I'm a teapot";//418
        const MISREDIRECTEDREQUEST = 'Misdirected Request';//421
        const UNPROCESSABLEENTITY = 'Unprocessable Entity';//422
        const LOCKED = 'Locked'; //423
        const FAILEDDEPENDACY = 'Failed Dependency';//424
        const UPGRADEREQUIRED = 'Upgrade Required';//426
        const PRECONDITIONREQUIRED = 'Precondition Required';//428
        const TOOMANYREQUESTS = 'Too Many Requests';//429
        const REQUESTHEADERFIELDSTOOLARGE = 'Request Header Fields Too Large';//431

        // 5XX Server Error Codes
        const INTERNALSERVERERRO = 'Internal Server Error';//500
        const NOTIMPLEMENTED = 'Not Implemented';//501
        const BADGATEWAY = 'Bad Gateway';//502
        const SERVICEUNAVALIBLE = 'Service Unavailable';//503
        const GATEWAYTIMEOUT = 'Gateway Timeout';//504
        const VERSIONNOTSUPPORTED = 'HTTP Version Not Supported';//505
        const VARIANTLASONEGOTIATES = 'Variant Also Negotiates';//506
        const INSUFFICIENTSTORAGE  = 'Insufficient Storage';//507
        const LOOPDETECTED = 'Loop Detected';//508
        const NOTEXTENDED = 'Not Extended';//510
        const NETWORKAUTHENTICATIONREUIRED = 'Network Authentication Required';//511

        // Unofficial Codes - not specified in RFC but specific to some 3rd party web services
        const CHECKPOIINT = 'Checkpoint';//103
        const METODFAILURE = 'Method Failure';//420
        const BLOCKEDBYWINDOWSPARENTALCONTROLS = 'Blocked by Windows Parental Controls';//450
        const INVALIDTOKEN = 'Invalid Token';//498
        const BANDWIDTHLIMITEXCEEDED = 'Bandwidth Limit Exceeded';//509

        // IIS Web server specific codes
        const LOGINTIMEOUT = 'Login Timeout';//440
        const RETRYWITH = 'Retry With';//449
        const UNAVALIBLEFORLEGALREASONS =  'Unavailable for legal reasons';//451

        // Nginx specific error codes
        const NORESPONSE = 'No Response'; //444
        const SSLCERTIFICATEERROR = 'SSL Certificate Error'; //495
        const CERTIFICATEREQUIRED = 'SSL Certificate Required'; //496
        const HTTPSREQUESTSENTTOHTTPSPORT = 'HTTP Request Sent to HTTPS Port';//497
        const CLIENTCLOSEDREQUEST = 'Client Closed Request';//499

        // Cloudlfare error codes
        const UNKNOWNERROR = 'Unknown Error';//520
        const WEBSERVERISDOWN = 'Web Server Is Down';//521
        const CONNECTIONTIMEOUT = 'Connection Timed Out';//522
        const ORIGINISUNREACHABLE = 'Origin Is Unreachable';//523
        const ATIMEOUTOCCURED = 'A Timeout Occurred';//524
        const SSLHANDSHAKEFAILED = 'SSL Handshake Failed';//525
        const InvalidSSLCeINVALIDSSLCERTIFICATErtificate = 'Invalid SSL Certificate';//526

        // Unknown Status Code
        const UNKNOWNSTATUSCODE = 'Unknown Status Code';//any not listed

        public function __construct(){}

    }