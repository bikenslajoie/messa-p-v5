<?php
function barValueFormat($aLabel) { 
    // Format '1000 english style 
    return number_format($aLabel); 
    // Format '1000 french style 
    // return number_format($aLabel, 2, ',', ' '); 
} 
?>