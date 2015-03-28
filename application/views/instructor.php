<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>最师（华南师范大学）</title>
    <link href="<?=base_url().'static/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?=base_url().'static/css/style.css'?>" rel='stylesheet' type='text/css' />


 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
  
        

    
        <a href="Index.html" style="float: left;"><img src="<?=base_url().'static/images/Zuishi.png'?>" width="100px" height="50px"></a>
      
        <a class="navbar-brand" href="<?=base_url().'indexAction/professors/'?>" >名师简介</a>
        <a class="navbar-brand" href="<?=base_url().'indexAction/rankprofessors/'?>">我来评师</a>
        <a class="navbar-brand" href="<?=base_url().'indexAction/lessons/'?>">相关课程</a>
        <a class="navbar-brand" href="<?=base_url().'indexAction/freetalk/'?>">畅所欲言</a>
        

   <ul class="nav navbar-nav navbar-right">

    <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control"  size="30" placeholder="老师名/课程名">
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
      </form>

        <?php if (isset($_SESSION['username'])) {
          echo "<li><a>欢迎你，".$_SESSION['username']."</a></li>"; }
              else { echo "<li><a href='".base_url()."indexAction/goregister/'>注册</a></li>
                          <li><a href='".base_url()."indexAction/gologin/'>登录</a></li>" ;}?>
      </ul>
      </div>
      </nav>
</head>
<body>

<img src="<?=base_url().'static/'.$teacher['image']?>" style="position: absolute; left:30%; top: 15% ; "width="180px" height="180px" />
    <form action="" method="get" class="left">


<p>
<font size="6" style="position: absolute; left:50%; top: 15% ;font-weight: bold; ">
<?=$teacher['tname'] ?>
</font>
</p>

<p>
<font size="4" style="position: absolute; left:60%; top: 17% ;font-weight: bold; ">
<?=$teacher['trank'] ?>
</font>
</p>

<p>
<font size="4" style="position: absolute; left:50%; top: 22% ; ">
华南师范大学 <?=$teacher['tapartment'] ?>
</font>
</p>

<table border=0  width=300 height=100 style="position: absolute; left:50%; top: 30% ; ">
<tr height=30>
<td>
研究领域：<?=$teacher['tarea'] ?>
</td>
</tr>
</table>

<table border=0 width=600 height=100 style="position: absolute; left:30%; top: 50% ; ">
<tr height=30>
<td>
<?=$teacher['tintroduce'] ?>
</td>
</tr>
</table>

<input src="<?=base_url().'static/images/IRate.png'?>"  type="image" style="position: absolute; left:48%; top: 80% ; "width="90px" height="40px" />
    <form action="" method="get" class="left">




<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container">

    <ul class="nav navbar-nav navbar-right">
        <li><a href="mailto:371839782@qq.com">联系我们</a></li>

      </ul>
   
  </div>
</nav>

      <script src="<?=base_url().'static/js/jquery-1.11.2.min.js'?>"></script>
      <script src="<?=base_url().'static/js/bootstrap.min.js'?>"></script>


</body>
</html>