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


$name = $_SESSION['name'];
$pw = $_POST['pw'];
$pw2 = $_POST['pw2'];
$email = $_POST['email'];



//紅色字體為判斷密碼是否填寫正確
if($_SESSION['name']!= null && $pw != null && $pw2 != null && $pw == $pw2)
{
        //$name = $_SESSION['name'];
		//echo "--------".$pw."------".$name;
    
        //更新資料庫資料語法
        $sql = "UPDATE member SET password='".$pw."', email='".$email."' WHERE name='".$name."'";
		
        if(mysql_query($sql))
        {
                echo '修改成功，請重新登入!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
        }
        else
        {
		
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=profile.php>';
        }
		
		
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
mysql_close($link);
?>