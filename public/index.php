<?php

// Fix missing server vars when running from CLI (eliminates the "Undefined array key" warning)
$_SERVER['REQUEST_URI']      ??= '/';
$_SERVER['REQUEST_METHOD']   ??= 'GET';
$_SERVER['SCRIPT_NAME']      ??= '/index.php';

// Load the app
require_once __DIR__ . '/../src/controllers/UserController.php';

// Simple router
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // strips query string

$controller = new UserController();

// GET all users
if ($uri === '/users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Content-Type: application/json');
    echo json_encode($controller->getAll());
    exit;
}

// POST /users/create  add a user
if ($uri === '/users/create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true) ?? [];
    $result = $controller->create($data);

    header('Content-Type: application/json');
    echo json_encode($result); // return JSON on success/failure
    exit;
}

// Default welcome message
echo "AccountLink API is running\n";