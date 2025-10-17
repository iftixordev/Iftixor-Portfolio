<?php

function enableCORS() {
    $origin = $_SERVER['HTTP_ORIGIN'] ?? '*';
    
    // Allow specific origins in production
    $allowedOrigins = [
        'http://localhost:3000',
        'http://localhost:5173',
        $_ENV['FRONTEND_URL'] ?? 'http://localhost:3000'
    ];
    
    if (in_array($origin, $allowedOrigins) || $_ENV['APP_ENV'] === 'development') {
        header("Access-Control-Allow-Origin: $origin");
    }
    
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
    
    // Handle preflight requests
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        http_response_code(200);
        exit;
    }
}