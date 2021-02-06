<?php
include_once 'config/database_old.php';
include_once 'config/database.php';

$start = microtime(true);

//* repeat db connection 100 times in PHP
$i = 0;
while ($i < 100) {
    $database = new Database_Old();
    $db = $database->getConnection();
    $i ++; 
}

$old_time_cal = microtime(true) - $start;


//* new function

$start = microtime(true);

//* repeat db connection 100 times in PHP
$i = 0;
while ($i < 1000) {
    $database = Database::getInstance();
    $db = $database->getConnection();
    $i ++; 
}

$new_time_cal = microtime(true) - $start;


$diff = $old_time_cal - $new_time_cal;
$percentage = ($new_time_cal / $old_time_cal)*100;

printf('Old DB connection Cal ==> %s ms'.PHP_EOL, $old_time_cal*1000);
printf('New DB New connection Cal ==> %s ms'.PHP_EOL, $new_time_cal*1000);

printf('you saved %s ms per connection'.PHP_EOL, $diff*1000);
printf('each connection is %s%% of old connection'.PHP_EOL, $percentage);