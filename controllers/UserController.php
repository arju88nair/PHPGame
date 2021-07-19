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
        $userExist = $this->conn->selectFreeRun("SELECT * FROM users WHERE username='" . $_POST["username"] . "'");
        if ($userExist) {
            $data = ['status' => 401, 'message' => 'user already exists'];
            header('HTTP/1.1 500 user already exists');
            die(json_encode($data));
        } else {
            $_POST['password'] = md5($_POST["password"]);
            return $this->mainController->add();
        }
    }

    public function doLogin()
    {
        $_POST['password'] = md5($_POST["password"]);
        $userExist = $this->conn->selectFreeRun("SELECT * FROM users WHERE (username='" . $_POST["username"] . "' or nickname='" . $_POST["username"] . "')and password = '" . $_POST["password"] . "'");
        if ($userExist) {
            $data = ['status' => 200, 'message' => 'Successfully logged in'];
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            $data = ['status' => 401, 'message' => 'user already exists'];
            header('HTTP/1.1 500 user does not exist');
            die(json_encode($data));
        }
    }

}