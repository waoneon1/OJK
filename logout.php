<?php
session_start();
session_destroy();
   echo "<script type='text/javascript'>".
            "alert('logout');".
            "window.location = 'index.php';".
            "</script> ";
?>
