<?php
$host = '127.0.0.1:8889';
$user = 'root';
$passwd = 'root';
$database = "AI05";


$connect = new mysqli($host, $user, $passwd, $database);

if ($connect->connect_error)
	die('連線失敗： '.$connect->connect_error);
//else {
//	echo '連線成功<BR>';
//}
?>
<?php
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
?>


<?php
//<!-- 新增 -->
/*
$connect->query("SET NAMES 'utf8'");
$doSQL = "INSERT INTO base (name, score, tag) VALUES ('elsa', 70, 1)";
$status = $connect->query($doSQL);

echo ($status? '新增成功': '錯誤: '.$doSQL.'<BR>'.$connect->error);
*/

//<!-- 刪除 -->
/*
$connect->query("SET NAMES 'utf8'");
$doSQL = "DELETE FROM base WHERE name = 'pig'";
$status = $connect->query($doSQL);

echo ($status? '刪除成功': '錯誤: '.$doSQL.'<BR>'.$connect->error);
*/
//<!-- 更新 -->
/*
$connect->query("SET NAMES 'utf8'");
$doSQL = "UPDATE base SET score = 66 WHERE name = 'pig'";
$status = $connect->query($doSQL);

echo ($status? '更新成功': '錯誤: '.$doSQL.'<BR>'.$connect->error);
*/

//<!-- 查詢 -->
/*
$connect->query("SET NAMES 'utf8'");
$doSQL = "SELECT * FROM base WHERE tag = 1";
$getData = $connect->query($doSQL);

if ($getData->num_rows > 0) {
	while ($row = $getData->fetch_assoc())
		echo "id: ".$row['id']."<BR>name: ".$row['name']."<BR>score: ".$row['score']."<BR>";
}
*/
?>

