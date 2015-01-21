<html>
<head>
<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">


<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="js/bootstrap.min.js"></script>

</head>
<body>

<?php setcookie("name",$_POST['name'],time()+3600) ?>
<?php
//連結資料庫//
//$link = mysql_connect('mysql.cs.ccu.edu.tw:3306', 'pcc102m', 'kelly791126'); 
$link = mysql_connect('localhost:49272', 's602410023', 's602410023'); 

if (!$link) { 
 die('Could not connect: ' . mysql_error()); 
} 
//mysql_select_db("pcc102m_rss", $link);
mysql_select_db("s602410023", $link);

//連結資料庫//


$name = $_POST['name'];
$pw = $_POST['pw'];

//搜尋資料庫資料
$sql = "SELECT * FROM member where name = '".$name."'";
$result = mysql_query($sql);
$row = @mysql_fetch_row($result);

//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
if($name != null && $pw != null && $row[1] == $name && $row[2] == $pw)
{
        //將帳號寫入session，方便驗證使用者身份
        $_SESSION['name'] = $name;
        echo "<div style='text-align:center;'><h2>登入成功</h2></div>";
        echo '<meta http-equiv=REFRESH CONTENT=1;url=posts.php>';
}
else
{
	
        echo "<div style='text-align:center;'><h1>Error<h1>";
		echo '<h4>Fail connection:<br/>your account or password is invalid.<h4>';
		echo "
		<a href='index.php'>
		  <button class='btn btn-large btn-primary' type='button'>Back to Sign in</button>
		</a></div>
		";
        //echo '<meta http-equiv=REFRESH CONTENT=1;url=index.php>';
}
?>

</body>
</html>