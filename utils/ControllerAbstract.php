<?php
/**
 * Written by Nair
 */

include_once 'DBConnection.php';

abstract class ControllerAbstract
{
    protected $db;
    protected $conn;
    protected $userId;

    /**
     * Controller constructor. Handling construct methods like DB connection and cookie/session handling
     * Can add more methods
     */
    protected function __construct()
    {
        $this->_doDbConnection();
        // Can do more process here
    }


    /**
     * Making DB connection
     */
    protected function _doDbConnection()
    {

        $this->conn = new \DBConnection();
        $this->db = $this->conn->getDbConnect();
    }


}