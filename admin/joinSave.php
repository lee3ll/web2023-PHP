<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>

    <?php include "../include/head.php"?>
    <style>            
        .intro__images img{
            width: 100%;
            /* height: 400px; */
            margin: 0 auto;
            align-items: center;
            border-radius: 50%;       
        }
        .join__agree p{
            text-align: center;
            font-size: 25px;
        }        
    </style>
</head>
<body class="gray">
    <?php include "../include/skip.php" ?>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main" class="container">
        <div class="intro__inner center bmStyle">
            <picture class="intro__images">
                <source srcset="../assets/img/join01.png, assets/img/join01@2x.png 2x, assets/img/join01@3x.png 3x" />
                <img src="../assets/img/join01.png" alt="회원가입 이미지">
            </picture>
            <p class="intro__text">
                회원가입을 해주시면 다양한 정보를 자유롭게 볼 수 있습니다.
            </p>
        </div>
        <div class="join__inner" container>
            <h2>회원가입</h2>
            <div class="index">
                <ul>
                    <li>1</li>
                    <li class="active">2</li>
                    <li>3</li>
                </ul>
            </div>
            <div class="join__form">
                <form action="joinResult.php" name="#joinResult" method="post" onsubmit="return joinChecks()">
                    <fieldset>
                        <legend class="blind">회원가입 영역</legend>
                        <div>
                            <label for="youName" class="required">이름</label>
                            <input type="text" id="youName" name="youName" class="inputStyle" maxlength="5" placeholder="이름을 적어주세요!" required>
                            <p class="msg" id="youNameComment"><!--이름은 한글로만 작성할 수 있습니다.--></p>
                        </div>
                        <div class="over">
                            <label for="youEmail" class="required">이메일</label>
                            <input type="email" id="youEmail" name="youEmail" class="inputStyle" placeholder="이메일을 적어주세요!" required>
                            <a href="#c" class="youCheck" onclick="emailChecking()">이메일 중복검사</a>
                            <p class="msg" id="youNameComment"><!--이메일이 존재합니다.--></p>
                        </div>
                        <div class="over">
                            <label for="youNick" class="required">닉네임</label>
                            <input type="Nickname" id="youNick" name="youNick" class="inputStyle" placeholder="이메일을 적어주세요!">
                            <a href="#c" class="youCheck">닉네임 중복검사</a>
                            <p class="msg" id="youNickComment"><!--닉네임이 존재합니다.--></p>
                        </div>
                        <div>
                            <label for="youPass" class="required">비밀번호</label>
                            <input type="password" id="youPass" name="youPass" class="inputStyle" placeholder="비밀번호를 적어주세요!">
                            <p class="msg" id="youPassComment"><!--비밀번호, 특수기호, 숫자가 들어가야합니다.--></p>
                        </div>
                        <div>
                            <label for="youPassC" class="required">비밀번호 확인</label>
                            <input type="password" id="youPassC" name="youPassC" class="inputStyle" placeholder="다시 한번 비밀번호를 적어주세요!">
                            <p class="msg" id="youPassComment"><!--비밀번호가 일치하지않습니다.--></p>
                        </div>
                        <div>
                            <label for="youBirth">생년월일</label>
                            <input type="text" id="youBirth" name="youPassC" class="inputStyle" placeholder="YYYY-MM-DD">
                            <p class="msg" id="youBirthComment"><!--비밀번호가 일치하지않습니다.--></p>
                        </div>
                        <div>
                            <label for="youPhone" class="required">연락처</label>
                            <input type="text" id="youPhone" name="youPhone" class="inputStyle" placeholder="연락처를 적어주세요!" maxlength="15">
                            <p class="msg" id="youPhoneComment"><!--번호가 존재하지 않습니다.--></p>
                        </div>                     
                        <button type="submit" class="btnStyle">회원가입 완료</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
    <!-- //main -->
    
    <?php include "../include/footer.php" ?>
    <!-- //footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let isEmailCheck = false;

        function emailChecking(){
            let youEmail = $("#youEmail").val();

            if(youEmail == null || youEmail == ''){
                $("#youEmailComment").text("* 이름을 입력해주세요!"); 
            }else {
                $.ajax({
                    type : "POST",
                    url : "joinCheck.php",
                    data : {"youEmail": youEmail, "type": isEmailCheck}
                    dataType : "json", 

                    success : function(data){
                        if(data.result == "good"){
                            $("youEmailComment").text("사용 가능한 이메일입니다.");
                            isEmailCheck = true;
                        }else {
                            $("youEmailComment").text("이미 존재하는 이메일입니다.");
                            isEmailCheck = false
                        }
                    }

                    error : function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        }

        function joinChecks(){
            //이름 유효성검사
            if($("#youName").val() == ''){
                $("#youNameComment").text("* 이름을 입력해주세요!");
                $("#youName").focus();
                return false;
            }
            let getYouName = RegExp(/^[가-힣]+$/);
            if(!getYouName.test($("#youName").val())){
                $("#youNameComment").text("* 이름은 한글만 사용 가능합니다.");
                $("#youName").val('');
                $("#youName").focus();
                return false;
            }

            //이메일 유효성검사
            if($("#youEmail").val() == ''){
                $("#youEmailComment").text("* 이름을 입력해주세요!");
                $("#youEmail").focus();
                return false;
            }
            let getYouEmail = RegExp(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i);            
            if(!getYouName.test($("#youEmail").val())){
               $("#youEmailComment").text("* 이름은 한글만 사용 가능합니다.");
               $("#youEmail").val('');
               $("#youEmail").focus();
               return false;
            }
        }
    </script>
</body>
</html>