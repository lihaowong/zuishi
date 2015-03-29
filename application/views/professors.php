<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>最师（华南师范大学）</title>
    <link href="<?=base_url().'static/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?=base_url().'static/css/style.css'?>" rel='stylesheet' type='text/css' />
   <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
  
        

    
        <a href="<?=base_url()?>" style="float: left;"><img src="<?=base_url().'static/images/Zuishi.png'?>" width="100px" height="50px"></a>
      
        <a class="navbar-brand" href="<?=base_url().'indexAction/professors/'?>" >名师简介</a>
        <a class="navbar-brand" href="<?=base_url().'indexAction/rankprofessors/'?>">我来评师</a>
        <a class="navbar-brand" href="<?=base_url().'indexAction/lessons/'?>">相关课程</a>
        <a class="navbar-brand" href="<?=base_url().'indexAction/freetalk/'?>">畅所欲言</a>
        

   <ul class="nav navbar-nav navbar-right">

    <form action="<?=base_url().'indexAction/search/'?>" class="navbar-form navbar-left" role="search" >
        <div class="form-group">
          <input type="text" class="form-control" name="info" size="30" placeholder="老师名/课程名">
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



<table border="0"  class="table table-striped table-hover table-condensed" style="position: absolute; left:15%; top: 15% ; word-break:break-all;"  cellspacing="0" width=500 align=center>
  <tr align=center>
    <th style="text-align:center;">姓名</th>
    <th style="text-align:center;">性别</th>
    <th style="text-align:center;">职称</th>
    <th style="text-align:center;">学院</th>
  </tr>

   <?php 
      foreach ($teachers as $key => $professor) 
      {
  ?>
  <tr align=center style=" font-size:15px;">
    <td> <a href="<?=base_url().'indexAction/details/'.$professor['tid'].'/'?>"><?=$professor['tname']?></a></td>
    <td> <?=$professor['tsex']?></td>
    <td> <?=$professor['trank']?></td>
    <td> <?=$professor['tapartment']?></td>
  </tr>
   <?php 
      }
   ?>
    
  </tr>
  <tr align=center style=" font-size:15px;">
   <td> <a href="Instructor.html">崔朝晖</a> </td>
   <td> 女</td>
   <td> 副教授</td>
   <td> 计算机学院</td>
    
  </tr>

  </tr>
  <tr align=center style=" font-size:15px;">
   <td> <a href="Instructor.html">田九胜</a></td>
   <td> 女</td>
   <td> 讲师</td>
   <td> 外国语言文化学院</td>
 
  
  </tr>

</table>


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