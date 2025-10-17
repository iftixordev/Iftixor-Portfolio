<?php
require_once '../../models/Project.php';

try {
    $database = new Database();
    $db = $database->getConnection();
    $project = new Project($db);
    
    $projects = $project->getAll();
    
    // Process technologies JSON
    foreach ($projects as &$proj) {
        $proj['technologies'] = json_decode($proj['technologies'], true);
    }
    
    Response::success($projects, 'Projects retrieved successfully');
} catch (Exception $e) {
    Response::error('Failed to retrieve projects: ' . $e->getMessage(), 500);
}