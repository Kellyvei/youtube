<?php session_start();?>
<html>
<head>
<title>jQuery add / remove textbox example</title>
 

 
<!--�W��y�k���ҥ�session�A���y�k�n��b�����̫e��-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">


<!-- jQuery���C?���bbootstrap.min.js ���e�ޤJ -->
<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>

<!-- �̷s�� Bootstrap �֤� JavaScript ��� -->
<script src="js/bootstrap.min.js"></script>

</head>

 
<body>
  <script type="text/javascript">
 
$(document).ready(function(){
 
    var counter = 2;
 
    $("#addButton").click(function () {
 
	if(counter>11){
            alert("Only 11 textboxes allow");
            return false;
	}   
	
	

 
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
 
	newTextBoxDiv.after().html(counter+'.	Field name  :' +
	      '<input type="text" name="textbox' + counter + 
	      '" id="textbox' + counter + '" value="" >'+'Type  : ' +
	      '<input type="text" name="type' + counter + 
	      '" id="type' + counter + '" value="" >');
	
 
	newTextBoxDiv.appendTo("#TextBoxesGroup");
 
 
	counter++;
     });
 
     $("#removeButton").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }   
 
	counter--;
 
        $("#TextBoxDiv" + counter).remove();
 
     });
 
     $("#getButtonValue").click(function () {
 
	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += $('#textbox' + i).val()+"\t"+$('#type' + i).val()+"\t";
	}
    	  //alert(msg);
		 
		  document.getElementById("getvalue").value=msg;
		   //document.getElementById("form_content").submit();
     });
	 
	 
 
	
	 
  });
