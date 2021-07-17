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
    public function registerView()
    {
        $view = new \View('register');
    }

    /**
     * User login view route
     */
    public function loginView()
    {
        $view = new \View('login');
    }

    public function doRegister()
    {
var_dump($_REQUEST);       die();

    }

}