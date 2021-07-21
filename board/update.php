<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>게시판 수정</title>
<link rel='stylesheet' href='style.css' />
</head>
<body>
<?php
    $num=$_GET['num'];
    $conn=mysqli_connect("localhost", "dbs0834", "1234", "sqldb") or die("MySQL 접속 실패 !!");
    $sql="select * from board where num=".$num;

    $ret = mysqli_query($conn, $sql);    
    if($ret) {
    //echo mysqli_num_rows($ret)."건이 조회됨<br>";
    $row = mysqli_fetch_array($ret);
    }else{
    echo "데이터 읽기 실패!!!<br>";
    echo "실패 원인 :".mysqli_error($conn);
    exit();
    }

    echo "<h1>게시판 수정</h1>";
    echo "<a href='list.php'>리스트</a>&nbsp;&nbsp;";
    echo "<a href='index.html'>처음화면</a>";
    echo "<form action='updateProc.php' method='post'>";
    echo "<table>";
    echo " <tr>";
    echo "    <th width='120'>글번호</th>";
    echo "    <td>";
    echo "    <input type='hidden' name='num' value='",$row['num'],"'>",$row['num'];
    echo "    </td>";
    echo "  </tr>";
    echo "  <tr>";
    echo "   <th>글쓴이</th>";
    echo "    <td>";
    echo "    <input type='text' name='writer' value='",$row['writer'],"' size='12' maxlength='12' readonly>";
    echo "    </td>";
    echo "  </tr>";
    echo "  <tr>";
    echo "   <th>비밀번호</th>";
    echo "    <td><input type='password' name='pwd' value='' size='12' maxlength='12'></td>";
    echo "  </tr>";
    echo "  <tr>";
    echo "    <th>조회수</th>";
    echo "    <td>",$row['hit'],"</td>";
    echo "  </tr>";
    echo "  <tr>";
    echo "    <th>제목</th>";
    echo "    <td><input type='text' name='title' value='",$row['title'],"' size='50' maxlength='50'></td>";
    echo "  </tr>";
    echo "  <tr>";
    echo "    <th>내용</th>";
    echo "    <td><textarea rows='5' cols='50' name='content'>",$row['content'],"</textarea></td>";
    echo "  </tr>";
    echo "  <tr>";
    echo "    <td colspan='2'>";
    echo "        <input type='submit' value='수정'>";
    echo "        <input type='button' value='취소' onclick='javascript:history.go(-1)'>";
    echo "    </td>";  
    echo "  </tr>";
    echo "</table>";
    echo "</form>";

    mysqli_close($conn);
?>
</body>
</html>
