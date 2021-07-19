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

    /**
     * Save data
     */
    public function saveDice()
    {
        if (isset($_SESSION['user'])) {
            $_POST['user'] = $_SESSION['user'];
            $this->mainController->add();
        } else {
            $data = ['status' => 401, 'message' => 'Something went wrong'];
            header('HTTP/1.1 500 Something went wrong');
            die(json_encode($data));
        }
    }

}