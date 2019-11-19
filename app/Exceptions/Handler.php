<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;


class Handler extends ExceptionHandler
{
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
        if($exception instanceof TokenMismatchException)
        {
            if($request->ajax())
            {
                return response()->json(['error'=>1,'msg'=>'页面缺少令牌']);
            }else
            {
                return response()->view('errors.error',['message'=>'页面缺少令牌']);
            }
        }
        /*if($exception instanceof \Symfony\Component\Debug\Exception\FatalErrorException)
        {
            echo '语法不对';

        }*/
        return parent::render($request, $exception);
    }
}
