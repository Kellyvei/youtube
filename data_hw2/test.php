<html>
<head>
<title>jQuery add / remove textbox example</title>
 
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>

 
</head>
 
<script language="JavaScript">

$("#g_check").click(function() {
   if ($("#g_check").attr("checked"))
	{
       $("#myimg").toggle();    

});

</script>
<body >
<input type="checkbox" id="g_check" name="g_check" />
<div id="myimg" style="display: none">
要顯示跟隱藏的內容!!
<ul>
	<li>1</li>
	<li>2</li>
</ul>
</div>
</body>
</html>