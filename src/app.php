<?php


use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;


$routes = new RouteCollection();

$routes->add('index', new Route('/', [
        '_controller' => 'Controllers\AboutUs::index'
    ]));
$routes->add('department', new Route('/departments/{id}', [
    '_controller' => 'Controllers\Department::index'
]));
$routes->add('news', new Route('/news', [
    '_controller' => 'Controllers\News::index'
]));
$routes->add('courses', new Route('/courses', [
    '_controller' => 'Controllers\Courses::index'
]));


return $routes;