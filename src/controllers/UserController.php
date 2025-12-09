<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../config/Database.php'; 

class UserController
{
    private $conn;

    // Constructor
    public function __construct()
    {
      
        $this->conn = (new Database())->connect();
    }

    // Get all users
    public function getAll()
    {
        $query = "SELECT id, username, mpesanumber FROM users ORDER BY id DESC";
        $result = $this->conn->query($query);

        $users = [];
        while ($row = $result->fetch_assoc()) {
            $user = new User($row['id'], $row['username'],null ,$row['mpesanumber']);
        $users[] = $user;

        }

        return $users;
    }

    // Create a new user
    public function create($data)
    {
        // Validate required fields
        if (empty($data['username']) || empty($data['password']) || empty($data['mpesanumber'])) {
            http_response_code(400);
            return ['error' => 'Missing required fields'];
        }

        // Hash the password 
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

    
        $stmt = $this->conn->prepare(
            "INSERT INTO users (username, password, mpesanumber) VALUES (?, ?, ?)"
        );

        
        $stmt->bind_param(
            "sss",
            $data['username'],
            $hashedPassword,
            $data['mpesanumber']
        );

        if ($stmt->execute()) {
            http_response_code(201);
            return ['success' => true, 'message' => 'User created successfully'];
        } else {
            http_response_code(500);
            return ['error' => 'Failed to create user'];
        }
    }
}