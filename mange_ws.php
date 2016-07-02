<?php
session_start();
if(empty($_SESSION['USERNAME']))
{
header("Location:index.php");
}
?>
<!DOCTYPE html>
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
                <a class="item">企业信息管理</a>
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
                <a class="item" href="mange_ws.php">管理电力企业能效数据</a>
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
	<script>
	function modify(id)
	{
		self.location='change_ws.php?id='+id;
	}
	</script>
<?php
$con = mysqli_connect("localhost","root","","zhc");
$result = mysqli_query($con,"SELECT * FROM Company;");
echo "<table border='2'>
<tr>
<th>ID&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>公司名称&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>公司地址&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>公司电话&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>添加时间&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
<th>公司简介&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Cid'] . "</td>";
  echo "<td>" . $row['Cname'] . "</td>";
  echo "<td>" . $row['Cadd'] . "</td>";
  echo "<td>" . $row['Ctel'] . "</td>";
  echo "<td>" . $row['Ctime'] . "</td>";
  echo "<td>" . $row['Cword'] . "</td>";
	echo "<td>".'<button name="'. $row['Cid'] .'"  onclick="modify(this.name)">管理</button>'." </td>";
  echo "</tr>";
  }
echo "</table>";
mysqli_close($con);
?>
<script>
function del(id)
{
	$.ajax({
		type:"post",
		url:"delete_company.php",
		dataType:"json",
		data:'id='+id,
		success:function(req){
			if(req.check=="1")
			{
				location.href = "change_company.php";
			}
		}
	});
}
</script>
