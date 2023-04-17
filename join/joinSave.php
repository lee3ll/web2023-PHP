<?php
    include "../connect/connect.php";

    $youEmail = $_POST['youEmail'];
    $youName = $_POST['youName'];
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];
    $youPhone = $_POST['youPhone'];
    $regTime = time();

    //echo $youEmail, $youName, $youPass, $youPhone;

    // $sql = "INSERT INTO members(youEmail,youName,youPass,youPhone,regTime) VALUES('$youEmail','$youName', '$youPass','$youPhone','$regTime')";
    // $connect -> query($sql);

    //이메일 유효성 검사
    // $check_mail = preg_match("/^[a-z0-9_+.-]+@([a-z0-9-]+\.)+[a-z0-9]{2,4}$/", $youEmail);

    // if(check_mail == false){
    //     echo = "이메일이 잘못되었습니다. 올바른 이메일을 작성해 주세요!";
    //     exit;
    // }

    // //이름 유효성 검사
    // $check_name = preg_match("/^[가-힣]{3,5}$/", $youName);

    // if(check_name == false){
    //     echo = "이름은 한글로 3~5자만 가능합니다.";
    //     exit;
    // }

    // //비밀번호 유효성 검사
    // if($youPass !== $youPassC){
    //     echo = "비밀번호가 일치하지 않습니다.";
    //     exit;
    // }

    //사용자  데이터 입력 --> 유효성 검사(O) --> 통과 --> 회원가입(쿼리문 전송)
    //사용자  데이터 입력 --> 유효성 검사(O) --> 통과(이메일주소/핸드폰) --> 통과 --> 회원가입(쿼리문 전송)
    //사용자  데이터 입력 --> 유효성 검사(X) --> 통과 --> 회원가입(쿼리문 전송)
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 블로그 만들기</title>

    <?php include "../include/head.php"?>

</head>
<body class="gray">

    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main" class="container">
        <div class="intro__inner center bmStyle">
            <picture class="intro__images">
                <source srcset="../assets/img/joinend01.png, ../assets/img/join01@2x.png 2x, assets/img/join01@3x.png 3x" />
                <img src="../assets/img/joinend01.png" alt="회원가입 이미지">
            </picture>
            <p class="intro__text">
                회원가입을 축하합니다. 환영합니다. 로그인을 해주세요!
            </p>
            <div class="intro__btn">
                <a href="#">메인으로</a>
                <a href="#">로그인</a>
            </div>
        </div>
        <!-- //intro__inner -->
    </main>
    <!-- //main -->

    
</body>
</html>