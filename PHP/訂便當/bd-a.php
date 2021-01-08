<?php
include "bd-dblink.php";

start_login_menu();

function start_login_menu()
{
	global $connect;
	global $accnt;

	$accnt = get_account($connect);
	$i = 0;
	$OptionStr = "";
	$ncount = count($accnt);

	if ( $ncount > 0)
	{
		for ($i=0; $i<$ncount; $i++)
		{
			$OptionStr .= '<OPTION value="'.$accnt[$i]['uname'].'" '.( isset( $_POST['MY_NAME'] ) && $_POST['MY_NAME'] == $accnt[$i]['uname'] ? "SELECTED" : "" ).'>'.$accnt[$i]['uname'].'</OPTION>';
		}
	}

	$login_menu_code = '
	<HTML><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<BODY>
		<img src = "tit.jpg"></img>
		<center>[ AI 05 就是厲害 - 便當登記系統 v1.0a ]</center>
		<hr />


	   <FORM action="bd-b.php" method="post">
		<center>
		<h3>使用者登入</h3>
		<div class="form-inline">
			帳號 : 
			<SELECT name="MY_NAME">'.$OptionStr.'</SELECT>
			密碼 : 
			<INPUT name="MY_PASSWD" type="PASSWORD" />
			<INPUT type="SUBMIT" value="確認"/>
		</div>
		</center>
	   </FORM>

	   <MARQUEE DIRECTION=LEFT >
			<b><FONT SIZE=5>一個便當55，葷素請記得點選</FONT></b>
			</MARQUEE><P>
			<center><img src = "tit1.jpg" ></img></center>
			
			<p align="center"><font color="#0080ff">圖片僅供參考，以實物為主</font></p>
	</BODY>
</HTML>';

echo $login_menu_code;
}
?>