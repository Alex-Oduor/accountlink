<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../../../core/config/Database.php'; 

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
        $query = "SELECT id, name, userName, email FROM users ORDER BY id DESC";
        $result = $this->conn->query($query);

        $users = [];
        while ($row = $result->fetch_assoc()) {
            $user = new User($row['id'], $row['name'],$row['userName'] ,null,$row['email']);

        $users[]=['id'=>$user->getId() , 'name'=>$user->getName() ,'userName' =>$user->getUserName , 'email' =>$user->getEmail()];

        }

        return $users;
    }

    // Create a new user
    public function create($data)
    {
        // Validate required fields
        if ( empty($data['name']) || empty($data['userName']) || empty($data['password']) || empty($data['email'])) {
            http_response_code(400);
            return ['error' => 'Missing required fields'];
        }

        // Hash the password 
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

    
        $stmt = $this->conn->prepare(
            "INSERT INTO users (name,userName, password, email) VALUES (?, ?, ? , ?)"
        );

        
        $stmt->bind_param(
            "ssss",
            $data['name'],
            $data['userName'],
            $hashedPassword,
            $data['email']
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