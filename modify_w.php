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

$wid=$_POST['Wid'];
$wname=$_POST['Wname'];
$wword=$_POST['Wword'];
$wnv=$_POST['Wnv'];
$wna=$_POST['Wna'];
$wnp=$_POST['Wnp'];
$wv=$_POST['Wv'];
$wa=$_POST['Wa'];
$wp=$_POST['Wp'];
$wt=$_POST['Wt'];
$ww=$_POST['Ww'];
$we=$_POST['We'];
$wg=intval($wp)*intval($wt);

if(isset($mid))
{
  $db = mysqli_connect("localhost","root","","zhc");
  $sql="select * from Work where Cid= '".$mid."' and Wid='".$id."';";
  $res=mysqli_query($db,$sql);
  $row = mysqli_fetch_array($res);
  $cid=$row['Cid'];
  $Wid=$row['Wid'];
  $Wname=$row['Wname'];
  $Wword=$row['Wword'];
  $Wnv=$row['Wnv'];
  $Wna=$row['Wna'];
  $Wnp=$row['Wnp'];
  $Wv=$row['Wv'];
  $Wa=$row['Wa'];
  $Wp=$row['Wp'];
  $Wt=$row['Wt'];
  $Ww=$row['Ww'];
  $We=$row['We'];
}
if(isset($wid))
{
  $db = mysqli_connect("localhost","root","","zhc");
  $sql="update Work set Cid='" . $mid . "',Wid='" . $wid . "',Wname='" . $wname . "',Wword='" . $wword . "',Wnv='" . $wnv . "',Wna='" . $wna . "',Wnp='" . $wnp . "',Wv='" . $wv . "',Wa='" . $wa . "',Wp='" . $wp . "',Wt= '".$wt."',Ww= '".$ww."',We= '".$we."',Wg= '".$wg."'  where Cid='" . $mid . "'  and Wid='".$id."';";
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
	<script src="homepage.js"></script>

  <script>
  var np;
  function np(Wnv,Wna)
  {
    nv=parseInt(String(Wnv));
    na=parseInt(String(Wna));
    np=(na*nv)+"kw";
    document.getElementById("Wnp").value=np;
  }

  function p(Wv,Wa)
  {
    v=parseInt(String(Wv));
    a=parseInt(String(Wa));
    np=(a*v)+"kw";
    document.getElementById("Wp").value=np;
  }

  function e(Wp,Wt,Ww)
  {
    p=parseInt(String(Wp));
    t=parseInt(String(Wt));
    w=parseInt(String(Ww));
    np=(w/(p*t));
    document.getElementById("We").value=np;
  }
</script>

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
      <td>车间号:</td>
      <td><input style="width:605px;" name="Wid" type="text" id="Wid" value="<?php echo $Wid; ?>" ></td>
    </tr>
    <tr>
      <td>车间名称:</td>
      <td><input style="width:605px;" name="Wname" type="text" id="Wname" value="<?php echo $Wname; ?>"></td>
    </tr>
    <tr>
      <td>车间简介:</td>
      <td><textarea  rows="10" cols="73" name="Wword"  id="Wword" ><?php echo $Wword; ?></textarea></td>
    </tr>
    <tr>
      <td>额度电压:</td>
      <td><input style="width:605px;" name="Wnv" type="text" id="Wnv" value="<?php echo $Wnv; ?>"></td>
    </tr>
    <tr>
      <td>额度电流:</td>
      <td><input style="width:605px;" name="Wna" type="text" id="Wna" value="<?php echo $Wna; ?>" onblur="np(Wnv.value,this.value)"／></td>
    </tr>
    <tr>
      <td>额定功率:</td>
      <td><input style="width:605px;" name="Wnp" type="text" id="Wnp" value="<?php echo $Wnp; ?>" ></td>
    </tr>
    <tr>
      <td>实际电压:</td>
      <td><input style="width:605px;" name="Wv" type="text" id="Wv" value="<?php echo $Wv; ?>"></td>
    </tr>
    <tr>
      <td>实际电流:</td>
      <td><input style="width:605px;" name="Wa" type="text" id="Wa" value="<?php echo $Wa; ?>" onblur="p(Wv.value,this.value)" ></td>
    </tr>
    <tr>
      <td>实际功率:</td>
      <td><input style="width:605px;" name="Wp" type="text" id="Wp" value="<?php echo $Wp; ?>" ></td>
    </tr>
    <tr>
      <td>工作时长:</td>
      <td><input style="width:605px;" name="Wt" type="text" id="Wt" value="<?php echo $Wt; ?>"></td>
    </tr>
    <tr>
      <td>有用功:</td>
      <td><input style="width:605px;" name="Ww" type="text" id="Ww" value="<?php echo $Ww; ?>" onblur="e(Wp.value,Wt.value,this.value)"></td>
    </tr>
    <tr>
      <td>功效:</td>
      <td><input style="width:605px;" name="We" type="text" id="We" value="<?php echo $We; ?>" ></td>
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
