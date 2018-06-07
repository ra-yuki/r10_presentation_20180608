<?php

$num = rand(); //get random value
while($num % 5 > 0){ //if $num is NOT multiples of 5
    $num = $num + 1; //add 1 to $num
}

print($num);