<?php
// Check what has arrived
//    var_dump($_POST);
//    exit();

if (isset($_POST['send'])) {

    // Empty check
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $index = isset($_POST['index']) ? $_POST['index'] : '';
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';

    // Data validation
    // Check type
    if (!$type || $type != 'theory' &&  $type != 'practice') {
        header('Location: http://localhost:8000');
        // Error recording
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Error, type does not match given parameters.File add_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }

    // Check index
    $lendIndex = strlen($index);
    if (!$lendIndex || $lendIndex < 0 || $lendIndex > 250) {
        header('Location: http://localhost:8000');
        // Error recording
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Error, index does not match given parameters.File add_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }

    //  Check comment
    $lendComment = strlen($comment);
    if (!$lendComment || $lendComment < 0 || $lendComment > 50000) {
        header('Location: http://localhost:8000');
        // Error recording
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' .'Error, comment does not match given parameters.File add_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }

    // Remove the ability to insert malicious code (encode / escape special characters)
    $index = filter_var($index, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $comment = filter_var($comment, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Function for adding comments, after redirect
    addComment($type, $index, $comment);
    header('Location: http://localhost:8000/add.php');
    exit;

} else {
    header('Location: http://localhost:8000');
    // Error recording
    $date = date("Y-m-d H:i:s");
    $message = $date . ' - ' . 'Error, data was not received through the button.File add_backend.php' . "\r";
    file_put_contents('../database/error.txt', $message, FILE_APPEND);
    exit;
}

// Function for adding comments to file
function addComment(string $type, string $index, string $comment) {

    // If in $type receive 'theory', we run function addCommentStandardForm() with param 'commentsTheory.json'
    if ($type == 'theory') {
        addCommentStandardForm('commentsTheory.json', $type, $index, $comment);
        header('Location: http://localhost:8000/index.php');
        exit;
    } else {
        addCommentStandardForm('commentsPractice.json', $type, $index, $comment);
        header('Location: http://localhost:8000/practice.php');
        exit;
    }
}

// Function for adding comments check name of file
function addCommentStandardForm (string $nameBD, string $type, string $index, string $comment) {

    // Take the file with $nameBD
    $str = file_get_contents("../database/$nameBD");
    // Decoding
    $posts = json_decode($str, 1);
    // Check id or add id, plus 1 for next comment
    $id = addId($type) + 1;

    // Make array
    $posts[] = [
        'id' => $id,
        'type' => $type,
        'index' => $index,
        'comment' => $comment
    ];

    // Save in file
    $str = json_encode($posts);
    file_put_contents("../database/$nameBD", $str);
}

// Check id or add id,
function addId(string $type) {

    // Check type
    if ($type == 'theory') {
        $str = file_get_contents('../database/commentsTheory.json');
        $posts = json_decode($str, 1);
    }else {
        $str = file_get_contents('../database/commentsPractice.json');
        $posts = json_decode($str, 1);
    }

    // Take last id
    foreach ($posts as $key => $value) {
        $id = $value['id'];
    }

    // If not find id, id = 0
    if ($id === null) {
        $id = 0;
    } else {
        $id = $value['id'];
    }

    return $id;

}


