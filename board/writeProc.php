<?php
    $conn=mysqli_connect("localhost","dbs0834","1234","sqldb") or die("MySQL 접속 실패");
    $writer=$_POST["writer"];
    $pwd = $_POST["pwd"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    $sql=$sql="insert into board(writer,pwd,title,content,hit,regdate) values('".$writer."','".$pwd."','".$title."','".$content."',0,now())";
    //echo $sql;
    $ret=mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn) > 0){
        echo "<script> alert('추가되었습니다'); location.href='list.php'; </script>";

    }else{
        echo "데이터 입력 실패:".mysqli_error($conn);
    }

    mysqli_close($conn);
?>