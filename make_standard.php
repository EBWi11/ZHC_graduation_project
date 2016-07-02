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
$db = mysqli_connect("localhost","root","","zhc");
$res=mysqli_query($db,"select * from standard where id=1;");
$row = mysqli_fetch_array($res);
$n_st=$row['standard'];
$res=mysqli_query($db,"select * from standard where id=2;");
$row = mysqli_fetch_array($res);
$n_st_p=$row['standard'];

$st=$_POST['st'];
$st_p=$_POST['st_p'];
if(isset($st))
{
mysqli_query($db,"update standard set id=1,standard='".$st."' where id=1;");
mysqli_query($db,"update standard set id=2,standard='".$st_p."' where id=2;");
header("Location:make_standard.php");
}
?>

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
              设置高耗能企业能效标准
						</h1>
					</div>
				</div>
			</div>
      <?php
      echo "现在能耗标准为：".$n_st_p."kwh";
      echo "<br>";
      echo "现在功率标准为：".$n_st."kw";
      ?>
		</div>
    <div align="center">
    <form name="modify_company" method="post"  onsubmit="return doCheck();" action="">
      耗能标准：<input name="st_p" type="text" id="st_p" value=""/>
      <br>
      功率标准：<input name="st" type="text" id="st" value=""/>
      <br>
    <input type="submit" name="submit" value="提交">
  </from>
</div>
  </body>
  </html>
