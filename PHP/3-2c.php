<?php
//第三層，下拉式選單選擇人名

function exec_SELECT_htmlcode($n1, $n2, $n3)
{
	$n0 = '請選擇';
	$TMP = '<HTML>
			  <BODY>
				<FORM action="3-2c.php" method="post">
				<SELECT name="SELECT_NAME">
					<OPTION value="'.$n0.'">'.$n0.' </OPTION>
					<OPTION value="'.$n1.'">'.$n1.' </OPTION>
					<OPTION value="'.$n2.'">'.$n2.' </OPTION>
					<OPTION value="'.$n3.'">'.$n3.' </OPTION>
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
function total_score($score1, $score2, $score3)
{
	return ($score1 + $score2 + $score3);
}

function display_indiv_score($i, $name, $Scores)
{
	echo "<hr />";
	echo $name.'的分數：'.'<br>';
	echo "國文： ", $Scores[0][$i];
	echo  "<BR>";
	echo "英文： ", $Scores[1][$i];
	echo  "<BR>";
	echo "數學： ", $Scores[2][$i];
	echo  "<BR>";
	echo "總分： ", $TS=total_score($Scores[0][$i],$Scores[1][$i],$Scores[2][$i]);
	echo  "<BR>";
	echo "平均： ", $TS / 3;
	echo  "<BR>";
	
}
function display_whole_score($Scores) //所有人的各科平均
{
	echo "<hr />";
	echo '全體成績：<br>';
	echo "國文平均： ", total_score($Scores[0][0],$Scores[0][1],$Scores[0][2])/3;
	echo  "<BR>";
	echo "英文平均： ", total_score($Scores[1][0],$Scores[1][1],$Scores[1][2])/3;
	echo  "<BR>";
	echo "數學平均： ", total_score($Scores[2][0],$Scores[2][1],$Scores[2][2])/3;
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
$Score1 = array(99, 98, 97); //國文分數
$Score2 = array(89, 88, 87); //英文分數
$Score3 = array(79, 78, 77); //數學分數
$Scores = array(array(99, 98, 97),array(89, 88, 87),array(79, 78, 77));
$Name = array("apollo","vickey","pig");

exec_SELECT_htmlcode($Name[0], $Name[1], $Name[2]);
if (isset($_POST['SELECT_NAME']))
{
	$select_name = $_POST['SELECT_NAME'];
	$i=0;
	$found = FALSE;
	foreach ($Name as $n) {
		if ($select_name == $n) {
			$index = $i;
			$found = TRUE;
		}
		$i = $i+1;
	}
	if ($found) display_indiv_score($index, $Name[$index], $Scores);
}
if (isset($_POST['WHOLE'])){
	display_whole_score($Scores);
}
?>
<!-- 回上一層選單按鈕 -->

<FORM action="3-2b.php?rn=ooxx" method="post">
<hr />
<BR>
<INPUT type="SUBMIT" value="回主選單"/>
</FORM>