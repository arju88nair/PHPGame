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
        session_start();
    }


    /**
     * User Register view route
     */
    public function registerView()
    {
        new \View('register');
    }

    /**
     * User login view route
     */
    public function loginView()
    {
        new \View('login');
    }

    /**
     * Registration logic
     */

    public function doRegister()
    {
        $userExist = $this->conn->selectFreeRun("SELECT * FROM users WHERE username='" . $_POST["username"] . "'");
        if ($userExist) {
            $data = ['status' => 401, 'message' => 'user already exists'];
            header('HTTP/1.1 500 user already exists');
            die(json_encode($data));
        } else {
            $_POST['password'] = md5($_POST["password"]);
            $_SESSION['user'] = $_POST["username"];
            return $this->mainController->add();
        }
    }

    /**
     * Log in logic
     */
    public function doLogin()
    {
        $_POST['password'] = md5($_POST["password"]);
        $userExist = $this->conn->selectFreeRun("SELECT * FROM users WHERE (username='" . $_POST["username"] . "' or nickname='" . $_POST["username"] . "')and password = '" . $_POST["password"] . "'");
        if ($userExist) {
            $_SESSION['user'] = $_POST["username"];
            $_SESSION['is_admin'] = $userExist[0]['is_admin'];

            $data = ['status' => 200, 'message' => 'Successfully logged in', 'data' => $userExist];
            header('Content-Type: application/json');
            echo json_encode($data);
        } else {
            $data = ['status' => 401, 'message' => 'user does not exist'];
            header('HTTP/1.1 500 user does not exist');
            die(json_encode($data));
        }
    }

    /**
     * Doing logout
     */

    public function logout()
    {
        session_destroy();
        header("Location: /login");
        exit();

    }

}