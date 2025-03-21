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
        $this->views("user/list.php", ['users' => $users]);
    }


    function create()
    {
        $this->views('user/create.php');
    }

    function store($id = null)
    {
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $data = [
        //         'name' => $_POST['name'],
        //     ];
        //     $this->model->createUser($data);
        //     $this->redirect("/user");
        // }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $imagePath = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                $imageName = time() . '_' . basename($_FILES['image']['name']);
                $imagePath = $uploadDir . $imageName;

                if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                    $imagePath = null; 
                }
            }
            $data = [
                'name'  => $_POST['name'],
                'image' => $imagePath
            ];

            $this->model->createUser($data);
            $this->redirect('/user');
        }
    }
    function edit($id)
    {
        $user = $this->model->getUser($id);
        $this->views("user/edit.php", ["user" => $user]);
    }
    function update($id)
    {
        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     $data = [
        //         'name' => $_POST['name']
        //     ];
        //     $this->model->updateUser($id, $data);
        //     $this->redirect("/");
        // }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $this->model->getUser($id);
            $imagePath = $user['image'];

            if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                $uploadDir = 'uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0775, true);
                }

                $imageName = time() . '_' . basename($_FILES['image']['name']);
                $newImagePath = $uploadDir . $imageName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $newImagePath)) {
                    if (!empty($user['image']) && file_exists($user['image'])) {
                        unlink($user['image']);
                    }
                    $imagePath = $newImagePath;
                }
            }

            $data = [
                'name'  => htmlspecialchars($_POST['name']),
                'image' => $imagePath
            ];

            $this->model->updateUser($id, $data);
            $this->redirect('/user');
        }
    }
    function destroy($id)
    {
        $user = $this->model->getUser($id);
        if(!empty($user['image']) && file_exists($user['image'])){
            unlink($user['image']);
        }
        $this->model->deleteUser($id);
        $this->redirect("/user");
    }
}
