<html>




<head>
<?php session_start(); ?>
<!--上方語法為啟用session，此語法要放在網頁最前方-->

<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">


<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="js/bootstrap.min.js"></script>

</head>


<body>
<style>
.profile{
	margin: 0 auto;
	width: 80%;
	//text-align:center;
}
</style>
<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
//連結資料庫//
$link = mysql_connect('mysql.cs.ccu.edu.tw:3306', 'pcc102m', 'kelly791126'); 
//$link = mysql_connect('localhost:3306', 's602410023', 's602410023'); 

if (!$link) { 
 die('Could not connect: ' . mysql_error()); 
} 
mysql_select_db("pcc102m_rss", $link);
//mysql_select_db("s602410023", $link);

//連結資料庫//

if($_SESSION['name'] != null)
{
        //將$_SESSION['username']丟給$id
        //這樣在下SQL語法時才可以給搜尋的值
        $name = $_SESSION['name'];
        //若以下$id直接用$_SESSION['username']將無法使用
        $sql = "SELECT * FROM member where name='$name'";
        $result = mysql_query($sql);
        $row = mysql_fetch_row($result);
		
		echo "<div class='profile'>";
		echo"
		<form name=\"form\" method=\"post\" class='form-horizontal' action=\"profile_finish.php\">
		<h3>Profile</h3>
		  <div class='control-group'>
			<label class='control-label' for='inputName'>Name</label>
			<div class='controls'>
			  <input type='text' name='name' style='height:35px;' id='inputName' value='".$_SESSION['name']."' disabled>
			</div>
		  </div>
		  <div class='control-group'>
			<label class='control-label' for='inputPassword'>New Password</label>
			<div class='controls'>
			  <input type='password' name='pw' style='height:35px;' id='inputPassword' placeholder='New Password'>
			</div>
		  </div>
		  <div class='control-group'>
			<label class='control-label' for='inputPassword_2'>Confirm Password</label>
			<div class='controls'>
			  <input type='password' name='pw2' style='height:35px;' id='inputPassword_2' placeholder='Confirm Password'>
			</div>
		  </div>
		  <div class='control-group'>
			<label class='control-label' for='inputEmil'>Email</label>
			<div class='controls'>
			  <input type='text' name='email' style='height:35px;' id='inputEmail' value='".$row[3]."'>
			</div>
		  </div>
		  <div class='control-group'>
			<div class='controls'>
			  <button type='submit' class='btn btn-primary'>profile</button>
			</div>
		  </div>
		</form>
		";
		echo "</div>";
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>

</body>
</html>