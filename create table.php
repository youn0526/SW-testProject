<?php
    $conn=mysqli_connect("localhost", "dbs0834", "1234", "mydb") or die("MySQL 접속 실패 !!");

    $sql ="create table member( 
        Name        char(10),
        Email	  	char(30),
        ID  	    char(10) primary key,
        Password   	char(100),
        Date        char(20))";        
    $ret = mysqli_query($conn, $sql);
    
    if($ret) {
        echo "member이 성공적으로 생성됨..";
    }else{
        echo "member 생성 실패!!!"."<br>";
        echo "실패 원인 :".mysqli_error($conn);
    }
    mysqli_close($conn);
?>
