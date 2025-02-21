<?php
require_once "./database/database.php";
class EmployeeModel
{
    private $pdo;
    function __construct()
    {
        $this->pdo = new Database();
    }
    function getEmployees()
    {
        $stmt = $this->pdo->query(("SELECT * FROM employees ORDER BY id DESC"));
        $employees = $stmt->fetchAll();
        return $employees;
    }
}