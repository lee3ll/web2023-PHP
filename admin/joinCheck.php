<?php
    include "../connect/connect.php";
    
    // SELECT youEmail FROM adminMenbers WHERE youEmail = {}

    $type = $_POST['type'];
    $email = $_POST['youEmail'];
    $jsonResult = "bad";

    
    if ($type == "isEmailCheck"){
        $youEmail = $connect -> real_escape_string(trim(email));
        $squl = "SELECT youEmail FROM adminMembers WHERE youEmail = '{$youEmail}'";
    }

    $result = $connect -> query($sql);

    if($result -> num_row == 0){
        $jsonResult = "good";
    }

    echo json_encode(array("result"=>$jsonResult));
?>
