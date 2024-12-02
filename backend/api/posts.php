<?php
header('Content-Type: application/json');

// Path to the database
$db_file = '../db/database.json';

// Function to read the database
function readDatabase($file) {
    if (file_exists($file)) {
        $data = file_get_contents($file);
        return json_decode($data, true);
    }
    return [];
}

// Function to write to the database
function writeDatabase($file, $data) {
    return file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
}

// Handling GET request to fetch posts
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $posts = readDatabase($db_file);
    echo json_encode($posts['posts']);
    exit;
}

// Handling POST request to create a new post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get JSON input from the request
    $data = json_decode(file_get_contents("php://input"), true);

    // Validate the input
    if (empty($data['title']) || empty($data['content']) || empty($data['category'])) {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
        exit;
    }

    // Get current posts from the database
    $posts = readDatabase($db_file);
    
    // Create new post ID (this is a simple auto-increment for this example)
    $new_id = count($posts['posts']) + 1;
    
    // Create a new post object
    $new_post = [
        'id' => $new_id,
        'title' => $data['title'],
        'content' => $data['content'],
        'category' => $data['category'],
        'views' => 0,
        'likes' => 0,
        'timestamp' => date('Y-m-d H:i:s')
    ];

    // Add the new post to the posts array
    $posts['posts'][] = $new_post;

    // Save the updated posts back to the database
    if (writeDatabase($db_file, $posts)) {
        echo json_encode(['success' => true, 'message' => 'Post created successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to save post']);
    }
}
?>
