<!-- 第二層，查詢個人成績或是全體成績  -->
<?php
function print_error_msg ($msg)
{
	$TMP = '<HTML>
			  <BODY>
				<FORM action="3-2a.php" method="post">
				<INPUT type="SUBMIT" value="back"/>
				</FORM>
			  </BODY>
           </HTML>'  ;
    define('HTML_BACKCODE', $TMP);
	
	echo $msg; 
	echo HTML_BACKCODE;
}

function exec_Menu_Code(){
$Menu_htmlcode = '
<HTML><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <BODY>
	   <FORM action="3-2c.php" method="post">
	    [ 就是厲害 - 成績管理系統 v3.2a ]
		<!-- <p>hr 標簽定義水平線：</p> -->
		<hr />
	    <BR>
		<INPUT type="SUBMIT" name="INDIV" value="查詢個人成績與平均"/>
		<BR>
		<INPUT type="SUBMIT" name="WHOLE" value="查詢總分數與總平均"/>
	   </FORM>
	</BODY>
</HTML>';

echo $Menu_htmlcode;
}
?>

<?php
function Authenticate($uname,$pwd)
{
	global $Name;
	global $Password;

	$userIndex = -1;
	$userCount = count($Name);

	for ($i=0; $i<$userCount; $i++) {
		if ($uname == $Name[$i]) {
			$userIndex = $i;
			break;
		}
	}
	if ($userIndex != -1) {
		if ($pwd == $Password[$userIndex]){
			// 進入第二層選單
			// exec_HTML_Code();
			return 0;
		}
		else 
			// 密碼錯誤
			//print_error_msg( "密碼錯誤" );
			return 2;
	} else
		// 帳號錯誤
		// print_error_msg( "帳號錯誤" );
		return 1;
}
?>

<?php
//判斷是否從第三頁返回
$Work_PHP = '3-2c.php';
if (strpos($_SERVER['HTTP_REFERER'], $Work_PHP) && isset($_GET['rn']) && $_GET['rn'] == 'ooxx') //用GET的方式取得後續的參數
	exec_Menu_Code();
else
{
	$Name = array("apollo","vickey","pig");
	$Password = array("123","456","789");
	$Error = array("帳號錯誤","密碼錯誤");

	if ( isset( $_POST['MY_NAME'] ) )
		$login_name = $_POST['MY_NAME'];
	else
		$login_name = "";

	if ( isset( $_POST['MY_PASSWD'] ) )
		$login_Password = $_POST['MY_PASSWD'];
	else
		$login_Password = "";

	$check = Authenticate($login_name, $login_Password);

	if ( $check == 0 )
		exec_Menu_Code();
	else
		print_error_msg( $Error[$check-1] );
}
?>
