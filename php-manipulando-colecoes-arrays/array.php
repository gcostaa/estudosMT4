<?php

$array = [
    0=> 'um',
    1=> 'dois',
    2=> 'tres'
];

/*foreach ($array as $indice){
    echo $indice .PHP_EOL;
}*/

foreach ($array as $key => $value) {
 
    echo "$key é $value" .PHP_EOL;
}