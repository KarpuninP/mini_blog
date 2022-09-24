<?php
// Check what has arrived
//var_dump($_GET);

// Empty check
$number = isset($_GET['number']) ? $_GET['number'] : '';
$theme = isset($_GET['theme']) ? $_GET['theme'] : '';

// Validate $number
if ($number > 0 & is_numeric($number) & $theme == 'theory' || $theme == 'practice') {
    // Take key (see function selectArray() & openDbComments())
    $numberArray = selectArray(openDbComments($theme),$number);
    //  see function openDbComments()
    $editArray = openDbComments($theme)[$numberArray];

    // $nameType for HTML (see file edit.php)
    if ($editArray['type'] == 'theory' ) {
        $nameType = 'Theory';
    }else{
        $nameType = 'Practice';
    }

}else{
    header('Location: http://localhost:8000');
    $date = date("Y-m-d H:i:s");
    $message = $date . ' - ' . 'Error, in GET request wrong data received .File getUrlEdit' . "\r";
    file_put_contents('database/error.txt', $message, FILE_APPEND);
    exit;
}

// Function for unpacking comments from json format into an array
function openDbComments (string $theme)
{
    // Check themes
    if ($theme == 'theory') {
        $dataTheory = file_get_contents('database/commentsTheory.json');
        $dataTheory = json_decode($dataTheory, 1);
        // Check for null
        if ($dataTheory == null) {
            $dataTheory = [];
        }
        return $dataTheory;

    }elseif ($theme == 'practice') {
        $dataPractice = file_get_contents('database/commentsPractice.json');
        $dataPractice = json_decode($dataPractice, 1);
        // Check for null
        if ($dataPractice == null) {
            $dataPractice = [];
        }
        return $dataPractice;

    } else {
        // Redirect to main page record in log
        header('Location: http://localhost:8000');
        $date = date("Y-m-d H:i:s");
        $message = $date . ' - ' . 'Error, invalid request subject.File getUrlEdit' . "\r";
        file_put_contents('database/error.txt', $message, FILE_APPEND);
        exit;
    }
}


// Function for search by id inside array, return key
function selectArray (array $arrays, int $id) {
    foreach ($arrays as $key => $value) {
        $idArray = $value['id'];
        if ($idArray == $id) {
            return $key;
        }
    }
}
// Check how it's work function
//var_dump(selectArray (openDbComments ('theory'),2));
//var_dump(openDbComments ('theory'));



