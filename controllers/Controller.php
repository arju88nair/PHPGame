<?php

/**
 * Created by Nair.
 */

namespace controllers;
include_once 'utils/ControllerAbstract.php';
include_once 'utils/View.php';

class Controller extends \ControllerAbstract

{
    /**
     * Controller constructor. The class is for containing functions necessary for the other controllers
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Navigating to the edit view based on the id and mode
     */
    public function editView()
    {
        if (!isset($GET['mode']) && empty($_GET['mode'])) {
            echo "Missing Mode";
            die;
        }
        if (!isset($GET['id']) && empty($_GET['id'])) {
            echo "Missing ID";
            die;
        }

        //Cleaning

        $cleaned = array_map(function ($e) {
            return mysqli_real_escape_string($this->db, $e);
        }, $_GET);
        extract($cleaned);

        try {
            // Fetching for the user
            $data = $this->conn->selectFreeRun("select * from $mode where id = $id");
            if (count($data) == 0) {
                die('Something went wrong');
            }
            $data = $data[0];
            unset($data['created_at']);
            unset($data['id']);

            $view = new \View('edit');
            $view->assign('data', $data);
            $view->assign('mode', $mode);
            $view->assign('id', $id);
        } //catch exception
        catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }


    }


    /**
     * Updating a specific item based on the mode and the it
     */
    public function edit()
    {
        $escaped = $this->validate($_POST);
        extract($escaped);

        unset($escaped['mode']);
        unset($escaped['id']);
        //trigger exception in a "try" block
        try {
            $result = $this->conn->updateData($mode, $escaped, "id =" . $id);
            if ($result) {
                header("Location: /" . $mode);
            } else {
                die("Something went wrong");
            }
        } //catch exception
        catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }


    }

    /**
     * Deleting a specific item based on the mode and the it
     */
    public function delete()
    {

        if (!isset($GET['mode']) && empty($_GET['mode'])) {
            echo "Missing Mode";
            die;
        }
        if (!isset($GET['id']) && empty($_GET['id'])) {
            echo "Missing ID";
            die;
        }

        $cleaned = array_map(function ($e) {
            return mysqli_real_escape_string($this->db, $e);
        }, $_GET);
        extract($cleaned);

        $data = ['active' => 0];
        //trigger exception in a "try" block
        try {
            $result = $this->conn->updateData($mode, $data, "id =" . $id);
            if ($result) {
                header("Location: /" . $mode);
            } else {
                die("Something went wrong");
            }
        } //catch exception
        catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }


    }


    /**
     * Add Item route
     */
    public function add()
    {
        $escaped = $this->validate($_POST);
        extract($escaped);

        // Inserting data
        $table = $mode;
        unset($escaped['mode']);
        $field = array_keys($escaped);
        $data = array_values($escaped);
        try {
            $result = $this->conn->insertData($table, $field, $data);
            if ($result) {
                header("Location: /" . $table);
            } else {
                die("Something went wrong");
            }
        } //catch exception
        catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }


    }


    /**
     * For validating and cleaning the data
     * @return array
     */

    public function validate()
    {
        $escaped = array_map(function ($e) {
            return mysqli_real_escape_string($this->db, $e);
        }, $_POST);

        $errors = [];
        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array

        //TODO: Adding session or similar for error reporting

        foreach ($escaped as $key => $value) {
            if ($key === 'active') {
                $activeValues = [0, 1];
                if (!in_array($value, $activeValues)) {
                    array_push($errors, "Active should be 1 or 0");
                }
            }
            if ($value === '')
                array_push($errors, ucfirst($value) . " is required");
        }

        if (count($errors) > 0) {
            print_r($errors);
            die;
        }

        return $escaped;
    }

}