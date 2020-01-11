<?php


namespace Controllers;


use Symfony\Component\HttpFoundation\Request;

class AboutUs extends IndexMethod
{
    public function index(Request $request)
    {
        $a = "test";
        return parent::index($request);

    }
}