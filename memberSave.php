
<?php
$host = 'localhost';
$user = 'dbs0834';
$pw = '1234';
$dbName = 'mydb';
$mysqli = new mysqli($host, $user, $pw, $dbName);

$id=$_POST['id'];
$pc=$_POST['pw'];
$pw=md5($_POST['pw']);
$name=$_POST['name'];
$email=$_POST['email'];

if($id==NULL || $pc==NULL || $name==NULL || $email==NULL )
{
    echo '<script> alert("빈 칸을 모두 채워주세요"); history.back(); </script>';
    exit();
}
 
$mysqli=mysqli_connect("localhost","dbs0834","1234","mydb");
 
$check="SELECT *from member WHERE ID='$id'";
$result=$mysqli->query($check);
if($result->num_rows==1)
{
    echo '<script> alert("중복된 ID입니다"); history.back(); </script>';
    exit();
}
 
$signup=mysqli_query($mysqli,"INSERT INTO member (Name, Email, ID, Password, Date) 
VALUES ('$name', '$email', '$id', '$pw', NOW())");
if($signup){
    echo '<script> 
    alert("가입을 축하합니다!");
    window.close(); </script>';
} else {
    echo("쿼리오류" . mysqli_error($mysqli));
}
?>