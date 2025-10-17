<?php
require_once '../../utils/validator.php';

try {
    $input = json_decode(file_get_contents('php://input'), true);
    
    // Validate input
    $validator = new Validator();
    $validator->required(['name', 'email', 'message'], $input);
    $validator->email('email', $input['email']);
    
    if (!$validator->isValid()) {
        Response::error('Validation failed', 400, $validator->getErrors());
    }
    
    // Save to database
    $database = new Database();
    $db = $database->getConnection();
    
    $query = "INSERT INTO contacts (name, email, subject, message, created_at) VALUES (?, ?, ?, ?, NOW())";
    $stmt = $db->prepare($query);
    $stmt->execute([
        $input['name'],
        $input['email'],
        $input['subject'] ?? 'Portfolio Contact',
        $input['message']
    ]);
    
    // Send email notification (optional)
    if (isset($_ENV['MAIL_HOST'])) {
        // Email sending logic here
    }
    
    Response::success(null, 'Message sent successfully');
} catch (Exception $e) {
    Response::error('Failed to send message: ' . $e->getMessage(), 500);
}