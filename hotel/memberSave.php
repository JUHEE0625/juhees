<?php
echo '회원가입';

$servername = "mysql.hostinger.kr";
$database = "u375181454_hotel";
$username = "u375181454_juhee";
$password = "dst1738";
// Create connection
$dbConnect = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$dbConnect) {
    die("Connection failed: " . mysqli_connect_error());
}



    $memberId = $_POST['userId'];
    $memberName = $_POST['username'];
    $memberPw = $_POST['password'];
$memberPw2 = $_POST['password_a'];
    $memberPhone=$_POST['userPhone'];
    $memberEmailAddress = $_POST['email'];


    //PHP에서 유효성 재확인

    //아이디 중복검사.
    $sql = "SELECT * FROM member WHERE memberId = '{$memberId}'";
    $res = $dbConnect->query($sql);
    if($res->num_rows >= 1){
        echo 'This ID is already here.';
        exit;
    }

    //비밀번호 일치하는지 확인


    //닉네임, 생일 그리고 이름이 빈값이 아닌지
    if( $memberName == ''){
        echo 'There is no name.';
        exit;
    }

    //이메일 주소가 올바른지
    $checkEmailAddress = filter_var($memberEmailAddress, FILTER_VALIDATE_EMAIL);

    if($checkEmailAddress != true){
        echo "This is not valid Email.";
        exit;
    }

    //이제부터 넣기 시작
    $sql = "INSERT INTO member VALUES('{$memberId}','{$memberPw}','{$memberName}','{$memberEmailAddress}','{$memberPhone}');";

    if($dbConnect->query($sql)){
      echo "<script>alert(\"Now you are Hilton Hotel's member!\");
      history.back();
      </script>";

    }
    else {
      echo "<script>alert(\"Try again....\");
      
   
      </script>";
    }

?>
