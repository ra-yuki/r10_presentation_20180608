<?php
    function init(&$a, $c){
        for($j=0; $j<$c; $j++){
            $a[$j] = 0;
        }
    }

    //var declarations
    $lps = 100000;
    $a = []; init($a, $lps);
    $t_st = $st_ed = 0;
    $i = 0;
    $c = count($a);

    echo "/-- looping 1M times --/\n";

    //evaluate for loop performance
    reset($a);
    $t_st = microtime(true);
    for($i=0; $i<$c; $i++){}
    $t_ed = microtime(true);
    $t_elps = $t_ed - $t_st;

    echo "for         ". $t_elps. " sec\n";

    //evaluate while loop performance
    init($a, $lps);
    reset($a);
    $i = 0;
    $t_st = microtime(true);
    while($i++ < $c){}
    $t_ed = microtime(true);
    $t_elps = $t_ed - $t_st;

    echo "while       ". $t_elps. " sec\n";

    //evaluate foreach loop performance
    init($a, $lps);
    reset($a);
    $t_st = microtime(true);
    foreach($a as $val){}
    $t_ed = microtime(true);
    $t_elps = $t_ed - $t_st;

    echo "foreach     ". $t_elps. " sec\n";

    //evaluate foreach loop performance
    init($a, $lps);
    reset($a);
    $t_st = microtime(true);
    foreach($a as &$val){}
    $t_ed = microtime(true);
    $t_elps = $t_ed - $t_st;

    //echo "foreach ref ". $t_elps. " sec\n";