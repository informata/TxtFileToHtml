<?php

// Load txtfile.txt file to a string
$file = file_get_contents('txt-file.txt');

// Replace all newlines with html <br/> tag
$file = str_replace("\n", '<br/>', $file);

// Output html file
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Multiline TXT file to HTML example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h1>Multiline TXT file to HTML example</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p>The following text is extracted from a multiline txt file:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-primary" role="alert">
                    <p class="m-0"><?php echo $file; ?></p>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>