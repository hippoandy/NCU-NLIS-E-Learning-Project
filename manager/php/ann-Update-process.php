<?php
    include("connection.php"); 
    //設定編碼，避免中文字出現亂碼
    mysql_query("set names 'utf8'");
	$title = htmlspecialchars($_POST['title']);
	$context = htmlspecialchars($_POST['context']);
	$postID =$_POST['postID'];
	$sql = "UPDATE bulletin SET context = '$context', title = '$title' WHERE postID='$postID'";
	$error = mysql_error();
	if ( mysql_query($sql) ) {
		 $Message="公告更新成功";
		
	}
	else {
		 $Message = "考題更新失敗。錯誤訊息:".$error;
	}	
	echo '<script type="text/javascript">alert("'.$Message.'");</script>';
	echo "<meta http-equiv=REFRESH CONTENT=0;url=../ann-View.php>";
	?>