<?php


namespace Jedi;


class Response
{
    protected static $messages
        = [
            StatusCodes::STATUS_OK                 => 'OK',
            StatusCodes::STATUS_NOT_FOUND          => 'File Not Found',
            StatusCodes::STATUS_METHOD_NOT_ALLOWED => 'Method Not Allowed',
            StatusCodes::STATUS_SERVER_ERROR       => 'Internal Server Error',
        ];

    public function redirect()
    {

    }

    public function withJson($data)
    {
//        return json_encode($data);
    }

    public function notFound()
    {
        header('HTTP/1.1 '.StatusCodes::STATUS_NOT_FOUND.' Not Found ');
        die(self::$messages[404]);
    }

    public function notAllowed()
    {
        header('HTTP/1.1 '.StatusCodes::STATUS_METHOD_NOT_ALLOWED.' '.self::$messages[405]);
        die(self::$messages[405]);
    }
}