<?php
    $conn=mysqli_connect("localhost", "dbs0834", "1234", "mydb") or die("MySQL 접속 실패 !!");

    $sql ="insert into member value
		('dd', 'abc@abc', 'test1', '123', '1900-8-8')";

    $ret = mysqli_query($conn, $sql);

    if($ret) {
        echo "member이 데이터가 성공적으로 입력됨.";
    }else {
        echo "member 데이터 입력 실패!!!"."<br>";
        echo "실패 원인 :".mysqli_error($conn);
    }
    mysqli_close($conn);
?>
