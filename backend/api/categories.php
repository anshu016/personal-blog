<?php
// Database path
$dbFile = '../db/database.json';

// Load existing data
$data = file_exists($dbFile) ? json_decode(file_get_contents($dbFile), true) : ['posts' => [], 'categories' => []];

// Handle GET: List all categories
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Content-Type: application/json');
    echo json_encode($data['categories']);
    exit;
}

// Handle POST: Add a new category
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newCategory = json_decode(file_get_contents('php://input'), true);

    if (!isset($newCategory['name'])) {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid input']);
        exit;
    }

    if (!in_array($newCategory['name'], $data['categories'])) {
        $data['categories'][] = $newCategory['name'];
        file_put_contents($dbFile, json_encode($data));
    }

    echo json_encode(['success' => true]);
    exit;
}
?>
