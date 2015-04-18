<?php
 
        session_start();
       
        include("connection.php");
       
        $query="UPDATE diary SET page='".mysqli_real_escape_string($link, $_POST['page'])."'WHERE id='".$_SESSION['id']."' LIMIT 1";
       
        mysqli_query($link, $query);
       
 
?>