</script>

 


 
	<div>
		<form name='form_content' method='post' action='hw2.php' >
			<label>Table Name<label><input type='text' name="table_name" value="youtube_data"></br>
			<input type='button' value='Add Field name' id='addButton'>
			<input type='button' value='Remove Field name' id='removeButton'>
			<input type='hidden' id='getvalue' name='field_info'>
			<input type='button' value='Save' name='save' id='getButtonValue'>
			<input type='submit' value='Show' name='send' id='send'>
		</form>
	</div>
	<div id='TextBoxesGroup'>
		<div id="TextBoxDiv1">
			1.	field name:<input type='text' id='textbox1' >Type: <input type='text' id='type1' >
		</div>
	</div>
	
	<!--	�W���ɮ�	-->
	<form method='post' action='hw2.php' enctype='multipart/form-data' >
		����ɮסG<input id='file' name='file' type='file'><br/>
		<input id='submit' name='upload' type='submit' value='upload'>
	</form>
	
	<!--	show_�W�Ǫ��ɮ�	-->
	<form method='post' action='hw2.php'  >
		<input id='submit' name='show_file' type='submit' value='�d��'>
	</form>
	
	<?php 
	
	//===�w�q�ܼ�
	$id="@id:";
		$published="@published:";
		$updated="@updated:";
		$title="@title:";
		$content="@content:";
		$author="@author:";
		$keyword="@keyword:";
		$favoriteCount="@favoriteCount:";
		$viewCount="@viewCount:";
		$duration="@duration:";
		$category="@category:";
		$src="@src:";
		$id_c="";
		$published_c="";
		$updated_c="";
		$title_c="";
		$content_c="";
		$author_c="";
		$keyword_c="";
		$favoriteCount_c="";
		$viewCount_c="";
		$duration_c="";
		$category_c="";
		$src_c="";
		$count =0 ;
		$incontent=0;
		$at="@";
		$state=0;
		$con="";
		$con_c="";
		$doc_id = 1; 
		$a=1;
	
		if(isset($_POST['send']))
		{
			$test=$_POST['send'];
			$field_info=$_POST['field_info'];
			//echo $field_info;
			$db_table=$_POST['table_name'];
			//$file_db="mydb.txt";
			//if (($fd = fopen($file_db, "a+")) !== false) { 
			
			//=====�N����T�s�Jtext
			if (($fd = fopen($db_table, "a+")) !== false) {
			  fwrite($fd,$field_info."\r\n");   
			  fclose($fd); 
			}
			
			//---show_field---//
			$filename = "test";
			$str = "";
			//�P�_�O�_�����ɮ�
			if(file_exists($db_table)){
				$file = fopen($db_table, "r");
				if($file != NULL){
					//���ɮץ������̫�@���A�j���~�����(fgets�@����@��)
					while (!feof($file)) {
						$str .= fgets($file);
					}
					fclose($file);
				}
			}
			//echo $str;
			$res="";
			$res=explode("\t",$str);
			//$res=explode("\n",$res);
			$count=count($res)/2;
			//print_r($res);
			//echo "count:"+count($res);
			
			echo"
					<table border='1'>
						<tr>
							<td>Field Name</td>
							<td>Type</td>
						</tr>";
			$j=0;			
			for($i=0;$i<$count-1;$i++)
			{
			
				echo"					
					<tr>
						<td>".$res[$i+$j]."</td>
						<td>".$res[$i+$j+1]."</td>
					</tr>
				";
				$j++;
			
			}
			echo"					
					</table>
				";
			
		}
		
		
		//===�W���ɮ�
		if(isset($_POST['upload'])){

			//$file= $_POST['file'];
			if($_FILES['file']['error']>0){
			  exit("�ɮפW�ǥ��ѡI");//�p�G�X�{���~�h����{��
			}
			else{
			$filename=$_FILES['file']['name'];
			$_SESSION['file']=$_FILES['file']['name'];
			@move_uploaded_file($_FILES['file']['tmp_name'],'file/'.$_FILES['file']['name']);//�ƻs�ɮ�
			echo '<script type="text/javascript">alert("�W�Ǧ��\!");</script>';
			
			//print_r ($filename);
			}
		}
		
		//===�ݤW�Ǫ��ɮ�
		if(isset($_POST['show_file'])){
		
		echo "ok!~~~".$_SESSION['file'];
		$upload_file = fopen("file/".$_SESSION['file'], "r");
		//$upload_file = fopen("file/you_11.txt", "r");
		//echo '<script type="text/javascript">alert("'.$_SESSION['file'].'");</script>';
		
		
		//��X�奻���Ҧ�����A�����󵲧�����C
		while(! feof($upload_file))
		  {
			//$contents = fgets($upload_file);
			
			if(stripos($contents,$id)!==false){
				$count ++;
				$id_f=explode("@id:",$contents);
				
				$id_c=$id_f[1];

				}

			elseif(stripos($contents,$published)!==false){
				$published_f=explode("@published:",$contents);
				$published_c=$published_f[1];
				}
			elseif(stripos($contents,$updated)!==false){
				$updated_f=explode("@updated:",$contents);
				$updated_c=$updated_f[1];
				}
			elseif(stripos($contents,$title)!==false){
				$title_f=explode("@title:",$contents);
				$title_c=$title_f[1];
				}
			elseif(stripos($contents,$content)!==false){
				$state=1;
				$content_c="";
				$content_f=explode("@content:",$contents);
				$content_c=$content_f[1];
			
				}
			elseif(stripos($contents,$at)===false&&$state=1){
				
				//$content_ff=explode("@content:",$contents);
				$content_c=$content_c.$contents;
			//echo $content_c.$con;
				}

			elseif(stripos($contents,$author)!==false){
			$state=0;
			//$con_c=$content_c.$con;
			//$con="";
				$author_f=explode("@author:",$contents);
				$author_c=$author_f[1];
				
				}
			elseif(stripos($contents,$keyword)!==false){
				$keyword_f=explode("@keyword:",$contents);
				$keyword_c=$keyword_f[1];
				}
			elseif(stripos($contents,$favoriteCount)!==false){
				$favoriteCount_f=explode("@favoriteCount:",$contents);
				$favoriteCount_c=$favoriteCount_f[1];
				}
			elseif(stripos($contents,$viewCount)!==false){
				$viewCount_f=explode("@viewCount:",$contents);
				$viewCount_c=$viewCount_f[1];
				}
			elseif(stripos($contents,$duration)!==false){
				$duration_f=explode("@duration:",$contents);
				$duration_c=$duration_f[1];
				}
			elseif(stripos($contents,$category)!==false){
				$category_f=explode("@category:",$contents);
				$category_c=$category_f[1];
				}
			elseif(stripos($contents,$src)!==false){
				$src_f=explode("@src:",$contents);
				$src_c=$src_f[1];

						 echo "===============".$a++."==============</br>";
						 echo  "id : ".$id_c;
						 echo "</br>";
						 echo "published" . $published_c;
						 echo "</br>";
						 echo"updated" . $updated_c;
						 echo "</br>";
						 echo"title" . $title_c;
						 echo "</br>";
						 echo"content" . $content_c;
						 echo "</br>";
						 echo"author" . $author_c;
						 echo "</br>";
						 echo"keyword" . $keyword_c;
						 echo "</br>";
						 echo"favoriteCount" . $favoriteCount_c;
						 echo "</br>";
						 echo"viewCount" . $viewCount_c;
						 echo "</br>";
						 echo"duration" .$duration_c;
						 echo "</br>";
						 echo"category".$category_c;
						 echo "</br>";
						 echo"src".$src_c;
						 echo "</br>";
				   
			
				
				}


		}

		fclose($upload_file);
		
		
		}
	
	?>
	

 
</body>
</html>