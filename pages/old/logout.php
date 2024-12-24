<?php  
    error_reporting (E_ALL ^ E_NOTICE);
    session_destroy();  
    header("Location: login.php");//use for the redirection to some page  
?>  