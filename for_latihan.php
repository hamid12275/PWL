<?php
function numpat($n) 
{  
    $num = 1; 
    for ($i = 0; $i < $n; $i++) 
    { 
        for ($j = 0; $j <= $i; $j++ ) 
        { 
            echo $num." "; 
        } 
            $num = $num + 1; 
        echo ""; 
    } 
} 
    $n = 5; 
    numpat($n); 
?> 