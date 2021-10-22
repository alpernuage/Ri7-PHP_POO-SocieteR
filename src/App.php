<?php

namespace App;

use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class App
{
    /**
     * Enlever le dernier "/" dans 'URL'
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
        $routes->add('home', new Route('', ['_controller' => 'home.php']));
        $routes->add('home_1', new Route('/home', ['_controller' => 'home.php']));
        $routes->add('employes', new Route('/employes', ['_controller' => 'employes.php']));
        $routes->add('employes_name', new Route('/employes/{name}', ['_controller' => 'employes.php']));

        $context = new RequestContext($request);
        $urlMatcher = new UrlMatcher($routes, $context);
        try {
            $result = $urlMatcher->match($uri);
        } catch (ResourceNotFoundException $th) {
            return new Response('Page not Found', 404);
        }

        ob_start();
        require __DIR__ . '/../pages/' . $result['_controller'];
        $content = ob_get_clean();

        $response->setContent($content);
        return $response;
    }
}
