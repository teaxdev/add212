<?php 

$action(); // Display the result 
$title = $page['title']; $variables = $page['variables']; // For now, just show the title 
echo "$title"; if (isset($variables['jokes'])) { 
    echo " Found " . count($variables['jokes']) . " jokes "; 
    } 

?>