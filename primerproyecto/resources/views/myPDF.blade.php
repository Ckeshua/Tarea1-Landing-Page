<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $dir = new DirectoryIterator(dirname(storage_path('imgs/yareyare.jpg')));
    $dir_names = array();
    foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot()) {
            $filename = $fileinfo->getFilename();
            array_push($dir_names,"$filename");
        }
    }
    ?>
    @foreach ($dir_names as $name)
        <?php $real_name = "../storage/imgs/$name"?>
        <img src="<?php echo $real_name ?>" style="width: 700px; height: 700px">
    @endforeach
</body>
</html>