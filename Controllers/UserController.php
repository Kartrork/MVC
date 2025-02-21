<?php
require_once "./Models/UserModel.php";
require_once "BaseController.php";
class UserController extends BaseController
{
    private $model;
    function __construct()
    {
        $this->model =  new UserModel();
    }
    function index()
    {
        $users = $this->model->getUsers();
        $this->views("user/list.php",['users'=>$users]);
    }


    function create()
    {
        $this->views('user/create.php');
    }

    function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name']
            ];
            $this->model->createUser($data);
            $this->redirect("/");
        }
    }

    function edit($id)
    {
        $user = $this->model->getUser($id);
        $this->views("user/edit.php",["user"=>$user]);
    }
    function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'name' => $_POST['name']
            ];
            $this->model->updateUser($id, $data);
            $this->redirect("/");
        }
    }

    function destroy($id)
    {
        $this->model->deleteUser($id);
        $this->redirect("/");
    }
}
