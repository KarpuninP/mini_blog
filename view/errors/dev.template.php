<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Error</title>
    </head>
    <body>
        <!-- This page will be redirected to if an error occurs in development mode. And it will show where the error is -->
        <h1>An error has occurred</h1>
        <p><b>Error code:</b> <?= $errno ?></p>
        <p><b>Error text:</b> <?= $errstr ?></p>
        <p><b>The file where the error occurred:</b> <?= $errfile ?></p>
        <p><b>The line where the error occurred:</b> <?= $errline ?></p>

    </body>
</html>