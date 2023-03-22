<?php
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $db = "내가 만든 주소아이디(ex: lee3ll.닷홈의 lee311부분)"
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charest("utf-8");

    if(mysqli_connect_errno()){
        echo :"Database Connect False";
    }else {
        echo "Database Connect True"
    }
?>