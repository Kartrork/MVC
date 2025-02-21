<?php

require_once "./Models/EmployeeModel.php";
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
        $employee = $this->model->getEmployees();
        $this->views("employee/employee.php",['employee'=>$employee]);
    }
}
?>
