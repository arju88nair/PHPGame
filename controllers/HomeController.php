<?php
/**
 * Written by Nair
 */

namespace controllers;
include_once 'utils/ControllerAbstract.php';
include_once 'utils/View.php';

class HomeController extends \ControllerAbstract

{
    /**
     * @var Controller
     */
    private $mainController;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->mainController = new Controller();
    }


    /**
     * User view route
     */
    public function homeVIew()
    {
        $view = new \View('home');
    }

}