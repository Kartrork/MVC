<?php
require_once './Database/database.php';
class DepartmentModel
{
    private $pdo;
    function __construct()
    {
        $this->pdo = new Database();
    }
    function getDepartments(){
        $department = $this->pdo->query("SELECT * FROM department");
        return $department->fetchALL();

    }
    function createDepartment($data)
    {
        $stmt = $this->pdo->query("INSERT INTO department (name, description) VALUES (:name, :description)", [
            'name' => $data['name'],
            'description' => $data['description'],
        ]);
    }
    function getDepartment($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM department WHERE id = :id", [
            'id' => $id
        ]);
        $department = $stmt->fetch();
        return $department;
    }
    function updateDepartment($id, $data)
    {
        $stmt = $this->pdo->query("UPDATE department SET name = :name, description = :description WHERE id = :id", [
            'name' => $data['name'],
            'description' => $data['description'],
            'id' => $id
        ]);
    }
    function deleteDepartment($id)
    {
        $stmt = $this->pdo->query("DELETE FROM department WHERE id = :id", [
            'id' => $id
        ]);
    }
}
