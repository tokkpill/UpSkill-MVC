<?php 

function debuguear($variable) : string {
    echo "<pre>";  
    var_dump($variable);
    echo "<pre>"; 
    exit;
}

// Escapa el HTML para evitar XSS
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}