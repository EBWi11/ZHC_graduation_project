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

$mid=$_GET['mid'];
$id=$_GET['id'];
$type=$_GET['type'];


$sid=$_POST['Sid'];
$st=$_POST['St'];
$sl=$_POST['Sl'];
$sp=$_POST['Sp'];
$sum=intval($St)+$l=intval($Sl)+intval($Sp);

if(isset($mid))
{
  $db = mysqli_connect("localhost","root","","zhc");
  $sql="select * from Services where Cid= '".$mid."' and Sid='".$id."';";
  $res=mysqli_query($db,$sql);
  $row = mysqli_fetch_array($res);
  $Sid=$row['Sid'];
  $St=$row['St'];
  $Sl=$row['Sl'];
  $Sp=$row['Sp'];
}
if(isset($sid))
{
  $db = mysqli_connect("localhost","root","","zhc");
  $sql="update Services set Cid='" . $mid . "',Sid='" . $sid . "',St='" . $st . "',Sl='" . $sl . "',Sp='" . $sp . "',sum='".$sum."'  where  Cid='" . $mid . "'  and Sid='".$id."';";
  $res=mysqli_query($db,$sql);
  header('Location:mange_ws');
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
<form name="modify_company" method="post" action="">
  <table  border="1" align="center" ceellpadding="30"style="margin-top:50px">
    <tr>
      <td>后勤号:</td>
      <td><input style="width:605px;" name="Sid" type="text" id="Sid" value="<?php echo $Sid; ?>" ></td>
    </tr>
    <tr>
      <td>系统耗能:</td>
      <td><input style="width:605px;" name="St" type="text" id="St" value="<?php echo $St; ?>" ></td>
    </tr>
    <tr>
      <td>照明耗能:</td>
      <td><input style="width:605px;" name="Sl" type="text" id="Sl" value="<?php echo $Sl; ?>" ></td>
    </tr>
    <tr>
      <td>人工耗能:</td>
      <td><input style="width:605px;" name="Sp" type="text" id="Sp" value="<?php echo $Sp; ?>" ></td>
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
