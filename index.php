<?php
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $db = "lee3ll"
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charest("utf-8");

    if(mysqli_connect_errno()){
        echo :"Database Connect False";
    }else {
        echo "Database Connect True"
    }
?>