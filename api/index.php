<?php
$requestUri = $_SERVER['REQUEST_URI'];

if (strpos($requestUri, '/posts') === 0) {
    require_once './routes/posts.php';
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Not Found']);
}
?>