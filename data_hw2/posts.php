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
<script language="JavaScript">

function content_null()
{
	alert("Please Enter Content!")
}
function count(count)
{
document.write("<div align='center'>");
alert ("ok!");
}

</script>

<style>
	.container_1
	{
	margin: 8em;
	}
	.hr hr
	{
	
border: 1px solid #58D3F7;
	}

</style>


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




//判斷帳號與密碼是否為空白
//以及MySQL資料庫裡是否有這個會員
//if($name != null && $pw != null && $row[1] == $name && $row[2] == $pw &&$_SESSION['name']!=NULL)
if($_SESSION['name']!=null)
{
        //將帳號寫入session，方便驗證使用者身份
        
        //echo "<div style='text-align:center;'><h2>登入成功，Hello ".$_SESSION['name']."</h2></div>";
        //echo '<meta http-equiv=REFRESH CONTENT=0;url=posts.php>';
		
		
		/*
		<ul class='nav navbar-nav navbar-right'>
					<li id='fat-menu' class='dropdown open'>
					  <a href='#' id='drop3' role='button' class='dropdown-toggle' data-toggle='dropdown' style='color:white;'>".$_SESSION['name']."<b class='caret'></b></a>
					  <ul class='dropdown-menu' role='menu' aria-labelledby='drop3' style='left:0;'>
						<li role='presentation'><a role='menuitem' tabindex='-1' href='profile.php'>Profile</a></li>
						<li role='presentation'><a role='menuitem' tabindex='-1' href='logout.php'>logout</a></li>  
					  </ul>
					</li>
				 </ul>
				 */
		
		
		//nav-bar//
		echo "
		<div class='navbar navbar-inverse navbar-fixed-top' >
        <div class='navbar-inner' style='background:#45a6cc;border-color:#45a6cc;'>
            <div class='container' style='background:#45a6cc;border-color:#45a6cc;'>
                <a class='brand' href='#' style='color:white;'>Posts</a>
                <ul class='nav nav-pills pull-right'>
					<li class='dropdown all-camera-dropdown' >
						   <a class='dropdown-toggle'  style='color:white' data-toggle='dropdown' href='#'>
							".$_SESSION['name']."
							   <b class='caret'></b>
						   </a>
					<ul class='dropdown-menu'>
						<li role='presentation'><a role='menuitem' tabindex='-1' href='profile.php' >Profile</a></li>
						<li role='presentation'><a role='menuitem' tabindex='-1' href='logout.php'>logout</a></li>  
					</ul>
				</li></ul>
            </div>
		</div>
		</div>
		";
		//po文的地方//
		echo "
		
		<div class='container'>
			<form name='form_content' method='post' action='posts.php' class='container_1 form-horizontal'>
				<div class='control-group'>
					<textarea class='form-control' rows='3' style='width:500px;' name='content'></textarea>
				</div>
				<div class='control-group'>
					<input type='submit' class='btn btn-primary' name='submit' value='送出' />
				</div>
				<hr/>
			</form>
			
		</div>
		";
		//----po文的地方----end//
		
		//---------------------------View----------------------------------------//
		
		if(isset($_POST['submit'])){
		
		$content = $_POST['content'];
		$name=$_SESSION['name'];
		//echo $_POST['content']."----------";
		//----insert to database (table is content)----//
		
		if($_POST['content']!=null)
		{
		$sql = "INSERT INTO content(name,content) VALUES ('".$name."','".$content."')";
		$result = mysql_query($sql);
		//echo $_POST['content'];
		//$row = @mysql_fetch_row($result);
		}
		else if($_POST['content']==null)
		{
			echo "<script>content_null();</script> ";
		}

		}
		//----insert to database (table is content)----end//
		$count="SELECT COUNT(*) FROM content";
		$result_count = mysql_query($count);
		$row_count = @mysql_fetch_row($result_count);
		
		$show = "select * from content order by time desc";
		
		$result_show = mysql_query($show);
		//while(mysql_fetch_assoc($result_show))
		//$row = @mysql_fetch_row($result_show);
		while($row_show=mysql_fetch_assoc($result_show)){
		//print_r (mysql_fetch_array($row,MYSQL_ASSOC));
		
		
		echo "
		<div class='row-fluid' style='margin-top: -85px;'>
			<div class='span8 offset2'>
				<span style='background-color:#eee;'>
				<h3>";
				print_r ($row_show['name']);
				echo "</h3>";
					echo "
					<div class='accordion' id='accordion2'>
					  <div class='accordion-group' style='border-color: #58D3F7;'>
						<div class='accordion-heading' >
						  <a class='accordion-toggle' style='text-decoration:none;font-size: 24px;' data-toggle='collapse' data-parent='#accordion2' href='#".$row_show['id']."'>
							<li class='pull-right'>";
							if($_SESSION['name']==$row_show['name']){
							echo"
								<a style='text-decoration:none;' href='posts.php?edit_id=".$row_show['id']."' ><i class='icon-pencil '></i>Edit</a>&nbsp;&nbsp;|&nbsp;
								<a style='text-decoration:none;' href='posts.php?delete_id=".$row_show['id']."'><i class='icon-trash '></i>Delete</a>&nbsp;&nbsp;
								";
							}
							echo"</li>";
							echo"<li style='list-style-type: none;'><a class='accordion-toggle pull-right' style='padding:15px;text-decoration:none;' data-toggle='collapse' data-parent='#accordion2' href='#".$row_show['id']."'><i class='icon-minus'></i>縮放</a></li>";
							
							if(isset($_GET['delete_id'])!=NULL){
								$delete=$_GET['delete_id'];
								$sql_delete_c="delete from content where id='".$delete."'";
								$sql_delete_m="delete from message where id_content='".$delete."'";
								if(mysql_query($sql_delete_c)&&mysql_query($sql_delete_m))
								{
								echo "ok";
								echo "<meta http-equiv=REFRESH CONTENT=0;url=posts.php>";
								}
							
							}
							
							
							
							echo"<ul class='nav' style='margin-left:10px;'>";
							//==============edit===================//
							
							if(  $row_show['id']==$_GET['edit_id']&& isset($_GET['edit_id'])!=NULL)
							{
								echo"<li >";
								print_r ($row_show['content']);
								
								echo"
								<form  name='form_message' method='post' action='posts.php' class='form-horizontal'>
								  <input name='edit_content' type='text'>
								  <input type='submit' class='btn btn-success' name='".$row_show['id']."' value='Edit' />
								</form>
								
								";
								echo"</li>";
								
								
								
							
							}
							else if($row_show['id']!=$_GET['edit_id']){
							
								echo"<li style='text-decoration:none;font-size: 24px;color:#04c;'>";
								print_r ($row_show['content']);
								echo"</li>";
								
								
								
								
							}
							
							
							if(isset($_POST[$row_show['id']])!=null)
								{
								$edit_content=$_POST['edit_content'];
								//echo $edit_content;
								
									$sql_edit="update content set content='".$edit_content."' where id='".$row_show['id']."'";
									mysql_query($sql_edit);
									
									echo "<meta http-equiv=REFRESH CONTENT=0;url=posts.php>";
								}
								
								
								
								echo"
								<li style='color:#ccc;font-size:14px;'>";
								print_r ($row_show['time']);
								echo"
								</li>
								<ul class='nav'>
									
								</ul>
							</ul>
							
							
							
							
							
						  </a>
						  
						  <ul class='nav' style='margin-left:10px;'>
								<li>";
								if($row_show['count']==null)
								{
									$row_show['count']=0;
								}
								echo"
								<a name='count' type='submit' href='posts.php?count=".$row_show['count']."&id=".$row_show['id']."'><img src='icon_heart.png' style='height:25px;text-align:center;'>";
								
								
								if(isset($_GET["count"]))
								{
								$count=$_GET["count"]+1;
								$id=$_GET["id"];
								$update_count="update content set count='".$count."' where id='".$id."'";
									if(mysql_query($update_count))
									{
										echo " ";
										print_r ($row_show['count']);
										 echo '<meta http-equiv=REFRESH CONTENT=0;url=posts.php>';
									}
									else
									{
										echo " ";
										print_r ($row_show['count']);
									}
								}
								else
								{
									echo " ";
									print_r ($row_show['count']);
								}
								
								
										
								
								echo"
								</a>
								</li>
							</ul>";
						
						echo"
						</div>
						<div id='".$row_show['id']."' class='accordion-body collapse in'>
						  <div class='accordion-inner'>";
							$show_message="SELECT * FROM message where id_content='".$row_show['id']."' order by time_m ASC";
							$result_show_message = mysql_query($show_message);
							while($row_show_message=mysql_fetch_assoc($result_show_message)){
								echo "
								<div>
									<span style='font-size: 18px;color: #428bca;'>";
									print_r ($row_show_message['name']);
									echo "&nbsp;&nbsp;</span><span>";
									print_r ($row_show_message['message']);
								echo "
								 </span></br><span style='font-size: 14px;color: #ccc;' class='nav pull-right'>";
								 print_r ($row_show_message['time_m']);
								 echo"
								 </span>";
								 
								echo" 
								 <a style='text-decoration:none;' href='posts.php?count_m=".$row_show_message['count_message']."&id_m=".$row_show_message['id']."'><i class=\"icon-hand-up\"></i>like&nbsp;&nbsp;</span></a>";
								 
								if(isset($_GET['count_m']))
								{
									$count_m=$_GET['count_m']+1;
									$id_m=$_GET['id_m'];
									$update_m_c="update message set count_message='".$count_m."' where id='".$id_m."'";
									if(mysql_query($update_m_c))
									{
										
										print_r ($row_show_message['count_message']);
										 echo '<meta http-equiv=REFRESH CONTENT=0;url=posts.php>';
									}
									else
									{
										//echo " ";
										print_r ($row_show_message['count_message']);
										
									}
								}
								else
								{
									//echo " ";
									print_r ($row_show_message['count_message']);
									
								}
								echo"
								</div>
								<div class='hr'><hr/></div>";
							}
						echo"
						  </div>
						  <div class='input-append' style='margin-left:10px;'>
							<form  name='form_message' method='post' action='posts.php' class='form-horizontal'>
							  <input class='span8' id='appendedInputButton' name='message' type='text'>
							  <input type='submit' class='btn btn-info' name='m".$row_show['id']."' value='留言' />
							</form>";
							
							if(isset($_POST['m'.$row_show['id']])!=NULL)
							{
									$sql_message= "INSERT INTO message(name,message,count_message,id_content) VALUES ('".$_SESSION['name']."','".$_POST['message']."','0','".$row_show['id']."')";
									$result_m = mysql_query($sql_message);
									echo "<meta http-equiv=REFRESH CONTENT=0;url=posts.php>";
									
									
							}
						echo"
						  </div>
						</div>
					  </div>
					</div>
					";
				
				echo "
				</span>
				
			</div>
		</div>
		";
		
		
		
		
		
		
		
		
		};
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=0;url=index.php>';
}
?>

		


</body>
</html>