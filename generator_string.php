<?php

$variable = $_GET['variable'];

for($i=0; $i < $variable; $i++){


    $bytes = openssl_random_pseudo_bytes(16, $cstrong);
    $hex   = bin2hex($bytes);



    echo substr_replace($hex , "", 0 , 10);
    echo "    ";
    //var_dump($cstrong);
     



}
?>

