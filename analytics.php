<?php

namespace Classes;

use Classes\Database;

require_once "./connection/pdo_connection4.php";

class Analytics
{
    protected $_db;

    public function __construct()
    {
        $db = new \Database();
        $this->_db = $db->initConnection();
    }

    public function getGenderAnalytics()
    {
        $stmt = $this->_db->prepare("
            SELECT gender, COUNT(personID) AS total
            FROM person
            GROUP BY gender
        ");

        $stmt->execute();
        return $stmt->fetchAll();
    }
}
