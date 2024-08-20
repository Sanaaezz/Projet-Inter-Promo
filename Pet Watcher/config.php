<?php
    // lors de la mise en open source, remplacer les infos concernant la base de données.
    
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'pet_watcher');
    define('DB_USER', 'pet_watcher');
    define('DB_PWD', 'pet_watcher');
    define('PREFIXE', 'pet_watcher_');
    define('HOME_URL', 'petwatcher/public/');

    // Ne pas toucher :
    
    define('DB_INITIALIZED', TRUE);