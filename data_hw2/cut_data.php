<?php 

$upload_file = fopen("file/you_10.txt", "r");

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
//輸出文本中所有的行，直到文件結束為止。
while(! feof($upload_file))
  {


$contents = fgets($upload_file);
  //echo $contents. "<br />";
//$data=explode("@", fgets($file));
	
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

?>