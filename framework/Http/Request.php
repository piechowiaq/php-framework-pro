<?php

namespace Bartosz\Http;

class Request
{

    public function __construct(
        public array $getParams,
        public array $postParams,
        public array $cookies,
        public array $files,
        public array $server

    )
    {

    }

    public static function createFromGlobals(): Request
    {
        return new static($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);

    }

}