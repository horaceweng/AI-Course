<!-- 第二層，查詢個人成績或是全體成績  -->
<?php
function print_error_msg ($msg)
{
	$TMP = '<HTML>
			  <BODY>
				<FORM action="bd-a.php" method="post">
				<INPUT type="SUBMIT" value="back"/>
				</FORM>
			  </BODY>
           </HTML>'  ;
    define('HTML_BACKCODE', $TMP);
	
	echo $msg; 
	echo HTML_BACKCODE;
}

function exec_Menu_Code($acnt_id){
$Menu_htmlcode = '
<HTML><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<BODY>
	   <!-- 第一個 FORM 用來進入登記畫面 -->
	   <FORM action="bd-c.php?rn='.$acnt_id.'" method="post">
	    [ AI 05 就是厲害 - 便當登記系統 v1.0a ]
		<hr />
		Welcome, '.$acnt_id.'<BR>
	    <BR>
		<INPUT type="SUBMIT" name="REGISTER" value="便當登記"/>
	   </FORM>
	   <!-- 第二個 FORM 用來進入查詢畫面 -->
	   <FORM action="bd-c.php" method="post">
		<INPUT type="SUBMIT" name="INQUIRY" value="查詢該日登記"/>
	   </FORM>
	   </FORM>
	   <!-- 第三個 FORM 用來登出 -->
	   <FORM action="bd-a.php" method="post">
		<INPUT type="SUBMIT" name="logout" value="登出"/>
	   </FORM>
	</BODY>
</HTML>';

echo $Menu_htmlcode;
}
?>

<?php

function Authenticate($uname,$pwd)
{	
	//connect account database
	include "bd-dblink.php";
	
	//get account name & password
	global $accnt;
	$accnt = get_account($connect);

	$userIndex = -1;
	$userCount = count($accnt);

	for ($i=0; $i<$userCount; $i++) {
		if ($uname == $accnt[$i]['uname']) {
			$userIndex = $i;
			break;
		}
	}
	if ($userIndex != -1) {
		if ($pwd == $accnt[$userIndex]['passwd']){
			// 進入第二層選單
			// exec_HTML_Code();
			return 0;
		}
		else 
			// 密碼錯誤
			//print_error_msg( "密碼錯誤" );
			echo $pwd;
			echo "<BR>";
			echo $accnt[$userIndex]['passwd'];
			return 2;
	} else
		// 帳號錯誤
		// print_error_msg( "帳號錯誤" );
		return 1;
}
function setBDcookie($lname)
{
	ob_start();
	setcookie(COOKIE_NAME, $lname);
	ob_end_flush();
}

?>

<?php
//判斷是否從第三頁返回, 用get cookie的方式

include "bd_cookie.php";

$Work_PHP = 'bd-c.php';
if (strpos($_SERVER['HTTP_REFERER'], $Work_PHP) && isset($_COOKIE[COOKIE_RTN])) { //用GET cookie的方式判斷	
	exec_Menu_Code($_COOKIE[COOKIE_NAME]);
}
else
{
	$Error = array("帳號錯誤","密碼錯誤");

	if ( isset( $_POST['MY_NAME'] ) )
		$login_name = $_POST['MY_NAME'];
	else
		$login_name = "";

	if ( isset( $_POST['MY_PASSWD'] ) )
		$login_password = $_POST['MY_PASSWD'];
	else
		$login_password = "";

	$check = Authenticate($login_name, $login_password);
	
	if ( $check == 0 ) {
		//set cookie
		setBDcookie($login_name);
		exec_Menu_Code($login_name);
	} 
	else
		print_error_msg( $Error[$check-1] );
}
?>
