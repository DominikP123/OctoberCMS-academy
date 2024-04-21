<?php namespace AppUser\User\Controllers;

use Backend\Classes\Controller;

class TestController extends Controller
{
    public function index()
    {
        $this->vars['hello'] = 'Hello World';
    }


    public function test()
    {
        return 'TEST page';
    }
}