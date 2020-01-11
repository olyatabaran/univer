<?php


namespace Controllers;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexMethod
{
    public function index(Request $request)
    {
        extract($request->attributes->all(), EXTR_SKIP);
        ob_start();

        require_once 'framework/pages/header.php';
        require_once 'framework/pages/navbar.php';
        require sprintf('framework/pages/%s.php', $_route);
        require_once 'framework/pages/footer.php';
        return new Response(ob_get_clean());

    }

}