<?php declare(strict_types=1);


use Bartosz\Http\Kernel;
use Bartosz\Http\Request;


require_once dirname(__DIR__).'/vendor/autoload.php';

$request = Request::createFromGlobals();

//$content = '<h1>Hello World!</h1>';
//
//$response = new Response(content: $content, status: 200, headers: []);


$kernel = new Kernel();
$response = $kernel->handle($request);
$response->send();