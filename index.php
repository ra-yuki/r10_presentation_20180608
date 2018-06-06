<?php
    //var declarations
    $populations = [
        'tokyo' => 9273000,
        'kyoto' => 1475000,
        'fukuoka' => 1539000,
        'nagoya' => 2296000,
        'sapporo' => 1952000
    ];

    //display $populations using print_r() function
    print ("\n/*-- print_r --*/\n");
    print_r($populations);

    //display $populations using while loop
    print ("\n/*-- while --*/\n");
    $keys = array_keys($populations);
    $elements_count = count($populations);
    $i = 0;
    while($i < $elements_count){
        $key = $keys[$i++];
        $value = $populations[$key];
        print('['. $key. '] => '. $value. PHP_EOL);
    }
    
    //display $populations using for loop
    print ("\n/*-- for --*/\n");
    $keys = array_keys($populations);
    $elements_count = count($populations);
    for($i=0; $i<$elements_count; $i++){
        $key = $keys[$i];
        $value = $populations[$key];
        print('['. $key. '] => '. $value. PHP_EOL);
    }

    //display $populations using foreach loop
    print ("\n/*-- foreach --*/\n");
    foreach($populations as $key => $value){
        print('['. $key. '] => '. $value. PHP_EOL);
    }