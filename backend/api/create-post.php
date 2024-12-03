<?php
$data = json_decode(file_get_contents('../db/database.json'), true);
$newPost = [
    'id' => count($data['posts']) + 1,
    'title' => $_POST['title'],
    'content' => $_POST['content'],
    'author' => $_POST['author'],
    'date' => date('Y-m-d H:i:s'),
    'likes' => 0
];
$data['posts'][] = $newPost;
file_put_contents('../db/database.json', json_encode($data));
echo json_encode(['status' => 'success', 'message' => 'Post created']);
?>
