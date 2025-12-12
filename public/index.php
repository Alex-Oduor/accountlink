<?php

// entry point for the application

require_once __DIR__ .'/../core/Application.php';
require_once __DIR__ . '/../User/src/controllers/UserController.php';


$app = new Application();


$app->router->get('/users' ,function() {
    $controller = new UserController();
    header('Content-Type: application/json');
    echo json_encode($controller->getAll());
    exit;
});

$app->router->post('/users/create' , function() {
     $controller = new UserController();
    $data = json_decode(file_get_contents('php://input'), true) ?? [];
    $result = $controller->create($data);

    header('Content-Type: application/json');
    echo json_encode($result); // return JSON on success/failure
    exit;
    
});

$app->run();

?>