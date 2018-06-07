<?php

$file_name = 'memo';
$suffix = 2;
while(file_exists($file_name)){ //loop if the file called 'memo' exists
    $file_name = $file_name. '_'. $suffix; //add a suffix to 'memo'
    $suffix = $suffix + 1; //add 1 to $suffix
}

$file = fopen($file_name, 'w'); //create a file as $file_name
fclose($file);
