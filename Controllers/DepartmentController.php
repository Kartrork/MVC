<?php

require_once './Models/DepartmentModel.php';
require_once 'BaseController.php';
class DepartmentController extends BaseController
{
    private $model;
    function __construct()
    {
        $this->model =  new DepartmentModel();
    }
    function index()
    {
        $department = $this->model->getDepartments();
        $this->views("departements/list.php",['department'=>$department]);
    }
    function create()
    {
        $this->views('/departements/create.php');
    }
    function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
            ];
            $this->model->createDepartment($data);
            $this->redirect("/department");
        }
    }
    function edit($id)
    {
        $department = $this->model->getDepartment($id);
        $this->views("/departements/edit.php",["department"=>$department]);
    }
    function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
            ];
            $this->model->updateDepartment($id, $data);
            $this->redirect("/department");
        }
    }
    function destroy($id)
    {
        $this->model->deleteDepartment($id);
        $this->redirect("/department");
    }
}