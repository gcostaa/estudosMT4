<?php
//[32,16,8,4,2,1]
//[0, 0, 1,1,0,1]
$bit = "11111111";
$potencias=[];
$bitArray = str_split($bit);
$contator=1;
$resultado = 0;

for ($i=1; $i <= count($bitArray); $i++) { 
    
    array_unshift($potencias,$contator);

    $contator *= 2;
    
}

for ($i=count($bitArray)-1; $i >= 0; $i--) { 
        
    //echo "$bitArray[$i]...$potencias[$i]". PHP_EOL;

    if ($bitArray[$i] == 1){
        $resultado+=$potencias[$i];
    }
        
}
    
echo "O numero é:..$resultado";
?>