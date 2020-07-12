<?php
class Logfile
{
    // connection
    private $conn;

    // table
    private $db_table = 'systemevents';

    // columns
    public $id;
    public $receivedAt;
    public $message;

    // db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // get data
    public function getLogfiles()
    {
        $sqlQuery = 'SELECT ID, ReceivedAt, Message FROM ' . $this->db_table . '';
        $stmt = $this
            ->conn
            ->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}

