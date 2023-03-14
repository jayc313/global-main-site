<?php

// Include field creation functions
// include_once(get_stylesheet_directory() . '/parts/fields-functions.php');

// Get all part directories
$directories = glob(get_stylesheet_directory(). '/parts/*' , GLOB_ONLYDIR);

// Include the CF fields for each part
foreach($directories as $dirs) {
    include_once($dirs . '/fields.php');
}