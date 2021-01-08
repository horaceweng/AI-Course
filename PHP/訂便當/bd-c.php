<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<div class="modal" tabindex="-1" role="dialog" id="CFMCG">
     <div class="modal-dialog" role="document"> 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">請重新確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> 
            </div>
            <div class="modal-body">
                                <p>您已經訂過了，是否確認修改</p> 
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
				<form action="bd-c.php" method="post">
				<button type="submit" class="btn btn-primary" name="CFMMDF">確認</button>
				</form>
            </div>
       </div>
   </div>
</div>

<script>
    function showModal() {
         $("#CFMCG").modal("show"); 
    }
</script>

<div class="modal" tabindex="-1" role="dialog" id="NEW">
     <div class="modal-dialog" role="document"> 
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">訂購成功</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button> 
            </div>
            <div class="modal-body">
                                <p>您已經成功訂了便當</p> 
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
            </div>
       </div>
   </div>
</div>

<script>
    function showModal2() {
         $("#NEW").modal("show"); 
    }
</script>
<?php
//第三層，下拉式選單選擇人名

function exec_SELECT_htmlcode($ary_name, $acnt_id)
{
	$today = date("Y/m/d");
	$n0 = '請選擇';
	$TMP = '<HTML>
			  <BODY>
				<FORM action="bd-c.php?rn='.$acnt_id.'" method="post">
				<input type="text" name="today" value="'.$today.'"readonly="true">
				<SELECT name="SELECT_BD">
					<OPTION value="'.$n0.'">'.$n0.' </OPTION>
					<OPTION value="'.$ary_name[0].'">'.$ary_name[0].' </OPTION>
					<OPTION value="'.$ary_name[1].'">'.$ary_name[1].' </OPTION>
				</SELECT>
				<INPUT type="SUBMIT" value="確定"/>
				</FORM>
			  </BODY>
           </HTML>'  ;
    define('SELECT_htmlcode', $TMP);
	
	echo "請選擇：".SELECT_htmlcode;
}	
?>

<?php
function cfm_registered($connect, $acnt_id, $bd_item, $today)
{
	//$sql_chk_cmd = 'SELECT * FROM t_bd WHERE cdate='.$today.' AND uname="'.$acnt_id.'"';
	$sql_chk_cmd = "SELECT * FROM t_bd WHERE cdate = '".$today."' AND uname='".$acnt_id."' AND tag=1";
	$getData = $connect->query($sql_chk_cmd);

	if ($getData->num_rows > 0) {
		popup_cfm_window();		
	}
	else {
	$sql_insert_cmd = "INSERT INTO t_bd (id, cdate, uname, bdtype, tag) VALUES (NULL, '".$today."', '".$acnt_id."', '".$bd_item."', 1)";
	//echo $sql_cmd;
	if ($connect->query($sql_insert_cmd) == TRUE) {
		show_new_window();
	  } else {
		echo "Error: " . $sql_cmd . "<br>" . $connect->error;
	  }
	}
}

function popup_cfm_window()
{
	echo "<script>";
	echo "showModal()";
	echo "</script>";
}
function show_new_window()
{
	echo "<script>";
	echo "showModal2()";
	echo "</script>";
}
function display_register_status($connect, $today)
{	
	// 查詢第一筆資料
	$sql_cmd = "SELECT * FROM t_bd WHERE cdate = '".$today."' AND tag=1";
	$getData = $connect->query($sql_cmd);
	$result = array();
	$i = 0;
	if ($getData->num_rows > 0) {
		while ($row = $getData->fetch_assoc()) {
			$result[$i][0] = $row['cdate'];
			$result[$i][1] = $row['uname'];
			$result[$i][2] = $row['bdtype'];
			$i = $i + 1;
		}
	}
	$bdtype1 = 0;
	$bdtype2 = 0;
	//display here:
	$trtd_code="";
	$rcount = count($result);
	for ($i=0; $i<$rcount; $i++)
	{
		$trtd_code .= '<tr>';
		for ($j=0; $j<3; $j++)
		{
			$trtd_code .= '<td>'.$result[$i][$j].'</td>';
		}
		$trtd_code .= '</tr>';
		$result[$i][2]=="葷"?$bdtype1++:$bdtype2++;
	}
	$html_display_code = '
	<!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

	<h3>'.$today.'便當訂購情形</h3>
	<table class="table table-bordered">
	  <thead>
		 <tr>
			 <th> 日期 </th>
			 <th> 姓名 </th>
			 <th> 便當類別 </th>
		 </tr> 
	  </thead>
	  <tbody>
		  '.$trtd_code.'
	  </tbody>
	</table>';
	// display above

	echo $html_display_code;
	echo "<h3>";
	echo "今日便當【葷】：".$bdtype1."<BR>";
	echo "今日便當【素】：".$bdtype2."<BR>";
	echo "今日便當 總共 ：",$bdtype1+$bdtype2;
	echo "</h3>";
}

