<?php
function SumTo($count)
{
	$Total = 0;
	for ($i=1; $i<=$count; $i++)
		$Total = $Total + $i;
	
	return $Total;
}

function resume_counting ()
{
	$TMP = '<HTML><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <BODY>
	   <FORM action="2-13b.php" method="post">
	    [ 數字累加 v2.13a ]

		<hr />
		<BR>
		累加至 :
		<INPUT name="COUNTTO" type="TEXT" />
	    
		<INPUT type="SUBMIT" value="確認"/>
		<BR>

	   </FORM>
	</BODY>
</HTML>'  ;
    define('HTML_resume', $TMP);
	
	echo HTML_resume;
}
?>

<?php
$CountTo = $_POST['COUNTTO'];
resume_counting();
echo '結果：'.SumTo($CountTo);
?>