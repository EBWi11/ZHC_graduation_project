<?php
session_start();
if(empty($_SESSION['USERNAME']))
{
header("Location:index.php");
}
$id=$_GET['id'];
$optimize=$_POST['optimize'];

if(isset($id))
{
  $db = mysqli_connect("localhost","root","","zhc");
  $sql="select * from Company where Cid= '".$id."';";
  $res=mysqli_query($db,$sql);
  $row = mysqli_fetch_array($res);
  $cid=$row['Cid'];
  $cname=$row['Cname'];
  $add_o=$row['add_o'];
}
if(isset($optimize))
{
  $time=date('Y-m-d H:i:s',time());
  $db = mysqli_connect("localhost","root","","zhc");
  $sql="update Company set add_o='" . $optimize. "',add_o_time='" . $time . "'  where Cid='" . $id. "';";
  $res=mysqli_query($db,$sql);
  header("Location:look_optimize.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>高耗能企业电力能效数据上报与管理系统－添加管理员</title>
	<meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../Semantic-UI-1.12.1/dist/semantic.css">
	<link rel="stylesheet" type="text/css" href="homepage.css">

	<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
  <script src="../Semantic-UI-1.12.1/dist/semantic.js"></script>
	<script src="homepage.js"></script>
</head>
<body>
  <div class="ui inverted masthead segment">
    <div class="ui page grid">
      <div class="column">
        <div class="ui inverted blue menu">
        </div>
        </div>
      </div>
    </div>
  </div>
  <div align="center">
  <h><?php echo $cname."公司" ?><h>
  </div>
<form name="modify_company" method="post"  onsubmit="return doCheck();" action="">
  <table  border="1" align="center" ceellpadding="30"style="margin-top:50px">
  <tr>
    <td>企业优化方案:</td>
    <td><textarea  rows="10" cols="83" name="optimize"  id="optimize"><?php echo $add_o; ?></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
      <input type="submit" name="submit" value="修改">
      <input type="reset" name="reset" value="重置"></td>
    </tr>
  </table>
</form>
</body>
</html>
