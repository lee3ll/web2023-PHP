<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $boardID = $_POST['boardID'];
    $boardTitle = $_POST['boardTitle'];
    $boardContents = $_POST['boardContents'];

    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents = $connect -> real_escape_string($boardContents);

    $sql = "UPDATE board SET boardTitle = '{$boardTitle}', boardContents = '{$boardContents}'WHERE boardID = '{$boardID}'";
    $connect -> query($sql);

    //echo $boardID, $boardTitle, $boardContents;
?>

<script>
    location.href = "board.php";
</script>