<?php session_start(); ?>
<?php 
	require 'php/permission.php';
	include( "php/connection.php" );
	//設定編碼，避免中文字出現亂碼
	mysql_query( "set names 'utf8'" );
?>
<?php
	$subject = $_POST['subject'];
	$type = $_POST['type'];
	$chapter = $_POST['chapter'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include '../objects/head-meta.php'; ?>
<?php include '../objects/head-link-sub.php'; ?>
</head>
<body>
	<div class="page-header">
		<h2 class="text-primary">修改考題 <small>請依欄位填入規定之資料</small></h2>
	</div>
	<form id="formEdit" class="form-horizontal" action="php/exam-Update-process.php" method="post">
		<?php    
			$numberArray = $_POST['number']; //儲存number陣列至$numberArray
			$qCount = 1; //紀錄修改題數
			foreach ($numberArray as $number) {
				$number = (int)($number);
				$sql = "SELECT context, A1, A2, A3, A4, answer, point FROM questionBase WHERE subject = '$subject' AND chapter = '$chapter' AND type = '$type' AND number = '$number'";
				$result = mysql_query($sql);
				$row = mysql_fetch_row($result);
				// echo $row[0].",".$row[1].",".$row[2].",".$row[3].",".$row[4].",".$row[5].",".$row[6];
				echo "<div>";
				echo "<h3>第".$number."題</h3>";
				echo "<input name=\"q".$qCount."\" type=\"hidden\" value=\"".$number."\" />";
				echo "<label for=\"q".$number."-textarea\" class=\"col-md-2 control-label\">題目敘述：</label>";
				echo "<div class=\"col-md-10\">";
				echo "<textarea id=\"q".$number."-textarea\" class=\"form-control\" name=\"q".$qCount."Descript\" form=\"formEdit\" required=\"required\" >".$row[5]."</textarea>";
				echo "<span class=\"help-block\">輸入題目敘述，可包含html tag</span></div>";
				echo "<label for=\"q".$number."-1option\" class=\"col-md-2 control-label\">答案選項一：</label>";
				echo "<div class=\"col-md-10\">";
				echo "<input id=\"q".$number."-1option\" class=\"form-control\" name=\"q".$qCount."-1\" type=\"text\" required=\"required\" value=\"".$row[6]."\" /></div>";
				echo "<label for=\"q".$number."-2option\" class=\"col-md-2 control-label\">答案選項二：</label>";
				echo "<div class=\"col-md-10\">";
				echo "<input id=\"q".$number."-2option\" class=\"form-control\" name=\"q".$qCount."-2\" type=\"text\" required=\"required\" value=\"".$row[7]."\" /></div>";
				echo "<label for=\"q".$number."-3option\" class=\"col-md-2 control-label\">答案選項三：</label>";
				echo "<div class=\"col-md-10\">";
				echo "<input id=\"q".$number."-3option\" class=\"form-control\" name=\"q".$qCount."-3\" type=\"text\" required=\"required\" value=\"".$row[8]."\" /></div>";
				echo "<label for=\"q".$number."-4option\" class=\"col-md-2 control-label\">答案選項四：</label>";
				echo "<div class=\"col-md-10\">";
				echo "<input id=\"q".$number."-4option\" class=\"form-control\" name=\"q".$qCount."-4\" type=\"text\" required=\"required\" value=\"".$row[9]."\" /></div>";
				echo "<label for=\"q".$number."Ans\" class=\"col-md-2 control-label\">正確答案：</label>";
				echo "<div class=\"col-md-10\">";
				echo "<select id=\"q".$number."Ans\" class=\"form-control\" name=\"q".$qCount."Ans\" form=\"formEdit\" required=\"required\">";
				//印出答案的四個選項，並預設已選選項為原先的答案
				for( $c=1; $c <= 4; $c++ )
				{
					if ( $c == $row[ 10 ] )
						echo "<option value=\"".$c."\" selected >".$c."</option>";
					else
						echo "<option value=\"".$c."\" >".$c."</option>";
				}
				echo "</select></div>";
				echo "<label for=\"q1Point\" class=\"col-md-2 control-label\">本題配分：</label>";
				echo "<div class=\"col-md-10\">";
				echo "<input id=\"q".$number."Point\" class=\"form-control\" name=\"q".$qCount."Point\" type=\"text\" required=\"required\" value=\"".$row[ 11 ]."\" placeholder=\"輸入數字\" />";
				echo "<span class=\"help-block\">請輸入純數字。</span></div>";
				echo "</div>";
				//修改題數+1
				$qCount++;
			}
		?>
			
		<div>
			<input class="btn btn-default" type="submit" value="送出更新資料" />
			<button class="btn btn-sucess" type="button" onclick="javascript:location.href='exam-View.php'" >取消更新</button>
			<input type="hidden" name="subject" value="<?php echo $subject; ?>" />
			<input type="hidden" name="chapter" value="<?php echo $chapter ?>" />
			<input type="hidden" name="type" value="<?php echo $type; ?>" />
		</div>						
	</form>	
</body>
</html>