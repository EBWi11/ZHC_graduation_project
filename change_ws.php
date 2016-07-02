<?php
session_start();
if(empty($_SESSION['USERNAME']))
{
header("Location:index.php");
}

$mid=$_GET['id'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>高耗能企业电力能效数据上报与管理系统</title>
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
						<div class="header item">企业电力能效数据上报与管理系统</div>
						<div class="ui dropdown link item">
              添加企业
              <i class="dropdown icon"></i>
              <div class="menu">
                <a class="item" href="add_company.php">添加企业信息</a>
                <a class="item" href="change_company.php">企业信息管理</a>
              </div>
            </div>
						<div class="ui dropdown link item">
              日志管理
              <i class="dropdown icon"></i>
              <div class="menu">
                <a class="item"  href="add_log.php">发布日志</a>
                <a class="item" href="manage_log.php">管理日志</a>
              </div>
            </div>
						<div class="ui dropdown link item">
              企业电力能效数据上报
              <i class="dropdown icon"></i>
              <div class="menu">
                <a class="item"  href="esb.php">电力数据能效数据上报</a>
                <a class="item"  href="mange_ws.php">管理电力企业能效数据</a>
              </div>
            </div>
						<div class="ui dropdown link item">
							企业电力能效分析
              <i class="dropdown icon"></i>
              <div class="menu">
								<a class="item" href="make_standard.php">设置高耗能企业能效标准</a>
                <a class="item" href="find_high.php">查看高耗能企业</a>
                <a class="item" href="look_optimize.php">高耗能企业优化方案</a>
              </div>
            </div>
            <div class="ui dropdown link item">
              管理员模块
              <i class="dropdown icon"></i>
              <div class="menu">
                <a class="item" href="add_manager.php">添加管理员</a>
                <a class="item" href="delete_manager.php">管理管理员</a>
              </div>
            </div>
					</div>
					<div class="ui hidden transition information">
						<h1 class="ui inverted header">
              管理电力企业能效数据
						</h1>
					</div>
				</div>
			</div>
		</div>
  </body>
  </html>
<?php
$con = mysqli_connect("localhost","root","","zhc");
$result = mysqli_query($con,"SELECT * FROM Work where Cid='".$mid."';");
echo "车间";
echo "<table border='2'>
<tr>
<th>公司ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>车间ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>车间名称&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>车间简介&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>额定电压&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>额定电流&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>额定功率&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>实际电压&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>实际电流&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>实际功率&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>工作时长&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>有用功&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>功效&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
</tr>";
while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Cid'] . "</td>";
  echo "<td>" . $row['Wid'] . "</td>";
  echo "<td>" . $row['Wname'] . "</td>";
  echo "<td>" . $row['Wword'] . "</td>";
  echo "<td>" . $row['Wnv'] . "</td>";
  echo "<td>" . $row['Wna'] . "</td>";
  echo "<td>" . $row['Wnp'] . "</td>";
  echo "<td>" . $row['Wv'] . "</td>";
  echo "<td>" . $row['Wa'] . "</td>";
  echo "<td>" . $row['Wp'] . "</td>";
  echo "<td>" . $row['Wt'] . "</td>";
  echo "<td>" . $row['Ww'] . "</td>";
  echo "<td>" . $row['We'] . "</td>";
	echo "<td>".'<button name="'. $row['Wid'] .'"  onclick="c_w(this.name)">修改信息</button>'." </td>";
	echo "<td>".'<button id="'. $row['Wid'] .'"  onclick="d_w(this.id)">删除信息</button>'." </td>";
  echo "</tr>";
  }
echo "</table>";
echo "<hr>";

$result_s= mysqli_query($con,"SELECT * FROM Services where Cid='".$mid."';");
echo "后勤";
echo "<table border='2'>
<tr>
<th>公司ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>后勤ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>系统耗能&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>照明耗能&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>人工耗能&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
</tr>";

while($row = mysqli_fetch_array($result_s))
  {
  echo "<tr>";
  echo "<td>" . $row['Cid'] . "</td>";
  echo "<td>" . $row['Sid'] . "</td>";
  echo "<td>" . $row['St'] . "</td>";
  echo "<td>" . $row['Sl'] . "</td>";
  echo "<td>" . $row['Sp'] . "</td>";
  echo "<td>".'<button name="'. $row['Sid'] .'"  onclick="c_s(this.name)">修改信息</button>'." </td>";
  echo "<td>".'<button id="'. $row['Sid'] .'"  onclick="d_s(this.id)">删除信息</button>'." </td>";
  }
  echo "</table>";
  echo "<hr>";
mysqli_close($con);
?>
<script>
function c_w(id)
{
	mid=<?php  echo $mid; ?>;
	self.location='modify_w.php?mid='+mid+'&id='+id+'&type=Work';
}
function c_s(id)
{
	mid=<?php  echo $mid; ?>;
	self.location='modify_s.php?mid='+mid+'&id='+id+'&type=Services';
}
function d_w(id)
{
	mid=<?php  echo $mid; ?>;
  var type="Work";
	$.ajax({
		type:"post",
		url:"delete_ws.php",
		dataType:"json",
		data:'type='+type+'&id='+id,
		success:function(req){
			if(req.check=="1")
			{
				location.href = 'change_ws.php?id='+mid;
			}
		}
	});
}
function d_s(id)
{
	mid=<?php  echo $mid; ?>;
  var type="Services";
  	$.ajax({
		type:"post",
		url:"delete_ws.php",
		dataType:"json",
		data:'type='+type+'&id='+id,
		success:function(req){
			if(req.check=="1")
			{
				location.href = 'change_ws.php?id='+mid;
			}
		}
	});
}
</script>
