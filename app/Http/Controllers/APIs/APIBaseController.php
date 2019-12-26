<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use App\Http\Controllers\Controller;

class APIBaseController extends Controller
{
    /**
     * @var int
     */
    protected $statusCode = 200;

    /**
     * Get the status code for the API
     *
     * @return mixed
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Set the status code for the API
     *
     * @param mixed $statusCode
     * @return $this
     *
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     *
     * @param string $message
     * @param array $headers
     * @return $mixed
     *
     */
    public function respond($data, $headers=[])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }

    /**
     *
     * @param string $message
     * @return $mixed
     *
     */
    public function respondWithError($message, $errors)
    {
        return $this->respond([
            'success'       => false,
            'response_code' => $this->getStatusCode(),
            'message'       => $message,
            'errors'        => $errors,
        ]);
    }

    /**
     * -----------------------------------------------------------------------------------------------------------
     * INFORMATIONAL 1XX
     * -----------------------------------------------------------------------------------------------------------
     *
     * HTTP_CONTINUE                                                    = 100
     * HTTP_SWITCHING_PROTOCOLS                                         = 101
     * HTTP_PROCESSING                                                  = 102
     *
     * -----------------------------------------------------------------------------------------------------------
     */

    /**
     * -----------------------------------------------------------------------------------------------------------
     * SUCCESSFULL 2XX
     * -----------------------------------------------------------------------------------------------------------
     *
     * HTTP_ACCEPTED                                                    = 202
     * HTTP_NON_AUTHORITATIVE_INFORMATION                               = 203
     * HTTP_NO_CONTENT                                                  = 204
     * HTTP_RESET_CONTENT                                               = 205
     * HTTP_PARTIAL_CONTENT                                             = 206
     * HTTP_MULTI_STATUS                                                = 207
     * HTTP_ALREADY_REPORTED                                            = 208
     * HTTP_IM_USED                                                     = 226
     *
     * -----------------------------------------------------------------------------------------------------------
     */

    /**
     * HTTP_OK = 200
     *
     * @param string $message
     * @return $mixed
     *
     */
    public function respondSuccess($message, $data = [])
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_OK)->respond([
            'success'       => true,
            'response_code' => $this->getStatusCode(),
            'message'       => $message,
            'data'          => $data,
        ]);
    }

    /**
     * HTTP_CREATED = 201
     *
     * @param string $message
     * @return $mixed
     *
     */
    public function respondCreated($message)
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CREATED)->respond([
            'success'       => true,
            'response_code' => $this->getStatusCode(),
            'message'       => $message,
        ]);
    }

    /**
     * -----------------------------------------------------------------------------------------------------------
     * REDIRECTION 3XX
     * -----------------------------------------------------------------------------------------------------------
     *
     * HTTP_MULTIPLE_CHOICES                                            = 300
     * HTTP_MOVED_PERMANENTLY                                           = 301
     * HTTP_FOUND                                                       = 302
     * HTTP_SEE_OTHER                                                   = 303
     * HTTP_NOT_MODIFIED                                                = 304
     * HTTP_USE_PROXY                                                   = 305
     * HTTP_RESERVED                                                    = 306
     * HTTP_TEMPORARY_REDIRECT                                          = 307
     * HTTP_PERMANENTLY_REDIRECT                                        = 308
     *
     * -----------------------------------------------------------------------------------------------------------
     */

    /**
     * -----------------------------------------------------------------------------------------------------------
     * CLIENT ERROR 4XX
     * -----------------------------------------------------------------------------------------------------------
     *
     * HTTP_PAYMENT_REQUIRED                                            = 402
     * HTTP_METHOD_NOT_ALLOWED                                          = 405
     * HTTP_NOT_ACCEPTABLE                                              = 406
     * HTTP_PROXY_AUTHENTICATION_REQUIRED                               = 407
     * HTTP_REQUEST_TIMEOUT                                             = 408
     * HTTP_GONE                                                        = 410
     * HTTP_LENGTH_REQUIRED                                             = 411
     * HTTP_PRECONDITION_FAILED                                         = 412
     * HTTP_REQUEST_ENTITY_TOO_LARGE                                    = 413
     * HTTP_REQUEST_URI_TOO_LONG                                        = 414
     * HTTP_UNSUPPORTED_MEDIA_TYPE                                      = 415
     * HTTP_REQUESTED_RANGE_NOT_SATISFIABLE                             = 416
     * HTTP_EXPECTATION_FAILED                                          = 417
     * HTTP_I_AM_A_TEAPOT                                               = 418
     * HTTP_LOCKED                                                      = 423
     * HTTP_FAILED_DEPENDENCY                                           = 424
     * HTTP_RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL   = 425
     * HTTP_UPGRADE_REQUIRED                                            = 426
     * HTTP_PRECONDITION_REQUIRED                                       = 428
     * HTTP_TOO_MANY_REQUESTS                                           = 429
     * HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE                             = 431
     * HTTP_UNAVAILABLE_FOR_LEGAL_REASONS                               = 451
     *
     * -----------------------------------------------------------------------------------------------------------
     */

    /**
     * HTTP_BAD_REQUEST = 400
     *
     * @param string $message
     * @return $mixed
     *
     */
    public function respondBadRequest($message = 'Not Allowed',$errors = [])
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_BAD_REQUEST)->respondWithError($message , $errors);
    }

    /**
     * HTTP_UNAUTHORIZED = 401
     *
     * @param string $message
     * @return $mixed
     *
     */
    public function respondUnauthorized($message = 'Not Allowed', $errors = [])
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNAUTHORIZED)->respondWithError($message, $errors);
    }

    /**
     * HTTP_FORBIDDEN = 403
     *
     * @param string $message
     * @return $mixed
     *
     */
    public function respondForbidden($message = 'Not Accessible', $errors = [])
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_FORBIDDEN)->respondWithError($message, $errors);
    }

    /**
     * HTTP_NOT_FOUND = 404
     *
     * @param string $message
     * @return $mixed
     *
     */
    public function respondNotFound($message = 'Not Found', $errors = [])
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_NOT_FOUND)->respondWithError($message, $errors);
    }

    /**
     *  HTTP_CONFLICT = 409
     *
     * @param string $message
     * @return $mixed
     *
     */
    public function respondConflict($message = 'Already Exist', $errors = [])
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_CONFLICT)->respondWithError($message, $errors);
    }

    /**
     * HTTP_UNPROCESSABLE_ENTITY = 422
     *
     * @param string $message
     * @return $mixed
     *
     */
    public function respondUnprocessable($message = 'Parameters missing', $errors = [])
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_UNPROCESSABLE_ENTITY)->respondWithError($message, $errors);
    }

    /**
     * -----------------------------------------------------------------------------------------------------------
     * SERVER ERROR 5XX
     * -----------------------------------------------------------------------------------------------------------
     *
     * HTTP_NOT_IMPLEMENTED                                             = 501
     * HTTP_BAD_GATEWAY                                                 = 502
     * HTTP_SERVICE_UNAVAILABLE                                         = 503
     * HTTP_GATEWAY_TIMEOUT                                             = 504
     * HTTP_VERSION_NOT_SUPPORTED                                       = 505
     * HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL                        = 506
     * HTTP_INSUFFICIENT_STORAGE                                        = 507
     * HTTP_LOOP_DETECTED                                               = 508
     * HTTP_NOT_EXTENDED                                                = 510
     * HTTP_NETWORK_AUTHENTICATION_REQUIRED                             = 511
     *
     * -----------------------------------------------------------------------------------------------------------
     */

    /**
     * HTTP_INTERNAL_SERVER_ERROR = 500
     *
     * @param string $message
     * @return $mixed
     *
     */
    public function respondInternalError($message = 'Internal Error!', $errors = [])
    {
        return $this->setStatusCode(IlluminateResponse::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($message, $errors);
    }
}