function getBDcookie()
{
	return $_COOKIE[COOKIE_NAME];
}
function setBDitemcookie($bdtype)
{
	ob_start();
	setcookie(COOKIE_BDITEM, $bdtype);
	ob_end_flush();
}
function getBDitemcookie()
{
	return $_COOKIE[COOKIE_BDITEM];
}
function setRTNcookie()
{
	ob_start();
	setcookie(COOKIE_RTN, 1);
	ob_end_flush();
}
function return_main_page()
{
	include "bd-b.php";
	header('Location:bd-b.php'); 
}
?>

<?php

include "bd-dblink.php";
include "bd_cookie.php";

$acnt_id = getBDcookie();
$today = date("Y-m-d");
$bd_type = ['葷','素'];

if (isset($_POST['INQUIRY'])){
	display_register_status($connect, $today);
	setRTNcookie();
}
else {
	if (isset($_POST['CFMMDF'])) {
		$bd_item = getBDitemcookie();
		//先修改資料庫，再寫入資料庫，並返回
		$sql_modify_cmd = "UPDATE t_bd SET tag=0 WHERE cdate='".$today."' AND uname='".$acnt_id."' AND tag=1";

		//echo $sql_cmd;
		if ($connect->query($sql_modify_cmd) == TRUE) {
			echo "<BR>";
			echo $acnt_id." 成功修改了便當 [".$bd_item."]";
		} else {
			echo "Error: " . $sql_modify_cmd . "<br>" . $connect->error;
		}
		$sql_insert_cmd = "INSERT INTO t_bd (id, cdate, uname, bdtype, tag) VALUES (NULL, '".$today."', '".$acnt_id."', '".$bd_item."', 1)";
		//echo $sql_cmd;
		if ($connect->query($sql_insert_cmd) == TRUE) {
			echo "<BR>";
			echo $acnt_id." 成功修改並訂了便當 [".$bd_item."]";
		} else {
			echo "Error: " . $sql_cmd . "<br>" . $connect->error;
		}
		//返回
		return_main_page();
	}

	if (isset($_POST['SELECT_BD']))
	{
		$select_bd = $_POST['SELECT_BD'];
		$i=0;
		$found = FALSE;
		
		foreach ($bd_type as $n) {
			if ($select_bd == $n) {
				$index = $i;
				$found = TRUE;
			}
			$i = $i+1;
		}
		if ($found) {
			// display_indiv_score($index, $ary_name[$index], $Scores); 原始的code
			// 兩個動作 1. Show出結果，2. 寫入資料庫 $acnt_id, $ary_name[$index], $today
			$today = date('Y/m/d');
			setBDitemcookie($bd_type[$index]);
			cfm_registered($connect, $acnt_id, $bd_type[$index], $today);
			//set cookie for return page
			setRTNcookie();
		}
	}
	exec_SELECT_htmlcode($bd_type,$acnt_id);
}
//set cookie for return page

//setRTNcookie();

?>
<!-- 回上一層選單按鈕 -->
<?php
$RTN_code = '<FORM action=bd-b.php method="post">
<hr />
<BR>
<INPUT type="SUBMIT" value="返回"/>
</FORM>';
echo $RTN_code;
?>