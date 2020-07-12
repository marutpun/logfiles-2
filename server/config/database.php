<?php

class Database
{
    private $dbhost = 'localhost';
    private $dbname = 'syslog';
    private $dbusername = 'root';
    private $dbpassword = '1234';

    // connection
    public $conn;
    public function getConnection()
    {
        $this->conn = null;
        try
        {
            $this->conn = new PDO('mysql:host=' . $this->dbhost . ';dbname=' . $this->dbname, $this->dbusername, $this->dbpassword);
            $this
                ->conn
                ->exec('set names utf8');
        }
        catch(PDOException $exception)
        {
            echo 'Failed, The database could not be connected: ' . $exception->getMessage();
        }
        return $this->conn;
    }
}