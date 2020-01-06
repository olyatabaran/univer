<?php


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Response;


$routes = new RouteCollection();

$routes->add('index', new Route('/', [
        '_controller' => 'render_template'
    ]));
$routes->add('departmentDetails', new Route('/departments/{id}', [
    '_controller' => 'render_template'
]));
$routes->add('news', new Route('/news', [
    '_controller' => 'render_template'
]));
$routes->add('courses', new Route('/courses', [
    '_controller' => 'render_template'
]));



function render_template(Request $request)
{
    extract($request->attributes->all(), EXTR_SKIP);
    ob_start();

    require_once 'framework/pages/header.php';
    require_once 'framework/pages/navbar.php';
    require sprintf('framework/pages/%s.php', $_route);
    require_once 'framework/pages/footer.php';
    return new Response(ob_get_clean());
}



return $routes;