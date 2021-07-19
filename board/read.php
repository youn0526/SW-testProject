<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>게시판 읽기</title>
  <link rel='stylesheet' href='style.css'>
  <script>
    function modify(num){   //글수정
      location.href="update.php?num="+num;
    }
    function delview(){
      document.getElementById('frm1').style.display="inline";
      document.getElementById('span1').style.visibility="hidden";
    }
    function cancel(){
      document.getElementById('frm1').style.display="none";
      document.getElementById('span1').style.visibility="";
    }
    function del(){        // 글삭제
      if(document.getElementById('pwd').value==''){
        alert('비밀번호를 입력하세요!');
        document.getElementById('pwd').focus();
        return;
      }
      document.frm1.submit();
    }
  </script>
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

  echo "<h1>게시판 읽기</h1>";
  echo "<a href='list.php'>리스트</a>&nbsp;&nbsp;";
  echo "<a href='index.html'>처음화면</a>";
  echo "<table>";
  echo " <tr>";
  echo "    <th width='120'>글번호</th>";
  echo "    <td>",$row['num'],"</td>";
  echo "  </tr>";
  echo "  <tr>";
  echo "   <th>글쓴이</th>";
  echo "    <td>",$row['writer'],"</td>";
  echo "  </tr>";
  echo "  <tr>";
  echo "    <th>조회수</th>";
  echo "    <td>",$row['hit'],"</td>";
  echo "  </tr>";
  echo "  <tr>";
  echo "    <th>제목</th>";
  echo "    <td>",$row['title'],"</td>";
  echo "  </tr>";
  echo "  <tr>";
  echo "    <th>내용</th>";
  echo "    <td>",$row['content'],"</td>";
  echo "  </tr>";
  echo "  <tr>";
  echo "    <td colspan='2'>";
  echo "      <span id='span1'>";
  echo "        <input type='button' value='글수정' onclick='modify(",$num,")'>";
  echo "        <input type='button' value='글삭제' onclick='delview()'>";
  echo "      </span>";
  echo "      <form id='frm1' name='frm1' action='deleteProc.php' method='post' style='display:inline;display:none'>";
  echo "        <input type='hidden' name='num' value='",$num,"'>";
  echo "        비밀번호 : <input type='password' id='pwd' name='pwd' size='12' maxlength='12'>";
  echo "        <input type='button' value='Del' onclick='del()'>";
  echo "        <input type='button' value='Cancel' onclick='cancel()'>";
  echo "      </form>";
  echo "    </td>";  
  echo "  </tr>";
  echo "</table>";

  mysqli_close($conn);
?>
</body>
</html>
