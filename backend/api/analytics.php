<?php
$dbFile = '../db/database.json';
$data = file_exists($dbFile) ? json_decode(file_get_contents($dbFile), true) : ['posts' => []];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    foreach ($data['posts'] as &$post) {
        if ($post['id'] == $input['id']) {
            if (isset($input['action'])) {
                if ($input['action'] == 'like') $post['likes']++;
                if ($input['action'] == 'view') $post['views']++;
            }
        }
    }

    file_put_contents($dbFile, json_encode($data));
    echo json_encode(['success' => true]);
}
?>
