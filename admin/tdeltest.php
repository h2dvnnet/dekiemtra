<?php
require_once("../config.php");
require_once("../function.php");
ob_start();
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$_SESSION["admin"] = $_COOKIE["admin"];
if ($_SESSION["admin"] != 1)
{
header("refresh: 0; url=/admin.php" );
}
require_once("header.php");
echo "<script>
document.getElementById('x7').setAttribute('class', 'active');
</script>";
echo "
                    	<li><a href='ttestlist.php'>Danh sách trắc nghiệm</a></li>
                    	<li><a href='tposttest.php'>Đăng đề trắc nghiệm</a></li>
						<li><a href='ttesthistory.php'>Kết quả trắc nghiệm</a></li>
                    </ul>
                </div>                
				<h2><a href='#'>Bảng điều khiển chính</a> &raquo; <a href='#' class='active'>Xóa đề trắc nghiệm</a></h2>
                <div id='main'>";
if(isset($_POST["tdeltest"]))
{
tdeltest();
}
				echo "<br/>";
if ($_GET['id'] != NULL)
{
$sql1="SELECT * FROM `ques_parts` where `it`='".$_GET[id]."'";
$query1=@mysql_query($sql1);
$record1=@mysql_num_rows($query1);
	if ($record1 != NULL)
		{
		echo"
				<form action='' class='jNice' method='post'>
				<fieldset>
				<p>Bạn có chắc chắn muốn xóa đề trắc nghiệm này?</p>
				<input name='id' type='hidden' value='".$_GET[id]."' />
				<input name='tdeltest' type='submit' value='Xóa' />
				</fieldset>
				</form>";
		}
		else { echo "Có lỗi"; }
} 
else { echo "Có lỗi"; }
require_once("footer.php");
?>