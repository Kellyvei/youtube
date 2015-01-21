
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

<body>
<style>
.register{
	margin: 0 auto;
	width: 80%;
	text-align:center;
}
</style>


<div class="register">
<h3>Register</h3>
	<form name="form" method="post" action="register_finish.php">
	<input type="text"  style="height:35px;" name="name" placeholder="Name" /> <br>
	<input type="password"  style="height:35px;" name="pw" placeholder="password" /> <br>
	<input type="password"  style="height:35px;" name="pw2" placeholder="確認password" /> <br>
	<input type="text"  style="height:35px;" name="email" placeholder="email" /> <br>

	<input type="submit" name="button" value="註冊" class="btn btn-primary" />
	</form>
</div>


</body>

</html>