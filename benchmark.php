<?php
//make a nicely random array
$key_ = range( 0, 99999 );
$val_ = range( 0, 99999 );
shuffle( $key_ );
shuffle( $val_ );
//declare vars
$key = [];
$size = 0;
$i = 0;

//create hash table
$hash_a = array_combine( $key_, $val_ );

$start1 = microtime(true);
foreach($hash_a as $key=>$val) $hash_a[$key]++;
$end1 = microtime(true);

$hash_a = array_combine( $key_, $val_ );
$start4 = microtime(true);
foreach($hash_a as &$val) $val++;
$end4 = microtime(true);

$hash_a = array_combine( $key_, $val_ );
$start2 = microtime(true);
$key = array_keys($hash_a);
$size = sizeOf($key);
$i = 0; while($i < $size) $hash_a[$key[$i++]]++;
$end2 = microtime(true);

$hash_a = array_combine( $key_, $val_ );
$start3 = microtime(true);
$key = array_keys($hash_a);
$size = sizeOf($key);
for ($i=0; $i<$size; $i++) $hash_a[$key[$i]]++;
$end3 = microtime(true);

echo "/-- accessing hash table 0.1M times --/\n";
echo "foreach     ".($end1 - $start1)."\n"; 
//echo "foreach ref ".($end4 - $start4)."\n"; 
echo "for         ".($end3 - $start3)."\n"; 
echo "while       ".($end2 - $start2)."\n"; 

//calling function
function foo( $value=0 ) {}

//create hash table
$hash_b = array_combine( $key_, $val_ );

$start_b3 = microtime(true);
foreach( $hash_b as $val ) foo();
$bend3 = microtime(true);

$hash_b = array_combine( $key_, $val_ );
$start_b4 = microtime(true);
foreach( $hash_b as &$val ) foo();
$bend4 = microtime(true);

$hash_b = array_combine( $key_, $val_ );
$start_b1 = microtime(true);
$key = array_keys($hash_b);
$size = sizeof($key);
for($i = 0; $i < $size; ++$i) foo();
$bend1 = microtime(true);

$hash_b = array_combine( $key_, $val_ );
$start_b2 = microtime(true);
$key = array_keys($hash_b);
$size = sizeof($key);
$i = 0; while($i++ < $size) foo();
$bend2 = microtime(true);

echo "/-- calling function 0.1M times --/\n";
echo "foreach     ".($bend3 - $start_b3)."\n"; 
//echo "foreach ref ".($bend4 - $start_b4)."\n"; 
echo "for         ".($bend1 - $start_b1)."\n"; 
echo "while       ".($bend2 - $start_b2)."\n";

//callling function with hash table access
$hash_b = array_combine( $key_, $val_ );
$start_b3 = microtime(true);
foreach( $hash_b as $val ) foo( $val );
$bend3 = microtime(true);

$hash_b = array_combine( $key_, $val_ );
$start_b4 = microtime(true);
foreach( $hash_b as &$val ) foo( $val );
$bend4 = microtime(true);

$hash_b = array_combine( $key_, $val_ );
$start_b1 = microtime(true);
$key = array_keys($hash_b);
$size = sizeof($key);
for($i = 0; $i < $size; ++$i) foo( $hash_b[$key[$i]] );
$bend1 = microtime(true);

$hash_b = array_combine( $key_, $val_ );
$start_b2 = microtime(true);
$key = array_keys($hash_b);
$size = sizeof($key);
$i = 0; while($i < $size) foo( $hash_b[$key[$i++]] );
$bend2 = microtime(true);

echo "/-- calling function with hash table access 0.1M times --/\n";
echo "foreach     ".($bend3 - $start_b3)."\n"; 
//echo "foreach ref ".($bend4 - $start_b4)."\n"; 
echo "for         ".($bend1 - $start_b1)."\n"; 
echo "while       ".($bend2 - $start_b2)."\n";

//create a random array
$array = range(0, 99999);
shuffle($array);

$start_c1 = microtime(true);
$size = sizeof($array);
for($i = 0; $i < $size; ++$i) $array[$i]++;
$bend1 = microtime(true);

$start_c2 = microtime(true);
$size = sizeof($array);
$i = 0; while($i < $size) $array[$i++]++;
$bend2 = microtime(true);

$start_c3 = microtime(true);
foreach( $array as $value ) $value++;
$bend3 = microtime(true);

$start_c4 = microtime(true);
foreach( $array as &$value ) $value++;
$bend4 = microtime(true);

echo "/-- accessing array 0.1M times --/\n";
echo "foreach     ".($bend3 - $start_c3)."\n"; 
//echo "foreach ref ".($bend4 - $start_c4)."\n"; 
echo "for         ".($bend1 - $start_c1)."\n"; 
echo "while       ".($bend2 - $start_c2)."\n"; 

//callling function with array access
$start_b3 = microtime(true);
foreach( $array as $val ) foo( $val );
$bend3 = microtime(true);

$start_b4 = microtime(true);
foreach( $array as &$val ) foo( $val );
$bend4 = microtime(true);

$start_b1 = microtime(true);
$size = sizeof($array);
for($i = 0; $i < $size; $i++) foo( $array[$i] );
$bend1 = microtime(true);

$start_b2 = microtime(true);
$size = sizeof($array);
$i = 0; while($i < $size) foo( $array[$i++] );
$bend2 = microtime(true);

echo "/-- calling function with array access 0.1M times --/\n";
echo "foreach     ".($bend3 - $start_b3)."\n"; 
//echo "foreach ref ".($bend4 - $start_b4)."\n"; 
echo "for         ".($bend1 - $start_b1)."\n"; 
echo "while       ".($bend2 - $start_b2)."\n";