<?php


namespace Controllers;


use Symfony\Component\HttpFoundation\Request;

class News extends IndexMethod
{
    public function index(Request $request)
    {
        return parent::index($request);
    }
}