<?php

class Project {
    private $conn;
    private $table = 'projects';
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function getAll() {
        $query = "SELECT * FROM {$this->table} WHERE status = 'active' ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = ? AND status = 'active'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    
    public function create($data) {
        $query = "INSERT INTO {$this->table} 
                  (title, description, technologies, github_url, demo_url, image_url, status) 
                  VALUES (?, ?, ?, ?, ?, ?, 'active')";
        
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $data['title'],
            $data['description'],
            json_encode($data['technologies']),
            $data['github_url'],
            $data['demo_url'],
            $data['image_url']
        ]);
    }
    
    public function update($id, $data) {
        $query = "UPDATE {$this->table} 
                  SET title = ?, description = ?, technologies = ?, 
                      github_url = ?, demo_url = ?, image_url = ?, 
                      updated_at = CURRENT_TIMESTAMP 
                  WHERE id = ?";
        
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            $data['title'],
            $data['description'],
            json_encode($data['technologies']),
            $data['github_url'],
            $data['demo_url'],
            $data['image_url'],
            $id
        ]);
    }
}