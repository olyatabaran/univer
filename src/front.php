<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'functions.php';
use Simplex\GoogleBotListener;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing;
use Symfony\Component\HttpKernel;
use Symfony\Component\EventDispatcher\EventDispatcher;


$routes = require_once 'src/app.php';
include 'framework/pages/library.php';
$request = Request::createFromGlobals();

$dispatcher = new EventDispatcher();
$dispatcher->addSubscriber(new GoogleBotListener());


$context = new Routing\RequestContext();
$context->fromRequest($request);

$controllerResolver = new ControllerResolver();

$argumentResolver = new ArgumentResolver();

$matcher = new Routing\Matcher\UrlMatcher($routes, $context);

$framework = new Simplex\Framework($dispatcher, $matcher, $controllerResolver, $argumentResolver);
$response = $framework->handle($request);

$response->send();




