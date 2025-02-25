<?php
require_once "database/database.php";
class EmployeeModel
{
    private $pdo;
    function __construct()
    {
        $this->pdo = new Database();
    }
    function getDepartment()
    {
        $department = $this->pdo->query('SELECT * FROM department');
        return $department->fetchAll();
    }
    function getEmployees()
    {
        $stmt = $this->pdo->query(("SELECT * FROM employees ORDER BY id DESC"));
        $employees = $stmt->fetchAll();
        return $employees;
    }
    function createEmployee($data)
    {
        $this->pdo->query("INSERT INTO employees (name, email,phone,id) VALUES (:name, :email, :phone, :id)", [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'id' => $data['id'],
        ]);
    }
    function updateEmployee($id, $data)
    {
        // $this->pdo->query("UPDATE employees SET name = :name ,email = :email, phone = : phone, id = :id WHERE employee_id = :mployee_id", [
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'phone' => $data['phone'],
        //     'id' => $data['id'],
        //     'employee_id ' => $id,
        // ]);
        $sql = "UPDATE employees SET name = :name, email = :email, phone = :phone, id = :id WHERE employee_id = :employee_id";
        $this->pdo->query($sql, array_merge($data, ['employee_id' => $id]));
    }
    function deleteEmployee($employee_id)
    {
        $this->pdo->query("DELETE FROM employees WHERE employee_id = :employee_id", ['employee_id ' => $employee_id]);
    }
    public function show($employee_id)
    {
        $sql = "SELECT employees.employee_id, employees.name, employees.email, employees.phone, employees.id, department.name AS department
            FROM employees
            LEFT JOIN department ON employees.employee_id  = department.id
            WHERE employees.employee_id = :employee_id";

        $stmt = $this->pdo->query($sql);
        $stmt->execute([':employee_id ' => $employee_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function detail($id)
    {
        $sql = "SELECT employee.employee_id, employee.name, employee.email, employee.phone, employee.id, departments.name AS department
                FROM employee
                LEFT JOIN department ON employees.id = department.id
                WHERE employees.employee_id = :employee_id";

        $stmt = $this->pdo->query($sql, ['employee_id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
