<?php

namespace App;

use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;

class App
{
    /**
     * Enlever dernier "/" dans 'URL'
     */
    public function run(Request $request): Response
    {
        $response = new Response();
        $uri = $request->getPathInfo();
        if (!empty($uri) && strlen($uri) > 1 && $uri[-1] === '/') {
            $response->setStatusCode(301);
            $response->headers->add(['Location', substr($uri, 0, -1)]);
            return $response;
        }

        $routes = new RouteCollection();
        $routes->add('home', new Route('/'));
        $routes->add('home_1', new Route('/home'));
        $routes->add('employes', new Route('/employes'));
        $routes->add('employes_name', new Route('/employes/{name}'));

        $context = new RequestContext($request);
        $urlMatcher = new UrlMatcher($routes, $context);
        $result = $urlMatcher->match($uri);
        dd($result);

        $map = [
            '/' => 'home.php',
            '/home' => 'home.php',
            '/employes' => 'employes.php'
        ];

        if (!isset($map[$uri])) {
            return new Response('Page not Found', 404);
        }

        ob_start();
        require __DIR__ . '/../pages/' . $map[$uri];
        $content = ob_get_clean();

        $response->setContent($content);
        return $response;
    }
}
