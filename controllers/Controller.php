<?php

/**
 * Written by Nair
 */

namespace controllers;
include_once 'utils/View.php';
include_once 'utils/ControllerAbstract.php';
include_once 'Controller.php';


class Controller extends \ControllerAbstract
{
    public $userId;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Index method for root route
     */
    public function index()
    {
        return new \View('home');
    }

}