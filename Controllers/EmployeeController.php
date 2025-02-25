<?php

require_once "Models/EmployeeModel.php";
require_once "BaseController.php";
class EmployeeController extends BaseController
{
    private $model;
    function __construct()
    {
        $this->model =  new EmployeeModel();
    }
    function index()
    {
        $employees = $this->model->getEmployees();
        $this->views("employee/employee.php",['employees'=>$employees]);
    }
    function create()
    {
        // $this->views('/employee/create.php');
        $department = $this->model->getDepartment();
        $this->views('employee/create.php', ['department' => $department]);
    }
    function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'id' => $_POST['id'],
            ];
            $this->model->createEmployee($data);
            $this->redirect("/employee");
        }
    }
    function edit($id)
    {
        $employees = $this->model->getEmployees($id);
        $department = $this->model->getDepartment();
        $this->views('employee/edit.php', ['employees' => $employees, 'department' => $department]);
    }
    function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name'  => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'id'    => $_POST['id'],
            ];
            $this->model->updateEmployee($id, $data);
            $this->redirect('/employee');
        }
    }
    function destroy($id)
    {
        $this->model->deleteEmployee($id);
        $this->redirect('/employee');
    }
    public function detail($id)
    {
        $employee = $this->model->detail($id);
        $this->views('employee/detail.php', ['employe' => $employee]);
    }
}
?>
