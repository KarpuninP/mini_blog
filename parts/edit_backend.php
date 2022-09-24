<?php
// Check what has arrived
//var_dump($_POST);
//exit();

if (isset($_POST['send'])) {

    // Empty check
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $postId = isset($_POST['postId']) ? $_POST['postId'] : '';
    $index = isset($_POST['index']) ? $_POST['index'] : '';
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';

    // Data validation
    // Check type
    if (!$type || $type != 'theory' &&  $type != 'practice') {
        header('Location: http://localhost:8000');
        // Error recording
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Error, type does not match given parameters.File edit_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }
    // Check $postId
    if (!$postId && $postId > 0 && !is_numeric($postId)) {
        header('Location: http://localhost:8000');
        // Error recording
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Error, postId does not match given parameters.File edit_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }
    // Check index
    $lendIndex = strlen($index);
    if (!$lendIndex || $lendIndex < 0 || $lendIndex > 250) {
        header('Location: http://localhost:8000');
        // Error recording
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Error, index does not match given parameters.File edit_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }

    // Check comment
    $lendComment = strlen($comment);
    if (!$lendComment || $lendComment < 0 || $lendComment > 50000) {
        header('Location: http://localhost:8000');
        // Error recording
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Error, comment does not match given parameters.File edit_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }

    // Remove the ability to insert malicious code (encode / escape special characters)
    $index = filter_var($index, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $comment = filter_var($comment, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Function for edit comment
    editComment($postId, $type, $index, $comment);

}elseif (isset($_POST['delete'])) {

    // Empty check
    $type = isset($_POST['type']) ? $_POST['type'] : '';
    $postId = isset($_POST['postId']) ? $_POST['postId'] : '';

    // Data validation
    // Check type
    if (!$type || $type != 'theory' &&  $type != 'practice') {
        header('Location: http://localhost:8000');
        // Error recording
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Error, type does not match given parameters.File edit_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }
    // Check $postId
    if (!$postId && $postId > 0 && !is_numeric($postId)) {
        header('Location: http://localhost:8000');
        // Error recording
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Error, postId does not match given parameters.File edit_backend.php' . "\r";
        file_put_contents('../database/error.txt', $message, FILE_APPEND);
        exit;
    }
    // Function for delete comment
    delComment($type, $postId);

} else {
    header('Location: http://localhost:8000');
    // Error recording
    $date = date("Y-m-d H:i:s");
    $message = $date . ' - ' . 'Error, data was not received through the button.File edit_backend.php' . "\r";
    file_put_contents('../database/error.txt', $message, FILE_APPEND);
    exit;
}

// Function for edit comment
function editComment(int $postId ,string $type, string $index, string $comment) {

    // If in $type receive 'theory', we run function editCommentStandardForm() with param 'commentsTheory.json'
    if ($type == 'theory') {
        editCommentStandardForm('commentsTheory.json', $postId ,$type, $index, $comment);
        header('Location: http://localhost:8000/index.php');
        exit;
    } else {
        editCommentStandardForm('commentsPractice.json', $postId ,$type, $index, $comment);
        header('Location: http://localhost:8000/practice.php');
        exit;
    }
}

// Function for edit comments check name of file
function editCommentStandardForm(string $nameBD, int $postId ,string $type, string $index, string $comment) {

    // Take the file with $nameBD
    $str = file_get_contents("../database/$nameBD");
    // Decoding
    $posts = json_decode($str, 1);
    // Minus 1 for take key in array
    $idKey = $postId - 1;

    // Save in file and change id
    $editPost[$idKey] = [
        'id' => $postId,
        'type' => $type,
        'index' => $index,
        'comment' => $comment
    ];

    // Save in file
    $posts = array_replace($posts, $editPost);
    $str = json_encode($posts);
    file_put_contents("../database/$nameBD", $str);
}

// Function for delete comments in array
function delComment (string $type, int $postId) {

    // If in $type receive 'theory', we run function del() with param 'commentsTheory.json'
    if ($type == 'theory') {
        $nameBD = 'commentsTheory.json';
        del($nameBD, $postId);
        header('Location: http://localhost:8000/index.php');
        exit;
    } else {
        $nameBD = 'commentsPractice.json';
        del($nameBD, $postId);
        header('Location: http://localhost:8000/practice.php');
        exit;
    }
}

// Function for delete comments
function del(string $nameBD, int $postId) {

    // Take the file with $nameBD
    $str = file_get_contents("../database/$nameBD");
    $posts = json_decode($str, 1);
    // Minus 1 for take key array
    $idKey = $postId - 1;
    // Delete key in array
    unset($posts[$idKey]);
    // Record in file
    $str = json_encode($posts);
    file_put_contents("../database/$nameBD", $str);
}
