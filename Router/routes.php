<?php
require 'Router.php';
require 'Controllers/UserController.php';
require_once 'Controllers/DepartmentController.php';
require_once 'Controllers/EmployeeController.php';
require_once 'Controllers/DashboardController.php';

$routes = new Router();

//dashboard
$routes->get('/', [DashboardController::class, 'index']);

// user 
$routes->get('/user', [UserController::class, 'index']);
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
$routes->get('/employee/create', [EmployeeController::class, 'create']);
$routes->post('/employee/store', [EmployeeController::class, 'store']);
$routes->get('/employee/edit', [EmployeeController::class, 'edit']);
$routes->put('/employee/update', [EmployeeController::class, 'update']);
$routes->delete('/employee/delete', [EmployeeController::class, 'destroy']);
$routes->get('/employee/detail', [EmployeeController::class, 'detail']);




// category

// dispatch
$routes->dispatch();


