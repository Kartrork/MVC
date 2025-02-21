<?php
require 'Router.php';
require 'Controllers/UserController.php';
require 'Controllers/DepartmentController.php';

$routes = new Router();
// user 
$routes->get('/', [UserController::class, 'index']);
$routes->get('/user/create', [UserController::class, 'create']);
$routes->post('/user/store', [UserController::class, 'store']);
$routes->get('/user/edit', [UserController::class, 'edit']);
$routes->put('/user/update', [UserController::class, 'update']);
$routes->delete('/user/delete', [UserController::class, 'destroy']);



// Department------>
$routes->get('/department', [DepartmentController::class, 'index']);
$routes->get('/department/create', [DepartmentController::class, 'create']);
$routes->post('/department/store', [DepartmentController::class, 'store']);
$routes->get('/department/edit', [DepartmentController::class, 'edit']);
$routes->put('/department/update', [DepartmentController::class, 'update']);
$routes->delete('/department/delete', [DepartmentController::class, 'destroy']);

//Employee-------->
$routes->get('/employee', [EmployeeController::class, 'index']);
// $routes->get('/employee/create', [DepartmentController::class, 'create']);
// $routes->post('/employee/store', [DepartmentController::class, 'store']);
// $routes->get('/employee/edit', [DepartmentController::class, 'edit']);
// $routes->put('/employee/update', [DepartmentController::class, 'update']);
// $routes->delete('/employee/delete', [DepartmentController::class, 'destroy']);



// category

// dispatch
$routes->dispatch();


