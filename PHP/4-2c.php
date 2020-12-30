<?php
//第三層，下拉式選單選擇人名

function exec_SELECT_htmlcode($ary_name)
{
	$n0 = '請選擇';
	$TMP = '<HTML>
			  <BODY>
				<FORM action="4-2c.php" method="post">
				<SELECT name="SELECT_NAME">
					<OPTION value="'.$n0.'">'.$n0.' </OPTION>
					<OPTION value="'.$ary_name[0].'">'.$ary_name[0].' </OPTION>
					<OPTION value="'.$ary_name[1].'">'.$ary_name[1].' </OPTION>
					<OPTION value="'.$ary_name[2].'">'.$ary_name[2].' </OPTION>
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
function total_score($ary_score)
{
	$sum = 0;
	foreach ($ary_score as $score)
		$sum = $sum + $score;
	return($sum);
}

function display_indiv_score($i, $name, $Scores)
{
	echo "<hr />";
	echo $name.'的分數：'.'<br>';
	echo "國文： ", $Scores[$i]['cscore'];
	echo  "<BR>";
	echo "英文： ", $Scores[$i]['escore'];
	echo  "<BR>";
	echo "數學： ", $Scores[$i]['mscore'];
	echo  "<BR>";
	echo "總分： ", $TS=total_score($Scores[$i]);
	echo  "<BR>";
	echo "平均： ", $TS / 3;
	echo  "<BR>";
	
}
function display_whole_score($Scores) //所有人的各科平均
{
	echo "<hr />";
	echo '全體成績：<br>';
	echo "國文平均： ", total_score(array_column($Scores, 'cscore'))/3;
	echo  "<BR>";
	echo "英文平均： ", total_score(array_column($Scores, 'escore'))/3;
	echo  "<BR>";
	echo "數學平均： ", total_score(array_column($Scores, 'mscore'))/3;
	echo  "<BR>";
}

/*
function score2($i)
{
	global $Score1;
	global $Score2;
	global $Score3;
	
	
	return $Score1[$i]+$Score2[$i]+$Score3[$i];
}

function display_score2($i)
{
	global $Score1;
	global $Score2;
	global $Score3;
	
	echo "國文： ", $Score1[$i]. "<BR>";
	echo "英文： ", $Score2[$i];
	echo  "<BR>";
	echo "數學： ", $Score3[$i];
	echo  "<BR>";
	echo "總分： ", $TS=score2($i);
	echo  "<BR>";
	echo "平均： ", $TS / 3;
	echo  "<BR>";
	
}
*/
?>

<?php
/*
function get_account($connect)
{
	
	$connect->query("SET NAMES 'utf8'");
	$doSQL = "SELECT * FROM t_accnt WHERE tag = 1";
	$getData = $connect->query($doSQL);

	$acnt = array();
	$i = 0;
	if ($getData->num_rows > 0) {
		while ($row = $getData->fetch_assoc()) {
			$acnt[$i]['uname'] = $row['uname'];
			$acnt[$i]['passwd'] = $row['passwd'];
			$i = $i + 1;
		}
	}
	return($acnt);
}
*/
function get_Scores($connect)
{
	$connect->query("SET NAMES 'utf8'");
	$doSQL = "SELECT * FROM t_score WHERE tag = 1";
	$getData = $connect->query($doSQL);

	$scores = array();
	$i = 0;
	if ($getData->num_rows > 0) {
		while ($row = $getData->fetch_assoc()) {
			$scores[$i]['cscore'] = $row['cscore'];
			$scores[$i]['escore'] = $row['escore'];
			$scores[$i]['mscore'] = $row['mscore'];
			$i = $i + 1;
		}
	}
	return($scores);
}
?>

<?php
//global $accnt;
include "4-2.php";
/*
$Score1 = array(99, 98, 97); //國文分數
$Score2 = array(89, 88, 87); //英文分數
$Score3 = array(79, 78, 77); //數學分數
$Scores = array(array(99, 98, 97),array(89, 88, 87),array(79, 78, 77));
$Name = array("apollo","vickey","pig");
*/

$accnt = get_account($connect);
$Scores = get_Scores($connect);

$ary_name=array_column($accnt, 'uname');

exec_SELECT_htmlcode($ary_name);
if (isset($_POST['SELECT_NAME']))
{
	$select_name = $_POST['SELECT_NAME'];
	$i=0;
	$found = FALSE;
	
	foreach ($ary_name as $n) {
		if ($select_name == $n) {
			$index = $i;
			$found = TRUE;
		}
		$i = $i+1;
	}
	if ($found) {
		display_indiv_score($index, $ary_name[$index], $Scores);
	}
}
if (isset($_POST['WHOLE'])){
	display_whole_score($Scores);
}
?>
<!-- 回上一層選單按鈕 -->

<FORM action="4-2b.php?rn=ooxx" method="post">
<hr />
<BR>
<INPUT type="SUBMIT" value="回主選單"/>
</FORM>