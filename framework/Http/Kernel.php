<?php

namespace Bartosz\Http;

use FastRoute\RouteCollector;
use function FastRoute\simpleDispatcher;

class Kernel
{
    public function handle(Request $request): Response
    {
        // Create a dispatcher
        $dispatcher = simpleDispatcher(function (RouteCollector $routeCollector) {

            $routes = include BASE_PATH. '/routes/web.php';

            foreach ($routes as $route){
                $routeCollector->addRoute(...$route);
            }

//            $routeCollector->addRoute('GET', '/', function() {
//                $content = '<h1> Hello World II ! </h1>';
//                return new Response($content);
//            });
//
//            $routeCollector->addRoute('GET', '/posts/{id:\d+}', function($vars) {
//                $content = "<h1> This id post {$vars['id']} </h1>";
//                return new Response($content);
//            });
        });

        // Dispatch a URI, to obtain the route info

        $routeInfo = $dispatcher->dispatch(
            $request->getMethod(),
            $request->getPathInfo()
        );

        [$status, [$controller, $method], $vars] = $routeInfo;

        // Call the handler, provided by route info, in order to create a Response
        return call_user_func_array([new $controller, $method], $vars);
    }
}