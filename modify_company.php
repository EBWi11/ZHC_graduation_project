<?php
session_start();
if(empty($_SESSION['USERNAME']))
{
header("Location:index.php");
}
if($_SESSION['US']!="1")
{
  header("Location:error.html");
}

$che_id = $_GET['id'];


$n_name=$_POST['Cname'];
$n_add=$_POST['Cadd'];
$n_tel=$_POST['Ctel'];
$n_word=$_POST['Cword'];


if(isset($che_id))
{
  $db = mysqli_connect("localhost","root","","zhc");
  $sql="select * from Company where Cid= '".$che_id."';";
  $res=mysqli_query($db,$sql);
  $row = mysqli_fetch_array($res);
  $cid=$row['Cid'];
  $cname=$row['Cname'];
  $cadd=$row['Cadd'];
  $ctel=$row['Ctel'];
  $cword=$row['Cword'];
}
if(isset($n_name))
{
  $db = mysqli_connect("localhost","root","","zhc");
  $sql="update Company set Cname='" . $n_name . "',Cadd='" . $n_add . "',Ctel='" . $n_tel . "',Cword='" . $n_word . "'  where Cid='" . $che_id . "';";
  $res=mysqli_query($db,$sql);
  header("Location:change_company.php");
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
<form name="modify_company" method="post"  onsubmit="return doCheck();" action="">
  <table  border="1" align="center" ceellpadding="30"style="margin-top:50px">
  <tr>
    <td>公司名称:</td>
    <td><input style="width:605px;" name="Cname" type="text" id="Cname" value="<?php echo $cname; ?>"></td>
  </tr>
  <tr>
    <td>公司地址:</td>
    <td><input style="width:605px;" name="Cadd" type="text" id="Cadd" value="<?php echo $cadd; ?>"></td>
  </tr>
  <tr>
    <td>公司电话:</td>
    <td><input style="width:605px;" name="Ctel" type="text" id="Ctel" value="<?php echo $ctel; ?>"></td>
  </tr>
  <tr>
    <td>公司简介:</td>
    <td><textarea  rows="10" cols="73" name="Cword"  id="Cword"><?php echo $cword; ?></textarea></td>
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
