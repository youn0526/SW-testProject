<?php
    $conn=mysqli_connect("localhost", "dbs0834", "1234", "sqldb") or die("MySQL 접속 실패 !!");
    
    $num=$_POST["num"];
    $writer=$_POST["writer"];
    $pwd=$_POST["pwd"];
    $title=$_POST["title"];
    $content=$_POST["content"];
    //echo $num," ",$writer," ",$pwd," ",$title," ",$content;

    $sql="update board set writer='".$writer."', title='".$title."', content='".$content."' where num=".$num." and pwd='".$pwd."'";
    echo $sql;
    $ret=mysqli_query($conn,$sql);

    if($ret && mysqli_affected_rows($conn) > 0){
        echo "<script>alert('수정 되었습니다'); location.href='list.php'</script>";
    }else{
        //echo "데이터 수정 실패 :".mysqli_error($conn);
        echo "<script>alert('비밀번호가 틀려 되돌아갑니다!'); history.back();</script>";
    }

    mysqli_close($conn); 
?>