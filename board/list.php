<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>게시판 리스트</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
	$conn=mysqli_connect("localhost", "dbs0834", "1234", "sqldb") or die("MySQL 접속 실패 !!");
	$sql="select * from board order by num desc";
	$ret=mysqli_query($conn, $sql);
	if($ret){
		//echo mysqli_num_rows($ret)."건이 조회됨<br>";
	}else{
		echo "데이터 리스트 실패!!!<br>";
		echo "실패 원인 :".mysqli_error($conn);
		exit();
	}

	echo "<h1>게시판 리스트</h1>";
	echo "<a href='write.html'>글쓰기</a>&nbsp;&nbsp;";
	echo "<a href='index.html'>처음화면</a>";
	echo "<table width='560' border='0'>";
	echo "	<tr>";
	echo "		<th>번호</th>";
	echo "		<th>제목</th>";
	echo "		<th>작성자</th>";
	echo "		<th>날짜</th>";
	echo "		<th>조회</th>";
	echo "	</tr>";

	while($row=mysqli_fetch_array($ret)){
		echo "<tr>";
		echo "	<td>",$row['num'],"</td>";
		echo "	<td><a href='read.php?num=",$row['num'],"'>",$row['title'],"</a></td>";
		echo "	<td>",$row['writer'],"</td>";
		echo "	<td>",$row['regdate'],"</td>";
		echo "	<td>",$row['hit'],"</td>";
		echo "<tr>";
	}

	mysqli_close($conn); 
	echo "</table>";
?>	
</body>
</html>