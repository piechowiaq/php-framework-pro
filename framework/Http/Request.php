<?php

namespace Bartosz\Http;

class Request
{
    /*
     * Using 8.1 PHP therefor promoted properties are possible with readonly immutable option
     */
    public function __construct(
        public readonly array $getParams,
        public readonly array $postParams,
        public readonly array $cookies,
        public readonly array $files,
        public readonly array $server

    )
    {

    }

    public static function createFromGlobals(): Request
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);

    }

}