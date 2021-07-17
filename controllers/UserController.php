<?php
/**
 * Written by Nair
 */

namespace controllers;
include_once 'utils/ControllerAbstract.php';
include_once 'utils/View.php';

class UserController extends \ControllerAbstract

{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * User Register view route
     */
    public function index()
    {
        $view = new \View('register');
    }

}