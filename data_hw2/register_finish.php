<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

//連結資料庫//
//$link = mysql_connect('mysql.cs.ccu.edu.tw:3306', 'pcc102m', 'kelly791126'); 
$link = mysql_connect('localhost:3306', 's602410023', 's602410023'); 
if (!$link) { 
 die('Could not connect: ' . mysql_error()); 
} 
//mysql_select_db("pcc102m_rss", $link);
mysql_select_db("s602410023", $link);
//連結資料庫//



$name = $_POST['name'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$email = $_POST['email'];



//判斷帳號密碼是否為空值
//確認密碼輸入的正確性
if($name != null && $pw != null && $pw2 != null && $pw == $pw2)
{echo $name;


        //新增資料進資料庫語法
        $sql = "INSERT INTO member(name,password,email) VALUES ('".$name."','".$pw."','".$email."')";
		//$sql="INSERT INTO member(name, password, email) VALUES ('123','456','789')";

        if(mysql_query($sql))
        {
                echo '註冊成功!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=posts.php>';
        }
        else
        {
		
               echo '註冊失敗，請重新註冊!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=register.php>';
        }
}

mysql_close($link);
?>