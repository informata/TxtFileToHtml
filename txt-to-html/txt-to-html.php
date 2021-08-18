<?php

// Load txtfile.txt file to a string
$file = file_get_contents('txt-file.txt');

// Replace all newlines with html <br/> tag
$file = str_replace("\n", '<br/>', $file);

// Output html file
?><!DOCTYPE html>
<html>
    <body>
    <h1>txt-to-html.php</h1>
    <p><?php echo $file; ?></p>
    </body>
</html>