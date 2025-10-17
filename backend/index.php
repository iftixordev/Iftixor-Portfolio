<?php
require_once 'vendor/autoload.php';
require_once 'config/database.php';
require_once 'middleware/cors.php';
require_once 'utils/response.php';

use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Enable CORS
enableCORS();

// Get request method and URI
$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/backend', '', $uri);

// Route handling
switch ($uri) {
    case '/api/auth/login':
        if ($method === 'POST') {
            require_once 'api/auth/login.php';
        } else {
            Response::error('Method not allowed', 405);
        }
        break;
        
    case '/api/projects':
        if ($method === 'GET') {
            require_once 'api/projects/get.php';
        } elseif ($method === 'POST') {
            require_once 'api/projects/create.php';
        } else {
            Response::error('Method not allowed', 405);
        }
        break;
        
    case '/api/contact':
        if ($method === 'POST') {
            require_once 'api/contact/send.php';
        } else {
            Response::error('Method not allowed', 405);
        }
        break;
        
    default:
        if (preg_match('/^\/api\/projects\/(\d+)$/', $uri, $matches)) {
            $projectId = $matches[1];
            if ($method === 'GET') {
                require_once 'api/projects/get_single.php';
            } elseif ($method === 'PUT') {
                require_once 'api/projects/update.php';
            } else {
                Response::error('Method not allowed', 405);
            }
        } else {
            Response::error('Endpoint not found', 404);
        }
        break;
}