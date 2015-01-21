<html>

<head>
<!--上方語法為啟用session，此語法要放在網頁最前方-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">


<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="js/bootstrap.min.js"></script>

</head>
<style>
body{
background-color:#e5e5e5;
}
.sign_in{
margin: 10% auto 20px;
padding: 19px 29px 29px;
border: 1px solid #e5e5e5;
  width: 80%;
  text-align:center;
  border-radius: 5px;
  max-width: 300px;
  background-color:white;
}




</style>

<body>
	<div class="sign_in" border="1">
	<h3>Sign in</h3>
	<form name="form" method="post" action="connect.php" class="form-horizontal ">
		<div class="control-group">
		<?
		if($_COOKIE["name"]!=null)
		{
		echo"<input type='text' style='height:35px;'  name='name' placeholder='Name' value='".$_COOKIE["name"]."' />";
		}
		else
		{
		echo"<input type='text' style='height:35px;'  name='name' placeholder='Name' />";
		}
		?>
		</div>
		<div class="control-group">
		<input type="password" style="height:35px;" name="pw" placeholder="Password" />
		</div>
		<div class="control-group">
		<input type="submit" class="btn btn-primary" name="button" value="Sign in" />&nbsp;&nbsp;
		<a href="register.php">create account</a>
		</div>
		
	</form>
	
	</div>

</body>

</html>