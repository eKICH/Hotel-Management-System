<?php
    session_start();
    session_unset();
    session_destroy();
    
    header("Location: http://localhost/Hotel%20Management%20System/index.php");
?>