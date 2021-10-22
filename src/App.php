<?php

namespace App;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

        $map = [
            '/' => 'home.php',
            '/home' => 'home.php',
            '/employe' => 'employes.php'
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
