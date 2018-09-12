<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{

    protected $messages = [
        '401' => 'Unauthorized',
        '403' => 'Access to that resource is forbidden',
        '404' => 'The requested resource was not found',
        '405' => 'Method not allowed',
        '406' => 'Not acceptable response',
        '408' => 'The server timed out waiting for the rest of the request from the browser',
        '409' => 'The request could not be completed due to a conflict with the current state of the resource. Possible duplicate entry',
        '410' => 'The requested resource is gone and won’t be coming back',
        '422' => 'Could not validate your request. Please modify your values',
        '429' => 'Too many requests',
        '499' => 'Client closed request',
        '500' => 'There was an error on the server and the request could not be completed. Please excuse us!'
    ];
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        /**
        * Consumers of this API should include the 'Accept : application/json' HTTP Header with their request to get the correct
        * error responses. Please uncomment below code for the proper functionality, which lets laravel's default Handler
        * handle the non-json demanding requests. Right now every request is treated as JSON.
        **/

        // if ($request->wantsJson() || $request->ajax()) {
        //     return response()->json($this->getMessageAsJson($exception), $this->getHTTPStatusCode($exception));
        // }
        // return parent::render($request, $exception);
        return response()->json($this->getMessageAsJson($exception), $this->getHTTPStatusCode($exception));
    }

    protected function getMessageAsJson($exception)
    {
        return [
            'errors' => [
                'code' => $this->getHTTPStatusCode($exception),
                'message' => $this->getHTTPErrorMessage($exception)
            ]
        ];
    }

    protected function getHTTPStatusCode($exception)
    {
        return method_exists($exception, 'getStatusCode') ? $exception->getStatusCode() : 500;
    }

    protected function getHTTPErrorMessage($exception)
    {
        return empty($exception->getMessage()) ? $this->messages[(string)$this->getHTTPStatusCode($exception)] : $exception->getMessage();
    }
}
